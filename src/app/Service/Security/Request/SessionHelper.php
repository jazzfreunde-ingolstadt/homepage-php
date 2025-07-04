<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Security\Request;

use Jazzfreunde\App\Type\Primitive\Email;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use function is_string;

/**
 * Helper class for managing session data.
 */
abstract class SessionHelper
{
    /**
     * Get the redirect URI from the session.
     *
     * @param SessionInterface $session
     * @return string|null
     */
    public static function getRedirectUri(SessionInterface $session): ?string
    {
        $value = $session->get('redirect_uri');

        if (!is_string($value) || empty($value)) {
            return null;
        }

        return $value;
    }

    /**
     * Set the redirect URI in the session.
     *
     * @param SessionInterface $session
     * @param string $uri
     */
    public static function setRedirectUri(SessionInterface $session, string $uri): void
    {
        $session->set('redirect_uri', $uri);
    }

    /**
     * Clear the redirect URI from the session.
     *
     * @param SessionInterface $session
     */
    public static function clearRedirectUri(SessionInterface $session): void
    {
        $session->remove('redirect_uri');
    }

    /**
     * Get the user email from the session.
     *
     * @param SessionInterface $session
     * @return ?Email
     */
    public static function getUserEmail(SessionInterface $session): ?   Email
    {
        $value = $session->get('user_email');

        if (!is_string($value) || empty($value)) {
            return null;
        }

        return new Email($value);
    }

    /**
     * Set the user email in the session.
     *
     * @param SessionInterface $session
     * @param Email $email
     */
    public static function setUserEmail(SessionInterface $session, Email $email): void
    {
        $session->set('user_email', (string) $email);
    }
}
