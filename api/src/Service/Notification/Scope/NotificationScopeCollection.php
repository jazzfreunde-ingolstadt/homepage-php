<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Scope;

use Countable;
use IteratorAggregate;
use Override;
use Traversable;

/**
 * Collection of notification scopes.
 * A serializable collection that holds multiple notification scopes.
 *
 * @implements IteratorAggregate<int, CompiledScope>
 *
 * @psalm-api
 */
final class NotificationScopeCollection implements Countable, IteratorAggregate
{
    /** @var array<int, CompiledScope> */
    private array $scopes = [];

    public function add(CompiledScope $scope): void
    {
        $this->scopes[] = $scope;
    }

    /**
     * Returns all compiled notification scopes in the collection.
     *
     * @return array<int, CompiledScope>
     */
    public function all(): array
    {
        return $this->scopes;
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function count(): int
    {
        return count($this->scopes);
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getIterator(): Traversable
    {
        yield from $this->scopes;
    }
}
