<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Form\NewsletterSubscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @return Response
     */
    #[Route('/newsletter_subscribe/', name: 'newsletter_subscribe')]
    public function newsletterSubscribe(Request $request): Response
    {
        $form = $this
            ->createForm(NewsletterSubscriptionType::class)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->doctrine->getManager();

            $data = $form->getData();
            $subscription = new NewsletterSubscription(...$data);
            $subscription->creationTime = new DateTime();

            $entityManager->persist($subscription);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->redirectToRoute('404');
    }
}
