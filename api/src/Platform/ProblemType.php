<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Platform;

/**
 * Provides stable URN identifiers for API problem responses.
 */
final class ProblemType
{
    /** Base namespace for API problem type URNs. */
    public const BASE_URN = 'urn:jazzfreunde-ingolstadt-error';

    /**
     * Builds a problem type URN for the given error identifier.
     *
     * @param string $identifier Stable identifier for the problem type
     *
     * @return string The complete problem type URN
     */
    public static function from(string $identifier): string
    {
        return self::BASE_URN.':'.$identifier;
    }
}
