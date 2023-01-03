<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use DateTime;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Form\NewsletterSubscriptionType;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Routing Controller für die Website
 */
#[Route('/form', name: 'form_')]
class FormController extends AbstractController
{
    /**
     * @param ManagerRegistry $doctrine
     */
    public function __construct(private ManagerRegistry $doctrine)
    {
    }

    /**
     * Newletter abonnieren
     *
     * @param Request $request
     * @param MailerInterface $mailer
     * @param LoggerInterface $logger
     * @return Response
     */
    #[Route('/newsletter_subscribe/', name: 'newsletter_subscribe')]
    public function newsletterSubscribe(Request $request, MailerInterface $mailer, LoggerInterface $logger): Response
    {
        $form = $this
            ->createForm(NewsletterSubscriptionType::class)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $entityManager = $this->doctrine->getManager();
                
                $data = $form->getData();
                $subscription = new NewsletterSubscription(...$data);
                $subscription->creationTime = new DateTime();
                
                $entityManager->persist($subscription);
                $entityManager->flush();
                
                $email = (new TemplatedEmail())
                    ->from('info@jazzfreunde-ingolstadt.de')
                    ->to('jazzletter@jazzfreunde-ingolstadt.de')
                    ->subject('Neuer Newsletter Abonnent!')
                    ->htmlTemplate('emails/newsletter-subscription.html.twig')
                    ->context([
                        'subscription' => [
                            'email' => $subscription->email
                        ],
                    ]);
                
                $mailer->send($email);
                
                return $this->redirectToRoute('home');
            } catch (TransportExceptionInterface $e) {
                $logger->error($e);
            } catch (UniqueConstraintViolationException $e) {
                // Email bereits vorhanden. Nutzer benachrichtigen.
            }
        }

        return $this->redirectToRoute('404');
    }
}
