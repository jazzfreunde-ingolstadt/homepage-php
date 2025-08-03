<?php

declare(strict_types = 1);

namespace Jazzfreunde\App\Controller\Security;

use InvalidArgumentException;
use Jazzfreunde\App\Message\Messages\Email\EmailNotification;
use Jazzfreunde\App\Service\Security\Attribute\FirewallEntryPoint;
use Jazzfreunde\App\Service\Security\Request\RequestHelper;
use Jazzfreunde\App\Service\Security\Request\SessionHelper;
use Jazzfreunde\App\Service\Security\VerificationCode\VerificationCodeHandler;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter;
use Symfony\Component\Security\Core\Exception\LogicException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;

/**
 * Controller for handling login via verification code.
 * @psalm-suppress PropertyNotSetInConstructor $container
 * @psalm-api
 */
#[Route('/verification', name: 'security_code_')]
final class VerificationCodeSecurityController extends AbstractController implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * Dependency Injection
     *
     * @param Security $security
     */
    public function __construct(
        private Security $security,
    ) {
    }

    /**
     * Send verification code to the user and render input form.
     *
     * @param Request $request
     * @return Response
     */
    #[Route('/login', name: 'login', methods: [ Request::METHOD_GET ])]
    public function showLoginForm(Request $request): Response
    {
        if ($this->security->isGranted(AuthenticatedVoter::IS_AUTHENTICATED_FULLY)) {
            return RequestHelper::redirectToOrigin($request, $this->generateUrl('home'));
        }

        return $this->render(
            '@pages/security/code/login-form.html.twig',
            [
                'new_login_route' => 'security_code_verification',
            ]
        );
    }

    /**
     * Generates a new email with an authentication link and sends it to the user.
     *
     * @param Request $request
     * @param MessageBusInterface $bus
     * @return Response
     * @throws InvalidArgumentException if email is not valid
     * @throws UserNotFoundException if user is not found
     */
    #[Route('/verification', name: 'verification', methods: [ Request::METHOD_POST ])]
    public function showVerificationForm(
        Request $request,
        VerificationCodeHandler $verificationCodeHandler,
        MessageBusInterface $bus
    ): Response {
        if ($this->security->isGranted(AuthenticatedVoter::IS_AUTHENTICATED_FULLY)) {
            return RequestHelper::redirectToOrigin($request, $this->generateUrl('home'));
        }
       
        try {
            $email = RequestHelper::getUserEmailFromPost($request);

            if (!is_null($email)) {
                SessionHelper::setUserEmail($request->getSession(), $email);
            }
        } catch (InvalidArgumentException) {
            $this->addFlash('error', 'Die eingegebene E-Mail-Adresse ist ungültig.');
            return $this->redirect($this->generateUrl('security_code_login'));
        }

        $email ??= SessionHelper::getUserEmail($request->getSession());

        if (is_null($email)) {
            throw new LogicException('Email address is required for verification.');
        }
        $verificationCode = $verificationCodeHandler->createVerificationCode($email->value());

        $bus->dispatch(new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recipient: new Address($email->value()),
            subject: 'Authentifizierung bei Jazzfreunde Ingolstadt e.V.',
            twigTemplate: 'email/security/verification-code.html.twig',
            twigContext: [ 'verification_code' => $verificationCode->digits ]
        ));
        
        return $this->render('@pages/security/code/verification-form.html.twig', [
            'login_check' => 'security_code_login_check',
            '_expires' => $verificationCode->expiresAt->getTimestamp(),
            '_user' => $email,
            '_hash' => $verificationCode->signatureHash,
        ]);
    }

    /**
     * Validate verification code and login user.
     */
    #[FirewallEntryPoint(firewallName: 'low_trust')]
    #[Route('/auth', name: 'login_check', methods: [ Request::METHOD_POST ])]
    public function authenticate(): never
    {
        throw new LogicException('Login should be handled by the event subscriber. Check "Security" configuration!');
    }
}
