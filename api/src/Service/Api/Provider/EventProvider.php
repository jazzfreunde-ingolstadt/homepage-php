<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Api\Provider;

use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\Pagination\PaginatorInterface;
use ApiPlatform\State\ProviderInterface;
use DateInterval;
use DateTimeImmutable;
use DateTimeZone;
use Jazzfreunde\App\Api\DtoPaginator;
use Jazzfreunde\App\Api\Event\Event;
use Jazzfreunde\App\Api\Notification\NotificationSource;
use Jazzfreunde\App\Api\Notification\Resource\EventNotification;
use Jazzfreunde\App\Entity\Event as EventEntity;
use Jazzfreunde\App\Service\Notification\Scope\NotificationUrlGeneratorInterface;
use LogicException;
use Override;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;
use Traversable;

/**
 * Provides event API resources with notification subscription data.
 *
 * @implements ProviderInterface<Event>
 *
 * @psalm-api
 */
final class EventProvider implements ProviderInterface
{
    /**
     * @param ProviderInterface<object>         $itemProvider
     * @param ProviderInterface<object>         $collectionProvider
     * @param ObjectMapperInterface             $objectMapper
     * @param NotificationUrlGeneratorInterface $notificationUrlGenerator
     */
    public function __construct(
        #[Autowire(service: 'api_platform.doctrine.orm.state.item_provider')]
        private readonly ProviderInterface $itemProvider,
        #[Autowire(service: 'api_platform.doctrine.orm.state.collection_provider')]
        private readonly ProviderInterface $collectionProvider,
        private readonly ObjectMapperInterface $objectMapper,
        private readonly NotificationUrlGeneratorInterface $notificationUrlGenerator,
    ) {}

    /**
     * @param array<string, mixed>                                                  $uriVariables
     * @param array{request?: Request, resource_class?: string, ...<string, mixed>} $context
     *
     * @return null|array<array-key, Event>|DtoPaginator<object, Event>|Event
     */
    #[Override]
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array|object|null
    {
        $provider = $operation instanceof CollectionOperationInterface
            ? $this->collectionProvider
            : $this->itemProvider;

        return $this->mapData($provider->provide($operation, $uriVariables, $context));
    }

    /**
     * @return null|array<array-key, Event>|DtoPaginator<object, Event>|Event
     */
    private function mapData(mixed $data): array|object|null
    {
        if (null === $data) {
            return null;
        }

        if ($data instanceof PaginatorInterface) {
            return new DtoPaginator(
                paginator: $data,
                mapper: fn (object $source): Event => $this->mapEvent($source),
            );
        }

        if (is_array($data)) {
            return array_map(fn (mixed $source): Event => $this->mapEvent($source), $data);
        }

        if ($data instanceof Traversable) {
            return array_map(
                fn (mixed $source): Event => $this->mapEvent($source),
                iterator_to_array($data),
            );
        }

        return $this->mapEvent($data);
    }

    private function mapEvent(mixed $source): Event
    {
        if (!$source instanceof EventEntity) {
            throw new LogicException(sprintf('Expected an instance of %s.', EventEntity::class));
        }

        $event = $this->objectMapper->map($source, Event::class);

        $notificationAvailableAfter = (new DateTimeImmutable(timezone: new DateTimeZone('Europe/Berlin')))
            ->add(new DateInterval('P3D'));

        if ($event->start >= $notificationAvailableAfter) {
            $event->notificationSource = new NotificationSource(
                resourceScope: $this->notificationUrlGenerator->generate(new EventNotification($event->id)),
                expirationTime: DateTimeImmutable::createFromMutable($event->end),
            );
        }

        return $event;
    }
}
