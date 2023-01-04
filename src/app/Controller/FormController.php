<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use DateTime;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Form\NewsletterSubscriptionType;
use Jazzfreunde\App\Service\Newsletter\Exception\SubscriptionException;
use Jazzfreunde\App\Service\Newsletter\NewsletterService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

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
     * @param MailerInterface $mailer
     * @param LoggerInterface $logger
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
                $subscription = new NewsletterSubscription(...$data);
                $subscription->creationTime = new DateTime();

                $newsletter->subscribe($subscription);

                return $this->redirectToRoute('home');
            } catch (SubscriptionException $e) {
                
                // Email bereits vorhanden. Nutzer benachrichtigen.
            }
        }

        return $this->redirectToRoute('404');
    }
}
