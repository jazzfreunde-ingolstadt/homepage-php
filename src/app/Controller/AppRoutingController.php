<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use Closure;
use Components\Component;
use Components\Props\Props;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Jazzfreunde\App\Component\MainDeprecated;
use Jazzfreunde\App\Component\EventList;
use Components\Props\PropsWithChildren;
use DateInterval;
use DateTime;
use Jazzfreunde\App\Entity\Event;
use Jazzfreunde\App\Entity\Ort;
use Jazzfreunde\App\Entity\Type\EventCategoryEnum;
use Jazzfreunde\App\Form\NewsletterSubscriptionType;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Routing Controller für die Website
 */
class AppRoutingController extends AbstractController
{
    /**
     * Undocumented function
     *
     * @return Response
     */
    #[Route('/subscription_notice/', name: 'test', condition: "'dev' === '%kernel.environment%'")]
    public function test(): Response
    {
        return $this->render(
            'email/newsletter-subscription-notice.html.twig',
            [ 'subscription' => [ 'email' => 'test@subscriber.localhost' ] ]
        );
    }

    /**
     * Startseite
     *
     * @return Response
     */
    #[Route('/home/', name: 'home')]
    public function home(): Response
    {
        $sampledata = [
            'featured_events' => [
                new Event(id: 1, titel: 'Jam Session', subtitel: 'Session mit der Jazzfreunde Band', start: (new DateTime())->add(new DateInterval('P1D')), end: (new DateTime())->sub(new DateInterval('P1D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
                new Event(id: 2, titel: 'Jazzfreunde Konzert', subtitel: 'Konzert der Jazzfreunde Big Band', start: (new DateTime())->add(new DateInterval('P10D')), end: (new DateTime())->sub(new DateInterval('P10D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
                new Event(id: 2, titel: 'Jazzfreunde Konzert Highlight', subtitel: 'Konzert der Jazzfreunde Big Band', start: (new DateTime())->add(new DateInterval('P12D')), end: (new DateTime())->sub(new DateInterval('P12D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
                new Event(id: 2, titel: 'Jazzfreunde Lesung', subtitel: 'Konzert der Jazzfreunde Big Band', start: (new DateTime())->add(new DateInterval('P20D')), end: (new DateTime())->sub(new DateInterval('P20D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
            ],
        ];

        return $this->render(
            'pages/home.html.twig',
            [
                'sampledata' => $sampledata,
                'forms' => $this->createNewsletterSubscriptionForm()
            ]
        );
    }

    /**
     * Informationen zum Verein
     *
     * @return Response
     */
    #[Route('/about/', name: 'about')]
    public function about(): Response
    {
        $personen = [
            [
                'name' => 'Karl Wewer',
                'position' => 'Erster Vorsitzender, Schriftführer, Newsletter',
                'bio' => 'Karl Wewer ist aufgewachsen in Datteln (Ruhrgebiet); Studium konstruktiver Ingenieurbau in Bochum, seit 1979 in Ingolstadt – Manager in der IT in einem Automobilunternehmen, jetzt im Ruhestand<br />
                Er hat in jungen Jahren in mehren Rock- und Beat Bands im Ruhrgebiet Gitarre gespielt. Seit 1991 ist er Gitarrist in der Ingolstädter „<a href="http =>//www.kraiberg-jazz-band.de">Kraiberg Jazz Band</a>“. Daneben ist er begeisterter Hörer von Livekonzerten mit dem Schwerpunkt Jazz / Blues / Rock.<br />
                Seit 2010 ist er Mitglied im Verein und wurde 2011 zum Schriftführer und 2014 zum ersten Vorsitzenden gewählt; er versendet zudem den Jazz–Newsletter des Vereins.',
                'pictureSrc' => '/gfx/wewer_pre.png',
                'mail' => 'wewer',
            ],
            [
                'name' => 'Tom Diewock',
                'position' => 'Stellvertretender Vorsitzender, Sessionkoordinator',
                'bio' => 'Tom Diewock ist Musiker und stellvertretender Leiter der Musikschule Mainburg. Er spielt neben seiner umfangreichen Unterrichtstätigkeit in einer Vielzahl von Bands verschiedener Stilrichtungen, u.&nbsp;a. Wes Mackey, Keith Thopmson, The Blues Hunt, Fiona Boyes, Jamazzing, 4 Of A Kind, Oliver Wasilesku Trio, Captain’s Bog, The Bomb, Clausius Konrad, Charly Böck Latin Project, Late Night Band der Ingolstädter Jazztage...',
                'pictureSrc' => '/gfx/diewock_pre.png',
                'mail' => 'diewock',
            ],
            [
                'name' => 'Helmut Bachmaier',
                'position' => 'Schatzmeister',
                'bio' => 'Helmut Bachmaier lebt in Ingolstadt und arbeitet in München bei einer internationalen Bank. Er ist seit 2007 Mitglied bei den Jazzfreunden und seit 2020 Schatzmeister. Theater, Kabarett und Livemusik sind in der Freizeit fester Bestandteil.',
                'pictureSrc' => '/gfx/bachmaier.jpeg',
                'mail' => 'bachmaier',
            ],
            [
                'name' => 'Michael Mayer',
                'position' => 'Webmaster',
                'bio' => 'Mit dem Eintritt ins Gymnasium begann Michael Mayer klassische Gitarre zu lernen.
                Weil aber im Schulensemble "Not am Bass" war, machte er seine ersten Erfahrungen am E-Bass, ohne überhaupt die zugehörigen Bassnoten lesen zu können.
                Später kaufte er sich kurzer Hand einen gebrauchten Kontrabass und fing an, darauf umzusetzen, was er sich am E-Bass beigebracht hatte.
                Zu seinen musikalischen Idolen zählen Chic Korea, Frank Zappa, Allan Holdsworth, Jacob Collier, Robert Glasper, Derek Trucks, Joni Mitchell, um nur ein paar wenige zu nennen.
                Privat ist der gelernte Softwareentwickler gerne auf dem Rennrad unterwegs. Dann aber notgedrungen ohne Kontrabass.',
                'pictureSrc' => '/gfx/mayer_pre.jpg',
                'mail' => 'mayer',
            ]
        ];

        return $this->render(
            'pages/about.html.twig',
            [
                'personen' => $personen,
                'forms' => $this->createNewsletterSubscriptionForm()
            ]
        );
    }

    /**
     * Mitglied werden
     *
     * @return Response
     */
    #[Route('/join/', name: 'join')]
    public function join(): Response
    {
        return $this->render(
            'pages/join.html.twig',
            [ 'forms' => $this->createNewsletterSubscriptionForm() ]
        );
    }

    /**
     * Datenschutzbestimmung
     *
     * @return Response
     */
    #[Route('/legal/end-user-agreement/', name: 'end-user-agreement')]
    public function endUserAgreement(): Response
    {
        return $this->render(
            'pages/legal/end-user-agreement.html.twig',
            [ 'forms' => $this->createNewsletterSubscriptionForm() ]
        );
    }

    /**
     * Datenschutzbestimmung
     *
     * @return Response
     */
    #[Route('/legal/impressum/', name: 'impressum')]
    public function impressum(): Response
    {
        return $this->render(
            'pages/legal/impressum.html.twig',
            [ 'forms' => $this->createNewsletterSubscriptionForm() ]
        );
    }

    /**
     * Vereinssatzung
     *
     * @return Response
     */
    #[Route('/legal/statute/', name: 'statute')]
    public function statute(): Response
    {
        return $this->render(
            'pages/legal/satzung.html.twig',
            [ 'forms' => $this->createNewsletterSubscriptionForm() ]
        );
    }

    /**
     * Veranstaltungen
     *
     * @param string|null $edit
     * @param SerializerInterface $serializer
     * @return Response
     */
    #[Route('/events/{edit}', name: 'events', requirements: ['edit' => '^(?:edit/?$)?'])]
    public function events(string|null $edit = null): Response
    {
        $sampledata = [
            'upcoming_events' => [
                new Event(id: 1, titel: 'Jam Session', subtitel: 'Session mit der Jazzfreunde Band', start: (new DateTime())->add(new DateInterval('P1D')), end: (new DateTime())->sub(new DateInterval('P1D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de', category: EventCategoryEnum::session),
                new Event(id: 2, titel: 'Jazzfreunde Konzert', subtitel: 'Konzert der Jazzfreunde Big Band', start: (new DateTime())->add(new DateInterval('P10D')), end: (new DateTime())->sub(new DateInterval('P10D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
            ],
            'past_events' => [
                new Event(id: 3, titel: 'Jam Session', subtitel: 'Session mit der Jazzfreunde Band', start: (new DateTime())->sub(new DateInterval('P1D')), end: (new DateTime())->sub(new DateInterval('P1D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de', category: EventCategoryEnum::session),
                new Event(id: 4, titel: 'Jazzfreunde Konzert', subtitel: 'Konzert der Jazzfreunde Big Band', start: (new DateTime())->sub(new DateInterval('P10D')), end: (new DateTime())->sub(new DateInterval('P10D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
            ],
            'archived_events' => [
                new Event(id: 3, titel: 'Jam Session', subtitel: 'Session mit der Jazzfreunde Band', start: (new DateTime())->sub(new DateInterval('P1D')), end: (new DateTime())->sub(new DateInterval('P1D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de', category: EventCategoryEnum::session),
                new Event(id: 4, titel: 'Jazzfreunde Konzert', subtitel: 'Konzert der Jazzfreunde Big Band', start: (new DateTime())->sub(new DateInterval('P10D')), end: (new DateTime())->sub(new DateInterval('P10D')), ort: new Ort(id: 1, name: 'Jazzfreunde Club'), link: 'jazzfreunde.de'),
            ]
        ];

        return $this->render(
            'pages/events.html.twig',
            [
                'sampledata' => $sampledata,
                'forms' => $this->createNewsletterSubscriptionForm()
            ]
        );
    }

    /**
     * Routing für die Termine
     * @param bool    $edit
     * @param Request $request
     *
     * @return Response
     */
    #[Route('/termine/{edit}', name: 'termine', requirements: ['edit' => '^(?:edit/?$)?'])]
    public function termine(string|null $edit = null, SerializerInterface $serializer, UrlGeneratorInterface $router): Response
    {
        $eventProps = new class(
            edit: $edit ? true : false,
            debug: 'dev' === $this->getParameter('kernel.environment')
            ) extends Props
        {
            /**
             * @param bool $edit
             * @param string $appVersion
             * @param bool $debug
             */
            public function __construct(public bool $edit, public bool $debug = false)
            {
            }
        };

        $props = new class(
            appVersion: $this->getParameter('app.version') ?? 'v0.0.0',
            children: new EventList(
                props: $eventProps,
                serializer: $serializer,
                router: $router
            )
        ) extends PropsWithChildren {
            /**
             * @param string $appVersion
             */
            public function __construct(public string $appVersion, Component|Closure $children)
            {
                parent::__construct($children);
            }
        };

        return new Response(
            (string) new MainDeprecated($props)
        );
    }

    /**
     * Form zum Abonnieren des Newsletters.
     * Abhängigkeit des Footers.
     *
     * @return array
     */
    private function createNewsletterSubscriptionForm(): array
    {
        $form = $this->createForm(NewsletterSubscriptionType::class, options: ['action' => $this->generateUrl('form_newsletter_subscribe')]);

        return [ 'newsletter_subscription' => $form->createView()] ;
    }
}
