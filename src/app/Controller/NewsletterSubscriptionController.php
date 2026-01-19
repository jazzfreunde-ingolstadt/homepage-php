<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use DateTime;
use InvalidArgumentException;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Exception\Contract\ConfirmationContractNotFoundException;
use Jazzfreunde\App\Exception\Contract\ConfirmationPeriodExpiredException;
use Jazzfreunde\App\Exception\Newsletter\SubscriptionException;
use Jazzfreunde\App\Form\NewsletterSubscriptionType;
use Jazzfreunde\App\Service\Newsletter\NewsletterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\Form\FormInterface;

use function is_array;

/**
 * Routing Controller für die Website
 * @psalm-api
 */
#[Route('/newsletter', name: 'form_')]
final class NewsletterSubscriptionController extends AbstractController implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * Newletter abonnieren
     *
     * @param Request $request
     * @param NewsletterService $newsletter
     * @return Response
     */
    #[Route('/newsletter_subscribe/', name: 'newsletter_subscribe')]
    public function newsletterSubscribe(Request $request, NewsletterService $newsletter): Response
    {
        $form = $this
            ->createForm(NewsletterSubscriptionType::class)
            ->handleRequest($request);

        if (!$form->isSubmitted()) {
            return new Response(status: Response::HTTP_BAD_REQUEST);
        }

        if (!$form->isValid()) {
            return $this->createBadRequestResponse($request, $form);
        }

        /**
         * @var array<string, mixed>|null $data
         */
        $data = $form->getData();
        if (!is_array($data)) {
            throw new \LogicException('Unable to load form data');
        }

        try {
            $subscription = new NewsletterSubscription(...$data);
            $subscription->creationTime = new DateTime();
        } catch (InvalidArgumentException) {
            return $this->createBadRequestResponse($request, $form);
        }
        
        try {
            $newsletter->subscribe($subscription);
    
            return $this->redirectToRoute('form_newsletter_subscription_received');
        } catch (SubscriptionException $e) {
            if ($e->getCode() === SubscriptionException::ALREADY_SUBSCRIBED) {
                return $this->redirectToRoute('form_newsletter_already_subscribed');
            }
            throw $e;
        }
    }

    /**
     * Bestätigungsnachricht nach dem Abonnieren
     *
     * @return Response
     */
    #[Route('/newsletter_subscription_received/', name: 'newsletter_subscription_received')]
    public function subscriptionRevieced(): Response
    {
        return $this->render('@pages/newsletter/subscription-received-notification.html.twig');
    }

    /**
     * Bestätigungsnachricht nach dem Abonnieren
     *
     * @return Response
     */
    #[Route('/newsletter_confirm/{token}', name: 'newsletter_confirm')]
    public function subscriptionConfirmation(string $token, NewsletterService $newsletter): Response
    {
        try {
            $newsletter->confirm($token);
            
            return $this->render('@pages/newsletter/confirmation-notification.html.twig');
        } catch (ConfirmationPeriodExpiredException) {
            return new Response(status: Response::HTTP_GONE);
        } catch (ConfirmationContractNotFoundException) {
            return new Response(status: Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Bestätigungsnachricht nach dem Beenden eines Abonnements
     *
     * @return Response
     */
    #[Route('/newsletter_cancel/{token}', name: 'newsletter_cancel')]
    public function subscriptionCancelled(string $token, NewsletterService $newsletter): Response
    {
        try {
            $newsletter->unsubscribe($token);
            
            return $this->render('@pages/newsletter/cancellation-notification.html.twig');
        } catch (ConfirmationPeriodExpiredException) {
            return new Response(status: Response::HTTP_GONE);
        } catch (ConfirmationContractNotFoundException) {
            return new Response(status: Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Bestätigungsnachricht nach dem Abonnieren
     *
     * @return Response
     */
    #[Route('/newsletter_already_subscribed/', name: 'newsletter_already_subscribed')]
    public function alreadySubscribed(): Response
    {
        return $this->render('@pages/newsletter/already-subscribed-notification.html.twig');
    }

    /**
     * Creates a response for a bad request due to invalid form data.
     *
     * @param  Request       $request
     * @param  FormInterface $form
     * @return Response
     */
    private function createBadRequestResponse(Request $request, FormInterface $form): Response
    {
        $this->logger?->error(
            'Submitted invalid form data for jazzletter subscription.',
            [
                'route' => $request->attributes->get('_route'),
                'form' => $form->getErrors(true, false),
                'data' => $form->getData(),
                'request' => $request->getContent(),
            ]
        );
                
        return new Response(status: Response::HTTP_BAD_REQUEST, content: 'Invalid form data submitted.');
    }
}
