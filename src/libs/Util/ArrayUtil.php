<?php declare(strict_types = 1);

namespace Jazzfreunde\Util;

/**
 * Utility class for array operations.
 */
abstract class ArrayUtil
{

    /**
     * Prüft, ob es sich bei dem übergebenen Array um ein assoziatives Array handelt.
     *
     * @param array $array
     * @return boolean
     */
    public static function isAssociativeArray(array &$array): bool
    {
        $isAssociative = fn(bool $carry, string|int $element): bool => !(!$carry ?: !is_string($element));
        
        return array_reduce(array_keys($array), $isAssociative, true);
    }
}
