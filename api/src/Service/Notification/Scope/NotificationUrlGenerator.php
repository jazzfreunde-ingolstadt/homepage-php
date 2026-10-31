<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Scope;

use Jazzfreunde\Api\Platform\Notification\Resource\EventNotification;
use LogicException;
use Override;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

use function get_class;
use function is_a;
use function is_array;
use function is_scalar;
use function sprintf;

/**
 * Generates notification URLs from resource objects and their compiled scopes.
 *
 * Example input: `new EventNotification(42)`.
 * `EventNotification` declares `#[NotificationResource(uri: '/events/{id:number}')]`.
 * Example output: `/events/42`.
 *
 * @see EventNotification
 *
 * @psalm-api
 */
final class NotificationUrlGenerator implements NotificationUrlGeneratorInterface
{
    /**
     * Creates a notification URL generator.
     *
     * @param NotificationScopeCollectionProviderInterface $collectionProvider Provides compiled notification scopes
     * @param NormalizerInterface                          $normalizer         Normalizes resource objects for parameter lookup
     */
    public function __construct(
        private readonly NotificationScopeCollectionProviderInterface $collectionProvider,
        private readonly NormalizerInterface $normalizer,
    ) {}

    /** {@inheritdoc} */
    #[Override]
    public function generate(object $object): string
    {
        $collection = $this->getCollection();
        foreach ($collection->all() as $scope) {
            if (is_a($object, $scope->entityClassName)) {
                return $this->generateScopeUri($scope, $object);
            }
        }

        throw new LogicException(sprintf("No suitable notification source found for resource scope: '%s'", get_class($object)));
    }

    private function getCollection(): NotificationScopeCollection
    {
        return $this->collectionProvider->provide();
    }

    private function generateScopeUri(CompiledScope $scope, object $object): string
    {
        $data = $this->normalizer->normalize($object);
        if (!is_array($data)) {
            throw new LogicException('Unable to normalize resource for notification scope URI.');
        }

        $replacements = [];
        foreach ($scope->parameters as $parameter) {
            $parameterName = $parameter->name;
            if (!isset($data[$parameterName])) {
                throw new LogicException(sprintf("Missing value for parameter '%s'", $parameterName));
            }

            if (!is_scalar($data[$parameterName])) {
                throw new LogicException(sprintf("Value for parameter '%s' must be scalar", $parameterName));
            }

            $placeholder = sprintf('{%s:%s}', $parameterName, $parameter::getType());
            $replacements[$placeholder] = (string) $data[$parameterName];
        }

        return strtr($scope->uri->value(), $replacements);
    }
}
