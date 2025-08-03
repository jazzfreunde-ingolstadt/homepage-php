<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Security\VerificationCode;

use Jazzfreunde\App\Service\Security\Request\SessionHelper;
use LogicException;
use Override;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\HttpFoundation\Exception\SessionNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\FlashBagAwareSessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\HttpUtils;

use function sprintf;
use function get_debug_type;

/**
 * Default handler for authentication success and failure.
 * Redirects to a target URL based on request parameters or default settings.
 * @psalm-api
 */
#[AsAlias(id: 'jazzfreunde.security.verification_code_post_authentication_handler')]
final class PostAuthenticationHandler implements
    AuthenticationSuccessHandlerInterface,
    AuthenticationFailureHandlerInterface
{
    /**
     * @param HttpUtils $httpUtils
     * @param UrlGeneratorInterface $urlGenerator
     * @psalm-api
     */
    public function __construct(
        protected HttpUtils $httpUtils,
        protected UrlGeneratorInterface $urlGenerator,
    ) {
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function onAuthenticationSuccess(Request $request, TokenInterface $token): ?Response
    {
        $redirectUri = SessionHelper::getRedirectUri($request->getSession())
            ?? $this->httpUtils->generateUri($request, 'home');

        SessionHelper::clearRedirectUri($request->getSession());

        return $this->httpUtils->createRedirectResponse($request, $redirectUri);
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        try {
            $session = $request->getSession();
        } catch (SessionNotFoundException $e) {
            throw new LogicException('You cannot use the flash messages if there is no active session.', 0, $e);
        }

        if (!$session instanceof FlashBagAwareSessionInterface) {
            throw new LogicException(sprintf('You cannot use the addFlash method because class "%s" doesn\'t implement "%s".', get_debug_type($session), FlashBagAwareSessionInterface::class));
        }
        
        $url = $this->urlGenerator->generate(
            'security_code_verification',
        );
        $session->getFlashBag()->add('error', 'Der eingegebene Code ist ungültig. Sie erhalten eine neue Verifizierungsaufforderung per E-Mail.');
        return $this->httpUtils->createRedirectResponse($request, $url, 307);
    }
}
