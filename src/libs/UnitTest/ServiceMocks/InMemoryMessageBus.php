<?php declare(strict_types=1);

namespace Jazzfreunde\UnitTest\ServiceMocks;

use Override;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\StampInterface;

/**
 * Mock implementation of the MessageBusInterface for integration testing.
 *
 * This class is used to simulate the behavior of a message bus in a test environment.
 * It allows direct access to all dispatched messages.
 * @psalm-suppress UnusedClass
 */
final class InMemoryMessageBus implements MessageBusInterface
{
    /**
     * @var Envelope[]
     */
    private array $dispatchedMessages = [];

    /**
     * @inheritDoc
     * @psalm-suppress MoreSpecificImplementedParamType
     * @psalm-suppress ArgumentTypeCoercion
     */
    #[Override]
    public function dispatch(object $message, array $stamps = []): Envelope
    {
        $envelope = Envelope::wrap($message, $stamps);

        $this->dispatchedMessages[] = $envelope;

        return $envelope;
    }

    /**
     * All dispatched messages.
     *
     * @return Envelope[]
     */
    public function getDispatchedMessages(): array
    {
        return $this->dispatchedMessages;
    }
}
