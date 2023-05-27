<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\KnownMail;
use Jazzfreunde\App\Entity\Security\User;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use RuntimeException;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter;
use Symfony\Component\Security\Core\Exception\LogicException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Http\LoginLink\LoginLinkHandlerInterface;

/**
 * Controller für Benutzer
 * @psalm-suppress PropertyNotSetInConstructor $container
 */
#[Route('/session', name: 'security_')]
class SecurityController extends AbstractController implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * Dependency Injection
     *
     * @param Security $security
     */
    public function __construct(private Security $security)
    {
    }

    /**
     * Generiere Login-Email und beginne Authentifizierung
     *
     * @param Request $request
     * @return Response
     */
    #[Route('/login', name: 'login', methods: [ Request::METHOD_GET ])]
    public function requestLoginLink(Request $request): Response
    {
        if ($this->security->isGranted(AuthenticatedVoter::IS_AUTHENTICATED_FULLY)) {
            return $this->redirectToOrigin($request);
        }

        return $this->render(
            '@pages/security/login-form.html.twig',
            [
                'new_login_route' => 'security_new_login',
            ]
        );
    }

    /**
     * Bestätigungsmaske vor dem eigentlichen Login und Ziel des Authentifizierungslinks.
     *
     * @param Request $request
     * @return Response
     * @link https://symfony.com/doc/current/security/login_link.html#allow-a-link-to-only-be-used-once
     */
    #[Route('/auth', name: 'login_check', methods: [ Request::METHOD_GET, Request::METHOD_POST ])]
    public function enter(Request $request): Response
    {
        if ($this->security->isGranted(AuthenticatedVoter::IS_AUTHENTICATED_FULLY)) {
            return $this->redirectToRoute('home');
        }

        if (!$request->isMethod(Request::METHOD_GET)) {
            throw new \LogicException('Login sollte von Event Subscriber behandelt werden. Überprüfe "Security" Konfiguration!');
        }

        return $this->render('@pages/security/login-confirmation.html.twig', [
            'login_check' => 'security_login_check',
            '_expires' => $request->query->get('expires', 'error'),
            '_user' => $request->query->get('user', 'error'),
            '_hash' => $request->query->get('hash', 'error'),
        ]);
    }

    /**
     * Generiert neue Email mit Authentifizierungslink und sendet diese an den Nutzer
     *
     * @param Request $request
     * @param ManagerRegistry $doctrine
     * @param LoginLinkHandlerInterface $loginLinkHandler
     * @param MailerInterface $mailer
     * @return Response
     */
    #[Route('/new', name: 'new_login', methods: [ Request::METHOD_POST ])]
    public function generateNewLoginEmail(Request $request, ManagerRegistry $doctrine, LoginLinkHandlerInterface $loginLinkHandler, MailerInterface $mailer): Response
    {
        if ($this->security->isGranted(AuthenticatedVoter::IS_AUTHENTICATED_FULLY)) {
            return $this->redirectToOrigin($request);
        }
       
        $recipient =
            $request
            ->request
            ->get('email')
            ?? throw new UserNotFoundException('Benutzer mit der angegeben Email existiert nicht.');

        if (!\is_string($recipient)) {
            throw new LogicException('Ungültiger Wert für Email.');
        }

        $user =
            $doctrine
            ->getRepository(User::class)
            ->findOneBy([ 'email' => $recipient ])
            ?? throw new UserNotFoundException("Benutzer mit der angegeben Email existiert nicht.");

        $knownMails = $doctrine->getRepository(KnownMail::class);

        $from =
            $knownMails
            ->findOneBy([ 'handle' => 'no-reply' ])
            ?? throw new RuntimeException("Handle 'no-reply' ist nicht als KnownMail konfiguriert. Zum Versand von Emails muss diese im Datenbestand registriert werden.");

        $loginLinkDetails = $loginLinkHandler->createLoginLink($user);
        $loginLink = $loginLinkDetails->getUrl();

        $email =
            (new TemplatedEmail())
            ->from($from->address)
            ->to($recipient)
            ->subject('Login bei Jazzfreunde Ingolstadt e.V.')
            ->htmlTemplate('email/login-link.html.twig')
            ->context([
                'login_link' => $loginLink
            ]);

        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            $this->logger?->error($e->getMessage());
            return $this->redirectToRoute('security_login', status: Response::HTTP_SEE_OTHER);
        }
        
        return $this->redirectToRoute('security_sent_confirmation');
    }

    /**
     * Bestätigungsnachricht, sobald der Link an den Benutzer versendet wurde.
     *
     * @return Response
     */
    #[Route('/requested', name: 'sent_confirmation', methods: [ Request::METHOD_GET ])]
    public function sent(): Response
    {
        return $this->render(
            '@pages/security/login-sent.html.twig',
        );
    }

    /**
     * Melde Benutzer ab
     *
     * @return never
     */
    #[Route('/logout', name: 'logout', methods: [ Request::METHOD_GET ])]
    public function logout(): never
    {
        throw new \LogicException('Logout sollte von Event Subscriber behandelt werden. Überprüfe "Security" Konfiguration!');
    }

    /**
     * Leitet den Benutzer zur Herkunftsseite zurück.
     *
     * @param Request $request
     * @return Response
     */
    private function redirectToOrigin(Request $request): Response
    {
        $referer = $request->headers->get('referer');

        if (is_null($referer)) {
            return $this->redirectToRoute('home');
        }

        return $this->redirect($referer);
    }
}
