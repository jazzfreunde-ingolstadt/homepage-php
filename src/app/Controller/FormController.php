<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use DateTime;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Form\NewsletterSubscriptionType;
use Jazzfreunde\App\Service\Email\EmailConfirmationService;
use Jazzfreunde\App\Service\Email\Exception\ConfirmationContractNotFoundException;
use Jazzfreunde\App\Service\Email\Exception\ConfirmationPeriodExpiredException;
use Jazzfreunde\App\Service\Newsletter\Exception\SubscriptionException;
use Jazzfreunde\App\Service\Newsletter\NewsletterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function is_array;

/**
 * Routing Controller für die Website
 */
#[Route('/form', name: 'form_')]
final class FormController extends AbstractController
{
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

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $data = $form->getData();
                if (!is_array($data)) {
                    throw new \LogicException('Unable to load form data');
                }

                $subscription = new NewsletterSubscription(...$data);
                $subscription->creationTime = new DateTime();

                $newsletter->subscribe($subscription);

                return $this->redirectToRoute('form_newsletter_subscription_received');
            } catch (SubscriptionException $e) {
                if ($e->getCode() === SubscriptionException::ALREADY_SUBSCRIBED) {
                    return $this->redirectToRoute('form_newsletter_already_subscribed');
                }
                throw $e;
            }
        }

        return $this->redirectToRoute('error');
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
    #[Route('/newsletter_confirmation/{token}', name: 'newsletter_confirmation')]
    public function subscriptionConfirmation(string $token, EmailConfirmationService $emailConfirmationService): Response
    {
        try {
            $emailConfirmationService->confirm($token);
            
            return $this->render('@pages/newsletter/confirmation-notification.html.twig');
        } catch (ConfirmationPeriodExpiredException) {
            return $this->redirectToRoute('error');
        } catch (ConfirmationContractNotFoundException) {
            return $this->redirectToRoute('error');
        }
    }

    /**
     * Bestätigungsnachricht nach dem Beenden eines Abonnements
     *
     * @return Response
     */
    #[Route('/newsletter_cancelled/{token}', name: 'newsletter_confirmation')]
    public function subscriptionCancelled(string $token, EmailConfirmationService $emailConfirmationService): Response
    {
        try {
            $emailConfirmationService->cancel($token);
            
            return $this->render('@pages/newsletter/cancellation-notification.html.twig');
        } catch (ConfirmationPeriodExpiredException) {
            return $this->redirectToRoute('error');
        } catch (ConfirmationContractNotFoundException) {
            return $this->redirectToRoute('error');
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
}
