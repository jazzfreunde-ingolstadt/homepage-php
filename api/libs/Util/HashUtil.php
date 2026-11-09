<?php

declare(strict_types=1);

namespace Jazzfreunde\Util;

/**
 * Utility class for hash operations.
 */
abstract class HashUtil
{
    /**
     * Hashes the given parts using SHA-256 with null-byte separators.
     */
    public static function sha256(string ...$parts): string
    {
        return hash('sha256', implode("\0", $parts));
    }
}
