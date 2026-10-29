<?php

declare(strict_types=1);

namespace Jazzfreunde\Util;

/**
 * Utility class for array operations.
 */
abstract class ArrayUtil
{
    /**
     * Checks if the given array is an associative array.
     *
     * @param array<array-key, mixed> $array
     *
     * @return bool
     */
    public static function isAssociativeArray(array &$array): bool
    {
        $isAssociative = fn (bool $carry, int|string $element): bool => !(!$carry ?: !is_string($element));

        return array_reduce(array_keys($array), $isAssociative, true);
    }
}
