<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Controller;

use DateTime;
use InvalidArgumentException;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Exception\Contract\ConfirmationContractNotFoundException;
use Jazzfreunde\App\Exception\Contract\ConfirmationPeriodExpiredException;
use Jazzfreunde\App\Exception\Newsletter\SubscriptionException;
use Jazzfreunde\App\Form\NewsletterSubscriptionType;
use Jazzfreunde\App\Service\Newsletter\NewsletterService;
use Jazzfreunde\App\Service\Security\Request\RequestHelper;
use Jazzfreunde\App\Service\Twig\PageTemplatePath;
use Jazzfreunde\App\Type\Primitive\Email;
use LogicException;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\RateLimiter\RateLimit;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\Routing\Attribute\Route;

use function is_array;
use function is_string;

/**
 * Routing Controller für die Website.
 *
 * @psalm-api
 */
#[Route('/newsletter', name: 'form_')]
final class NewsletterSubscriptionController extends AbstractController implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * Newletter abonnieren.
     *
     * @param Request            $request
     * @param NewsletterService  $newsletter
     * @param RateLimiterFactory $ipRateLimiter
     * @param RateLimiterFactory $emailRateLimiter
     * @param string             $rateLimitSecret
     *
     * @return Response
     */
    #[Route('/newsletter_subscribe/', name: 'newsletter_subscribe', methods: ['POST'])]
    public function newsletterSubscribe(
        Request $request,
        NewsletterService $newsletter,
        #[Autowire(service: 'limiter.newsletter_subscription_ip')]
        RateLimiterFactory $ipRateLimiter,
        #[Autowire(service: 'limiter.newsletter_subscription_email')]
        RateLimiterFactory $emailRateLimiter,
        #[Autowire('%kernel.secret%')]
        string $rateLimitSecret,
    ): Response {
        $clientIp = $request->getClientIp() ?? 'unknown';
        $ipRateLimit = $ipRateLimiter
            ->create(hash_hmac('sha256', $clientIp, $rateLimitSecret))
            ->consume();

        if (!$ipRateLimit->isAccepted()) {
            $this->logger?->notice('Rate limited newsletter submission by client IP.');

            return $this->rateLimitedResponse($ipRateLimit);
        }

        $form = $this
            ->createForm(NewsletterSubscriptionType::class)
            ->handleRequest($request);

        if (!$form->isSubmitted()) {
            return new Response(status: Response::HTTP_BAD_REQUEST);
        }

        /** @var null|string $honeypot */
        $honeypot = $form->get('website')->getData();
        if (is_string($honeypot) && '' !== trim($honeypot)) {
            $this->logger?->info('Discarded newsletter submission after honeypot field was filled.');

            return $this->redirectToRoute('form_newsletter_subscription_received');
        }

        if (!$form->isValid()) {
            $this->logger?->warning(
                'Submitted invalid form data for jazzletter subscription.',
                [
                    'route' => $request->attributes->get('_route'),
                    'form' => $form->getErrors(true, false),
                    'data' => $form->getData(),
                    'request' => $request->getContent(),
                ]
            );
            $this->addFlash('error', 'Die eingegebene E-Mail-Adresse ist ungültig.');

            return RequestHelper::redirectToOrigin(
                $request,
                default: $this->generateUrl('home'),
                anchor: 'newsletter-subscription-widget'
            );
        }

        /**
         * @var null|array<string, mixed> $data
         */
        $data = $form->getData();
        if (!is_array($data)) {
            throw new LogicException('Unable to load form data');
        }

        try {
            $email = $data['email'] ?? null;
            if (!is_string($email)) {
                throw new LogicException('Submitted newsletter data must contain an email address.');
            }

            $email = trim($email);
            $emailRateLimit = $emailRateLimiter
                ->create(hash_hmac('sha256', strtolower($email), $rateLimitSecret))
                ->consume();

            if (!$emailRateLimit->isAccepted()) {
                $this->logger?->notice('Rate limited newsletter submission by normalized email address.');

                return $this->rateLimitedResponse($emailRateLimit);
            }

            $subscription = new NewsletterSubscription();
            $subscription->email = new Email($email);
            $subscription->creationTime = new DateTime();
            $newsletter->subscribe($subscription);

            return $this->redirectToRoute('form_newsletter_subscription_received');
        } catch (InvalidArgumentException $e) { // Todo: Keep this in for debugging, but replace with a more specific exception in the future
            $this->logger?->error(
                'Failed to create newsletter subscription entity from form data.',
                [
                    'route' => $request->attributes->get('_route'),
                    'data' => $data,
                    'exception' => $e,
                ]
            );
            $this->addFlash('error', 'Die eingegebene E-Mail-Adresse ist ungültig.');

            return RequestHelper::redirectToOrigin(
                $request,
                default: $this->generateUrl('home'),
                anchor: 'newsletter-subscription-widget'
            );
        } catch (SubscriptionException $e) {
            if (SubscriptionException::ALREADY_SUBSCRIBED === $e->getCode()) {
                return $this->redirectToRoute('form_newsletter_already_subscribed');
            }

            throw $e;
        }
    }

    /**
     * Bestätigungsnachricht nach dem Abonnieren.
     *
     * @return Response
     */
    #[Route('/newsletter_subscription_received/', name: 'newsletter_subscription_received')]
    public function subscriptionRevieced(): Response
    {
        return $this->render(PageTemplatePath::NEWSLETTER_SUBSCRIPTION_RECEIVED);
    }

    /**
     * Bestätigungsnachricht nach dem Abonnieren.
     *
     * @return Response
     */
    #[Route('/newsletter_confirm/{token}', name: 'newsletter_confirm')]
    public function subscriptionConfirmation(string $token, NewsletterService $newsletter): Response
    {
        try {
            $newsletter->confirm($token);

            return $this->render(PageTemplatePath::NEWSLETTER_CONFIRMATION);
        } catch (ConfirmationPeriodExpiredException) {
            return new Response(status: Response::HTTP_GONE);
        } catch (ConfirmationContractNotFoundException) {
            return new Response(status: Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Bestätigungsnachricht nach dem Beenden eines Abonnements.
     *
     * @return Response
     */
    #[Route('/newsletter_cancel/{token}', name: 'newsletter_cancel')]
    public function subscriptionCancelled(string $token, NewsletterService $newsletter): Response
    {
        try {
            $newsletter->unsubscribe($token);

            return $this->render(PageTemplatePath::NEWSLETTER_CANCELLATION);
        } catch (ConfirmationContractNotFoundException) {
            return new Response(status: Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Bestätigungsnachricht nach dem Abonnieren.
     *
     * @return Response
     */
    #[Route('/newsletter_already_subscribed/', name: 'newsletter_already_subscribed')]
    public function alreadySubscribed(): Response
    {
        return $this->render(PageTemplatePath::NEWSLETTER_ALREADY_SUBSCRIBED);
    }

    private function rateLimitedResponse(RateLimit $rateLimit): Response
    {
        $retryAfter = max(1, $rateLimit->getRetryAfter()->getTimestamp() - time());

        return new Response(
            content: 'Zu viele Anmeldeversuche. Bitte versuchen Sie es später erneut.',
            status: Response::HTTP_TOO_MANY_REQUESTS,
            headers: [
                'Content-Type' => 'text/plain; charset=UTF-8',
                'Retry-After' => (string) $retryAfter,
            ],
        );
    }
}
