<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Scope;

use Jazzfreunde\Api\Type\Primitive\Uri;

/**
 * Represents a parsed notification scope.
 */
final class ParsedScope
{
    /**
     * @param Uri    $matchedScope the URI of the matched notification scope
     * @param object $dto          the data transfer object representing the parsed scope
     */
    public function __construct(
        public readonly Uri $matchedScope,
        public readonly object $dto,
    ) {}
}
