<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use Jazzfreunde\App\Service\Security\Attribute\FirewallEntryPoint;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Routing Controller für die Website
 * @psalm-api
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
                'name' => 'Steffen Mayer',
                'position' => 'Erster Vorsitzender',
                'bio' => 'Gründungsmitglied des Vereins und seit 2026 1. Vorstand der Jazzfreunde Ingolstadt.<br/>
                Ich bin Jazzfan seit der Pubertät und auch Amateurmusiker seit dieser Zeit.
                Jazz ist für mich aber weniger ein Genre, sondern eine Geisteshaltung. Offen für alle Stilistiken und Spielarten, entscheidend ist die Improvisation.<br/>
                Vor allen Dingen geht es mir um die Überwindung von Klischees. Leider spielen die in der Rezeption und der öffentlichen Wahrnehmung eine viel zu große Rolle.<br/>
                Hier möchte ich - und auch der Verein - stärker ansetzen: Jazz ist lebendige Musik und braucht keine Stereotype, um bekannt zu werden.
                Und es gibt viele Bezüge zu anderen Gattungen, die ich gerne einlade mitzumachen. Damit die Jazzlandschaft in Ingolstadt auch jenseits der Festivalkultur besteht.',
                'pictureSrc' => 'app/images/people/steffen.jpg',
                'mail' => 'steffen.mayer@jazzfreunde-ingolstadt.de',
            ],
            [
                'name' => 'Sven Wittig',
                'position' => 'Stellvertretender Vorsitzender, Sessionkoordinator',
                'bio' => 'Sven Wittig wurde 1966 in Karl- Marx- Stadt (heute wieder Chemnitz) geboren und begeisterte sich bereits als Jugendlicher für den Jazz im weitesten Sinne mit all seinen Facetten.
                Er studierte Informatik in Dresden, Moskau und Stuttgart.<br/>
                Dennoch blieben auch während des anschließenden Berufslebens der Jazz und die Mitwirkung in zahlreichen Ensembles und Bands immer die wichtigsten Konstanten im Leben des experimentierfreudigen, mittlerweile bayerisch-sächsichen Amateursaxofonisten.<br/>
                Sven ist seit 2026 2. Vorsitzender des Vereins und Teil des Veranstaltungsteams.',
                'pictureSrc' => 'app/images/people/sven.jpg',
                'mail' => 'sven.wittig@jazzfreunde-ingolstadt.de',
            ],
            [
                'name' => 'Manfred See',
                'position' => 'Stellvertretender Vorsitzender, Sessionkoordinator',
                'bio' => 'Manfred See entdeckte früh seine Leidenschaft für Musik, geprägt durch seinen Großvater, einen bekannten Augsburger Zitherspieler<br/>
                Er begann mit klassischem Gitarrenunterricht und sammelte erste Bühnenerfahrungen als Gitarrist der Ingolstädter Rockband „Brainstorm“.<br/>
                Anfang der 1980er-Jahre wandte er sich verstärkt den Holzblasinstrumenten zu und spielte Saxophon, Klarinette und Querflöte in verschiedenen Projekten, darunter „Yaqui Yagua“ und „United Cervelat“.<br/>
                Seine musikalische Entwicklung führte ihn über Bigband-Erfahrungen an der Ingolstädter Musikschule und Workshops bei renommierten Jazzpädagogen bis zur Münchner Universitäts-Bigband unter Joe Viera,
                mit der er in mehreren Städten auftrat. Ergänzt wurde sein Schaffen durch CD-Produktionen, Theatervertonungen sowie Engagements in Funk- und Coverbands.',
                'pictureSrc' => 'app/images/people/manfred.jpg',
                'mail' => 'manfred.see@jazzfreunde-ingolstadt.de',
            ],
            [
                'name' => 'Helmut Bachmaier',
                'position' => 'Schatzmeister',
                'bio' => 'Helmut Bachmaier lebt in Ingolstadt und arbeitete in München bei einer internationalen Bank. Er ist seit 2007 Mitglied bei den Jazzfreunden und seit 2020 Schatzmeister. Theater, Kabarett und Livemusik sind in der Freizeit fester Bestandteil.',
                'pictureSrc' => 'app/images/people/helmut.jpg',
                'mail' => 'helmut.bachmaier@jazzfreunde-ingolstadt.de',
            ],
            [
                'name' => 'Karl Wewer',
                'position' => 'Schriftführer, Newsletter',
                'bio' => 'Karl Wewer ist aufgewachsen in Datteln (Ruhrgebiet); Studium konstruktiver Ingenieurbau in Bochum, seit 1979 in Ingolstadt – Manager in der IT in einem Automobilunternehmen, jetzt im Ruhestand<br />
                Er hat in jungen Jahren in mehren Rock- und Beat Bands im Ruhrgebiet Gitarre gespielt. Seit 1991 ist er Gitarrist in der Ingolstädter Kraiberg Jazz Band. Daneben ist er begeisterter Hörer von Livekonzerten mit dem Schwerpunkt Jazz / Blues / Rock.<br />
                Seit 2010 ist er Mitglied im Verein und wurde 2011 zum Schriftführer und 2014 zum ersten Vorsitzenden gewählt; er versendet zudem den Jazz–Newsletter des Vereins.',
                'pictureSrc' => 'app/images/people/karl.jpg',
                'mail' => 'karl.wewer@jazzfreunde-ingolstadt.de',
            ],
            [
                'name' => 'Michael Mayer',
                'position' => 'Webmaster',
                'bio' => 'Mit dem Eintritt ins Gymnasium begann Michael Mayer klassische Gitarre zu lernen.
                Weil aber im Schulensemble "Not am Bass" war, machte er seine ersten Erfahrungen am E-Bass, ohne überhaupt die zugehörigen Bassnoten lesen zu können.
                Später kaufte er sich kurzer Hand einen gebrauchten Kontrabass und fing an, darauf umzusetzen, was er sich am E-Bass beigebracht hatte.
                Zu seinen musikalischen Idolen zählen Chick Corea, Frank Zappa, Allan Holdsworth, Jacob Collier, Robert Glasper, Derek Trucks, Joni Mitchell, um nur ein paar wenige zu nennen.
                Privat ist der gelernte Softwareentwickler gerne auf dem Rennrad unterwegs. Dann aber notgedrungen ohne Kontrabass.',
                'pictureSrc' => 'app/images/people/michael.jpg',
                'mail' => 'michael.mayer@jazzfreunde-ingolstadt.de',
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
     * Datenschutzbestimmung Social Media
     *
     * @return Response
     */
    #[Route('/legal/end-user-agreement-social-media/', name: 'end-user-agreement-social-media', options: ['sitemap' => true])]
    public function endUserAgreementSocialMedia(): Response
    {
        return $this->render(
            '@pages/legal/end-user-agreement-social-media.html.twig',
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
    #[FirewallEntryPoint(firewallName: 'low_trust')]
    #[Route('/info/sessions/', name: 'sessions', options: ['sitemap' => true])]
    public function sessions(Security $security): Response
    {
        $isAuthenticated = $security->isGranted('IS_AUTHENTICATED_FULLY');
        return $this->render(
            '@pages/info/sessions.html.twig',
            [
                'showCommunityLink' => $isAuthenticated
            ]
        );
    }

    /**
     * Jam Sessions
     *
     * @return Response
     */
    #[IsGranted(AuthenticatedVoter::IS_AUTHENTICATED_FULLY)]
    #[FirewallEntryPoint(firewallName: 'low_trust')]
    #[Route('/info/sessions/community/invite', name: 'sessions_community')]
    public function sessionsCommunity(): Response
    {
        return $this->render(
            '@pages/info/sessions-community.html.twig'
        );
    }
}
