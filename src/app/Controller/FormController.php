<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use DateTime;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Form\NewsletterSubscriptionType;
use Jazzfreunde\App\Service\Newsletter\Exception\SubscriptionException;
use Jazzfreunde\App\Service\Newsletter\NewsletterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Routing Controller für die Website
 */
#[Route('/form', name: 'form_')]
class FormController extends AbstractController
{
    /**
     * Newletter abonnieren
     *
     * @param Request $request
     * @param NewsletterService $newsletter
     * @return Response
     */
    #[Route('/newsletter_subscribe/', name: 'newsletter_subscribe')]
    public function newsletterSubscribe(Request $request, NewsletterService $newsletter, ValidatorInterface $validator): Response
    {
        $form = $this
            ->createForm(NewsletterSubscriptionType::class)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $data = $form->getData();
                if (!\is_array($data)) {
                    throw new \LogicException('Unable to load form data');
                }

                $subscription = new NewsletterSubscription(...$data);
                $subscription->creationTime = new DateTime();

                if (0 < count($validator->validate($subscription))) {
                    throw new \DomainException('Invalid subscription data');
                }

                $newsletter->subscribe($subscription);

                return $this->redirectToRoute('form_newsletter_confirmation');
            } catch (SubscriptionException) {
                return $this->redirectToRoute('form_newsletter_already_subscribed');
            }
        }

        return $this->redirectToRoute('error');
    }

    /**
     * Bestätigungsnachricht nach dem Abonnieren
     *
     * @return Response
     */
    #[Route('/newsletter_confirmation/', name: 'newsletter_confirmation')]
    public function subscriptionConfirmation(): Response
    {
        return $this->render('@pages/newsletter/confirmation-notification.html.twig');
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
