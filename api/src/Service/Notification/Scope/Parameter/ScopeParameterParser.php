<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Scope\Parameter;

use InvalidArgumentException;

/**
 * Parser for parameters in notification scope definitions, responsible for parsing parameter segments and creating parameter instances based on the defined pattern.
 */
final class ScopeParameterParser
{
    private const PARAMETER_PATTERN = '/\A\{([A-Za-z_]\w*)(?::(\w+))?\}\z/';
    private const PARAMETER_NAME_INDEX = 1;
    private const PARAMETER_TYPE_INDEX = 2;

    /**
     * Parses a parameter segment and returns an instance of the corresponding parameter.
     *
     * @param string $parameterSegment the parameter segment to parse
     *
     * @return AbstractParameter an instance of the corresponding parameter
     *
     * @throws InvalidArgumentException if the parameter segment is invalid or if the parameter type is unsupported
     */
    public static function parse(string $parameterSegment): AbstractParameter
    {
        if (!self::isParameterSegment($parameterSegment)) {
            throw new InvalidArgumentException('Invalid parameter segment: '.$parameterSegment);
        }

        preg_match(self::PARAMETER_PATTERN, $parameterSegment, $matches);

        $parameterName = $matches[self::PARAMETER_NAME_INDEX] ?? throw new InvalidArgumentException('Parameter name is missing in segment: '.$parameterSegment);
        $parameterType = $matches[self::PARAMETER_TYPE_INDEX] ?? 'string';

        return self::createParameterInstance($parameterType, $parameterName);
    }

    /**
     * Is the scopeSegment a parameter.
     *
     * @param string $scopeSegment
     *
     * @return bool
     */
    public static function isParameterSegment(string $scopeSegment): bool
    {
        return 1 === preg_match(self::PARAMETER_PATTERN, $scopeSegment);
    }

    private static function createParameterInstance(string $parameterType, string $parameterName): AbstractParameter
    {
        return match ($parameterType) {
            Number::getType() => new Number($parameterName),
            default => throw new InvalidArgumentException('Unsupported parameter type: '.$parameterType),
        };
    }
}
