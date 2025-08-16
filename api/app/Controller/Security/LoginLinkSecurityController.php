<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller\Security;

use InvalidArgumentException;
use Jazzfreunde\App\Message\Messages\Email\EmailNotification;
use Jazzfreunde\App\Service\Security\Attribute\FirewallEntryPoint;
use Jazzfreunde\App\Service\Security\Request\RequestHelper;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter;
use Symfony\Component\Security\Core\Exception\LogicException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Http\LoginLink\LoginLinkHandlerInterface;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Controller for handling logins via login links sent to the users email.
 * @psalm-suppress PropertyNotSetInConstructor $container
 * @psalm-api
 */
#[Route('/session', name: 'security_link_')]
final class LoginLinkSecurityController extends AbstractController implements LoggerAwareInterface
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
     * Generate login email and start authentication process.
     *
     * @param Request $request
     * @return Response
     */
    #[Route('/login', name: 'login', methods: [ Request::METHOD_GET ])]
    public function requestLoginLink(Request $request): Response
    {
        if ($this->security->isGranted(AuthenticatedVoter::IS_AUTHENTICATED_FULLY)) {
            return RequestHelper::redirectToOrigin($request, $this->generateUrl('home'));
        }

        return $this->render(
            '@pages/security/link/login-form.html.twig',
            [
                'new_login_route' => 'security_link_new_login',
            ]
        );
    }

    /**
     * Confirmation form before the actual login and target of the authentication link.
     *
     * @param Request $request
     * @return Response
     * @link https://symfony.com/doc/current/security/login_link.html#allow-a-link-to-only-be-used-once
     */
    #[FirewallEntryPoint(firewallName: 'main')]
    #[Route('/auth', name: 'login_check', methods: [ Request::METHOD_GET, Request::METHOD_POST ])]
    public function enter(Request $request): Response
    {
        if ($this->security->isGranted(AuthenticatedVoter::IS_AUTHENTICATED_FULLY)) {
            return RequestHelper::redirectToOrigin($request, $this->generateUrl('home'));
        }

        if (!$request->isMethod(Request::METHOD_GET)) {
            throw new \LogicException('Logout should be handled by an event subscriber. Check your "Security" configuration!');
        }

        return $this->render('@pages/security/link/login-confirmation.html.twig', [
            'login_check' => 'security_link_login_check',
            '_expires' => $request->query->get('expires', 'error'),
            '_user' => $request->query->get('user', 'error'),
            '_hash' => $request->query->get('hash', 'error'),
        ]);
    }

    /**
     * Generates a new email with an authentication link and sends it to the user.
     *
     * @param Request $request
     * @param UserProviderInterface $userProvider
     * @param LoginLinkHandlerInterface $loginLinkHandler
     * @param MessageBusInterface $bus
     * @return Response
     * @throws \InvalidArgumentException if email is not valid
     * @throws UserNotFoundException if user is not found
     */
    #[FirewallEntryPoint(firewallName: 'main')]
    #[Route('/new', name: 'new_login', methods: [ Request::METHOD_POST ])]
    public function generateNewLoginEmail(
        Request $request,
        UserProviderInterface $userProvider,
        LoginLinkHandlerInterface $loginLinkHandler,
        MessageBusInterface $bus
    ): Response {
        if ($this->security->isGranted(AuthenticatedVoter::IS_AUTHENTICATED_FULLY)) {
            return RequestHelper::redirectToOrigin($request, $this->generateUrl('home'));
        }
       
        try {
            $email = RequestHelper::getUserEmailFromPost($request);
        } catch (InvalidArgumentException) {
            $this->addFlash('error', 'Die eingegebene E-Mail-Adresse ist ungültig.');
            return $this->redirect($this->generateUrl('security_code_login'));
        }
        
        if (is_null($email)) {
            throw new LogicException('Email address is required for login.');
        }

        $user = $userProvider->loadUserByIdentifier($email->value());
        $loginLinkDetails = $loginLinkHandler->createLoginLink($user);
        $loginLink = $loginLinkDetails->getUrl();

        $bus->dispatch(new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recipient: new Address($email->value()),
            subject: 'Login bei Jazzfreunde Ingolstadt e.V.',
            twigTemplate: 'email/security/login-link.html.twig',
            twigContext: [ 'login_link' => $loginLink ]
        ));
        
        return $this->redirectToRoute('security_link_sent_confirmation');
    }

    /**
     * Confirmation banner after the link has been sent to the user.
     *
     * @return Response
     */
    #[Route('/requested', name: 'sent_confirmation', methods: [ Request::METHOD_GET ])]
    public function sent(): Response
    {
        return $this->render(
            '@pages/security/link/login-sent.html.twig',
        );
    }

    /**
     * Logout action.
     *
     * @return never
     */
    #[Route('/logout', name: 'logout', methods: [ Request::METHOD_GET ])]
    public function logout(): never
    {
        throw new \LogicException('Logout sollte von Event Subscriber behandelt werden. Überprüfe "Security" Konfiguration!');
    }
}
