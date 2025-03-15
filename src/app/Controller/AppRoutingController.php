<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Routing Controller für die Website
 */
final class AppRoutingController extends AbstractController
{
    /**
     * Startseite
     *
     * @return Response
     */
    #[Route('/', name: 'home', options: ['sitemap' => true])]
    public function home(): Response
    {
        return $this->render(
            '@pages/home.html.twig'
        );
    }

    /**
     * Informationen zum Verein
     *
     * @return Response
     */
    #[Route('/about/', name: 'about', options: ['sitemap' => true])]
    public function about(): Response
    {
        $personen = [
            [
                'name' => 'Karl Wewer',
                'position' => 'Erster Vorsitzender, Schriftführer, Newsletter',
                'bio' => 'Karl Wewer ist aufgewachsen in Datteln (Ruhrgebiet); Studium konstruktiver Ingenieurbau in Bochum, seit 1979 in Ingolstadt – Manager in der IT in einem Automobilunternehmen, jetzt im Ruhestand<br />
                Er hat in jungen Jahren in mehren Rock- und Beat Bands im Ruhrgebiet Gitarre gespielt. Seit 1991 ist er Gitarrist in der Ingolstädter „<a href="http =>//www.kraiberg-jazz-band.de">Kraiberg Jazz Band</a>“. Daneben ist er begeisterter Hörer von Livekonzerten mit dem Schwerpunkt Jazz / Blues / Rock.<br />
                Seit 2010 ist er Mitglied im Verein und wurde 2011 zum Schriftführer und 2014 zum ersten Vorsitzenden gewählt; er versendet zudem den Jazz–Newsletter des Vereins.',
                'pictureSrc' => 'build/app/images/people/wewer.jpg',
                'mail' => 'wewer@jazzfreunde-ingolstadt.de',
            ],
            [
                'name' => 'Tom Diewock',
                'position' => 'Stellvertretender Vorsitzender, Sessionkoordinator',
                'bio' => 'Tom Diewock ist Musiker und stellvertretender Leiter der Musikschule Mainburg. Er spielt neben seiner umfangreichen Unterrichtstätigkeit in einer Vielzahl von Bands verschiedener Stilrichtungen, u.&nbsp;a. Wes Mackey, Keith Thopmson, The Blues Hunt, Fiona Boyes, Jamazzing, 4 Of A Kind, Oliver Wasilesku Trio, Captain’s Bog, The Bomb, Clausius Konrad, Charly Böck Latin Project, Late Night Band der Ingolstädter Jazztage...',
                'pictureSrc' => 'build/app/images/people/diewock.png',
                'mail' => 'diewock@jazzfreunde-ingolstadt.de',
            ],
            [
                'name' => 'Helmut Bachmaier',
                'position' => 'Schatzmeister',
                'bio' => 'Helmut Bachmaier lebt in Ingolstadt und arbeitete in München bei einer internationalen Bank. Er ist seit 2007 Mitglied bei den Jazzfreunden und seit 2020 Schatzmeister. Theater, Kabarett und Livemusik sind in der Freizeit fester Bestandteil.',
                'pictureSrc' => 'build/app/images/people/bachmaier.jpeg',
                'mail' => 'bachmaier@jazzfreunde-ingolstadt.de',
            ],
            [
                'name' => 'Michael Mayer',
                'position' => 'Webmaster',
                'bio' => 'Mit dem Eintritt ins Gymnasium begann Michael Mayer klassische Gitarre zu lernen.
                Weil aber im Schulensemble "Not am Bass" war, machte er seine ersten Erfahrungen am E-Bass, ohne überhaupt die zugehörigen Bassnoten lesen zu können.
                Später kaufte er sich kurzer Hand einen gebrauchten Kontrabass und fing an, darauf umzusetzen, was er sich am E-Bass beigebracht hatte.
                Zu seinen musikalischen Idolen zählen Chick Corea, Frank Zappa, Allan Holdsworth, Jacob Collier, Robert Glasper, Derek Trucks, Joni Mitchell, um nur ein paar wenige zu nennen.
                Privat ist der gelernte Softwareentwickler gerne auf dem Rennrad unterwegs. Dann aber notgedrungen ohne Kontrabass.',
                'pictureSrc' => 'build/app/images/people/mayer.jpg',
                'mail' => 'mayer@jazzfreunde-ingolstadt.de',
            ]
        ];

        return $this->render(
            '@pages/about.html.twig',
            [
                'personen' => $personen,
            ]
        );
    }

    /**
     * Mitglied werden
     *
     * @return Response
     */
    #[Route('/join/', name: 'join', options: ['sitemap' => true])]
    public function join(): Response
    {
        return $this->render(
            '@pages/join.html.twig',
        );
    }

    /**
     * Datenschutzbestimmung
     *
     * @return Response
     */
    #[Route('/legal/end-user-agreement/', name: 'end-user-agreement', options: ['sitemap' => true])]
    public function endUserAgreement(): Response
    {
        return $this->render(
            '@pages/legal/end-user-agreement.html.twig',
        );
    }

    /**
     * Datenschutzbestimmung
     *
     * @return Response
     */
    #[Route('/legal/impressum/', name: 'impressum', options: ['sitemap' => true])]
    public function impressum(): Response
    {
        return $this->render(
            '@pages/legal/impressum.html.twig',
        );
    }

    /**
     * Vereinssatzung
     *
     * @return Response
     */
    #[Route('/legal/statute/', name: 'statute', options: ['sitemap' => true])]
    public function statute(): Response
    {
        return $this->render(
            '@pages/legal/satzung.html.twig',
        );
    }

    /**
     * Veranstaltungen
     *
     * @return Response
     */
    #[Route('/events/', name: 'events', options: ['sitemap' => true])]
    public function events(): Response
    {
        return $this->render(
            '@pages/events.html.twig'
        );
    }

    /**
     * Jazz and Literature
     *
     * @return Response
     */
    #[Route('/info/jazz-and-literature/', name: 'jazz-and-literature', options: ['sitemap' => true])]
    public function jazzAndLiterature(): Response
    {
        return $this->render(
            '@pages/info/jazz-and-literature.html.twig'
        );
    }

    /**
     * Jam Sessions
     *
     * @return Response
     */
    #[Route('/info/sessions/', name: 'sessions', options: ['sitemap' => true])]
    public function sessions(): Response
    {
        return $this->render(
            '@pages/info/sessions.html.twig'
        );
    }

    /**
     * Generische Fehleranzeige für Besucher
     *
     * @return Response
     */
    #[Route('/error/', name: 'error')]
    public function error(): Response
    {
        return $this->render(
            '@pages/error-notification.html.twig'
        );
    }
}
