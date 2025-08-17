<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Security\EntryPoint;

use Jazzfreunde\App\Service\Security\Request\RequestHelper;
use Jazzfreunde\App\Service\Security\Request\SessionHelper;
use Override;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

use function is_null;

/**
 * Entry point for handling authentication requests that require a verification code.
 *
 * This entry point redirects the user to the verification code login page when
 * an authentication exception occurs, such as when a user tries to access a secured
 * resource without providing a valid verification code.
 *
 * @psalm-api
 */
#[AsAlias(id: 'jazzfreunde.security.verification_code_entry_point')]
final class AuthenticationEntryPoint implements AuthenticationEntryPointInterface
{
    /**
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
        private Security $security,
    ) {
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function start(Request $request, ?AuthenticationException $authException = null): RedirectResponse
    {
        $firewallName = $this->security->getFirewallConfig($request)?->getName();

        if (is_null($firewallName)) {
            throw new \LogicException('Unable to load firewall for the request.');
        }
        
        $entryPointRouteName = match ($firewallName) {
            'low_trust' => 'security_code_login',
            'main' => 'security_link_login',
            default => throw new \LogicException("Unknown firewall name: '$firewallName'"),
        };
        
        $redirectUri = RequestHelper::getRedirectUri($request);
        SessionHelper::setRedirectUri($request->getSession(), $redirectUri);

        $url = $this->urlGenerator->generate($entryPointRouteName);

        return new RedirectResponse($url);
    }
}
