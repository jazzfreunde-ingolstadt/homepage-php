<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Controller;

use Jazzfreunde\App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{
    public function createEvent(): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $event = new Event();

        $entityManager->persist($event);

        $entityManager->flush();

        return new Response('Saved new product with id '.$event->getId());
    }
}
