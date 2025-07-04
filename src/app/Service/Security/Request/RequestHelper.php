<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Security\Request;

use InvalidArgumentException;
use Jazzfreunde\App\Type\Primitive\Email;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Helper class for managing session data.
 */
abstract class RequestHelper
{
    /**
     * Redirects the user back to the origin page.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public static function redirectToOrigin(Request $request, string $default): RedirectResponse
    {
        $url = self::getRedirectUri($request, $default);

        return new RedirectResponse($url);
    }

    /**
     * Get the user email from request.
     *
     * @param Request $request
     * @return Email|null
     * @throws InvalidArgumentException If the email is not valid.
     */
    public static function getUserEmailFromPost(Request $request): ?Email
    {
        $value = $request->request->get('email');

        if (!is_string($value) || empty($value)) {
            return null;
        }

        $email = Email::tryFrom($value);

        if (!$email instanceof Email) {
            throw new InvalidArgumentException('Email is not valid.');
        }

        return $email;
    }

    /**
     * Get the URI to redirect to after authentication.
     *
     * @param Request $request
     * @param ?string $default
     * @return string
     */
    public static function getRedirectUri(Request $request, ?string $default = null): string
    {
        $origin = $request->headers->get('referer', $default);
        $origin ??= $request->getRequestUri();

        return $origin;
    }
}
