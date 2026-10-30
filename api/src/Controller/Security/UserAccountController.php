<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Controller\Security;

use Jazzfreunde\Api\Service\Security\Attribute\FirewallEntryPoint;
use Jazzfreunde\Api\Service\Twig\PageTemplatePath;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Controller for user related requests.
 *
 * @psalm-suppress PropertyNotSetInConstructor $container
 *
 * @psalm-api
 */
#[FirewallEntryPoint(firewallName: 'main')]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/user', name: 'security_user_')]
final class UserAccountController extends AbstractController implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * Generate login email and start authentication process.
     *
     * @return Response
     */
    #[Route('/profile', name: 'profile', methods: [Request::METHOD_GET])]
    public function userProfile(): Response
    {
        return $this->render(
            PageTemplatePath::SECURITY_USER_PROFILE
        );
    }
}
