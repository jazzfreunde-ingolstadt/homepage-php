<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Scope;

use Jazzfreunde\Api\Service\Notification\Scope\Attribute\NotificationResource;
use Jazzfreunde\Api\Service\Notification\Scope\Parameter\ScopeParameterParser;
use Jazzfreunde\Api\Type\Primitive\Uri;
use Override;

/**
 * Compiles notification scopes.
 *
 * @psalm-api
 */
final class NotificationScopeCompiler implements NotificationScopeCompilerInterface
{
    /**
     * {@inheritdoc}
     *
     * @param class-string $entityClassName
     */
    #[Override]
    public function compile(NotificationResource $resource, string $entityClassName): CompiledScope
    {
        $uri = Uri::from($resource->uri);
        $segments = $uri->segments();
        $regexParts = [];
        $parameters = [];

        foreach ($segments as $segment) {
            if (ScopeParameterParser::isParameterSegment($segment)) {
                $parameter = ScopeParameterParser::parse($segment);
                $regexParts[] = '(?P<'.$parameter->name.'>'.$parameter->getRegex().')';
                $parameters[] = $parameter;
            } else {
                $regexParts[] = preg_quote($segment, '~');
            }
        }

        $regex = '~^/'.implode('/', $regexParts).'$~';

        return new CompiledScope($regex, $parameters, $entityClassName, $uri);
    }
}
