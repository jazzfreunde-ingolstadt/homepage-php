<?php

namespace Jazzfreunde\App\Service\Security\VerificationCode;

use InvalidArgumentException;
use Jazzfreunde\App\Exception\Security\InvalidVerificationCodeAuthenticationException;
use Jazzfreunde\App\Service\Security\Exception\InvalidVerificationCodeException;
use Override;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\InteractiveAuthenticatorInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\HttpUtils;

/**
 * Authenticator for handling digit code authentication.
 * @psalm-api
 */
#[AsAlias(id: 'jazzfreunde.security.verification_code_authenticator')]
final class VerificationCodeAuthenticator extends AbstractAuthenticator implements InteractiveAuthenticatorInterface
{
    private array $options;

    /**
     * @param VerificationCodeHandlerInterface $verificationCodeHandler
     * @param HttpUtils $httpUtils
     * @param AuthenticationSuccessHandlerInterface $authenticationSuccessHandler
     * @param AuthenticationFailureHandlerInterface $authenticationFailureHandler
     * @param array<array-key, string|int> $options Options for the authenticator.
     * @psalm-api
     */
    public function __construct(
        private VerificationCodeHandlerInterface $verificationCodeHandler,
        private HttpUtils $httpUtils,
        #[Autowire('@jazzfreunde.security.verification_code_post_authentication_handler')]
        private AuthenticationSuccessHandlerInterface $authenticationSuccessHandler,
        #[Autowire('@jazzfreunde.security.verification_code_post_authentication_handler')]
        private AuthenticationFailureHandlerInterface $authenticationFailureHandler,
        #[Autowire('%jazzfreunde.security.verification_code.authenticator_options%')]
        array $options,
    ) {
        $this->options = $options;
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function supports(Request $request): ?bool
    {
        return $request->isMethod('POST')
            && $this->httpUtils->checkRequestPath($request, $this->getCheckRoute());
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function authenticate(Request $request): Passport
    {
        if (!$userIdentifier = $request->request->getString('user')) {
            throw new InvalidVerificationCodeAuthenticationException('Missing "user" parameter.');
        }

        if (!$hash = $request->request->getString('hash')) {
            throw new InvalidVerificationCodeAuthenticationException('Missing "hash" parameter.');
        }

        if (!$expires = $request->request->getInt('expires')) {
            throw new InvalidVerificationCodeAuthenticationException('Missing "expires" parameter.');
        }
    
        if (!$code = $request->request->getString('code')) {
            throw new InvalidVerificationCodeAuthenticationException('Missing "code" parameter.');
        }

        $userBadge = new UserBadge(
            $userIdentifier,
            function () use ($userIdentifier, $hash, $expires, $code) {
                try {
                    $user = $this->verificationCodeHandler->consumeVerificationCode(
                        $userIdentifier,
                        $hash,
                        $expires,
                        $code
                    );
                } catch (InvalidVerificationCodeException $e) {
                    throw new InvalidVerificationCodeAuthenticationException('Verification code could not be validated.', 0, $e);
                }

                return $user;
            }
        );

        return new SelfValidatingPassport($userBadge, []);
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        return $this->authenticationSuccessHandler->onAuthenticationSuccess($request, $token);
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        return $this->authenticationFailureHandler->onAuthenticationFailure($request, $exception);
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function isInteractive(): bool
    {
        return true;
    }

    /**
     * Returns the route to check for authentication.
     *
     * @return string
     * @throws InvalidArgumentException If the check route is not set or invalid.
     */
    private function getCheckRoute(): string
    {
        $value = $this->options['check_route'];

        if (!is_string($value) || empty($value)) {
            throw new InvalidArgumentException('The "check_route" option must be a non-empty string.');
        }

        return $value;
    }
}
