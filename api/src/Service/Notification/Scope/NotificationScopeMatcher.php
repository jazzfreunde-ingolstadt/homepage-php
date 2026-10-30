<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Scope;

use Jazzfreunde\Api\Exception\Notification\NotificationScopeMappingException;
use Jazzfreunde\Api\Type\Primitive\Uri;
use LogicException;
use stdClass;
use Symfony\Component\ObjectMapper\Exception\MappingException;
use Symfony\Component\ObjectMapper\Exception\MappingTransformException;
use Symfony\Component\ObjectMapper\Exception\NoSuchPropertyException;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;

use function is_null;
use function is_string;

/**
 * Matches and parses notification resource scopes.
 *
 * @psalm-api
 */
final class NotificationScopeMatcher
{
    public function __construct(
        private readonly NotificationScopeCollectionProviderInterface $collectionProvider,
        private readonly ObjectMapperInterface $objectMapper,
    ) {}

    public function isMatch(string $uri): bool
    {
        $matches = [];

        return null !== $this->matchRegex($uri, $matches);
    }

    public function parse(string $uri): ?ParsedScope
    {
        $matches = [];
        $scope = $this->matchRegex($uri, $matches);
        if (is_null($scope)) {
            return null;
        }

        $uri = new Uri($uri);
        $data = $this->parseScopeParameters($scope, $matches);

        try {
            $entity = $this->objectMapper->map($data, $scope->getEntityClassName());

            return new ParsedScope(
                $uri,
                $entity,
            );
        } catch (NoSuchPropertyException $e) {
            throw new NotificationScopeMappingException(
                sprintf(
                    'No such property for entity class "%s": %s',
                    $scope->getEntityClassName(),
                    $e->getMessage()
                )
            );
        } catch (MappingException $e) {
            throw new NotificationScopeMappingException(
                sprintf(
                    'Error mapping notification scope parameters for entity class "%s": %s',
                    $scope->getEntityClassName(),
                    $e->getMessage()
                )
            );
        } catch (MappingTransformException $e) {
            throw new NotificationScopeMappingException(
                sprintf(
                    'Error transforming notification scope parameters for entity class "%s": %s',
                    $scope->getEntityClassName(),
                    $e->getMessage()
                )
            );
        }
    }

    /**
     * @param array<int|string, null|string> $matches
     */
    private function matchRegex(string $uri, array &$matches): ?CompiledScope
    {
        $collection = $this->getCollection();
        foreach ($collection->all() as $scope) {
            if (1 === preg_match($scope->getRegex(), $uri, $matches, PREG_UNMATCHED_AS_NULL)) {
                return $scope;
            }
        }

        return null;
    }

    private function getCollection(): NotificationScopeCollection
    {
        return $this->collectionProvider->provide();
    }

    /**
     * @param array<int|string, null|string> $matches
     */
    private function parseScopeParameters(CompiledScope $scope, array $matches): stdClass
    {
        $data = new stdClass();
        foreach ($scope->getParameters() as $parameter) {
            $name = $parameter->getName();
            if (!array_key_exists($name, $matches)) {
                throw new LogicException(sprintf('Missing required parameter "%s" in matches.', $name));
            }

            $value = $matches[$name];
            if (!is_string($value)) {
                throw new LogicException(sprintf('Invalid parameter value for "%s".', $name));
            }

            $data->{$name} = $value;
        }

        return $data;
    }
}
