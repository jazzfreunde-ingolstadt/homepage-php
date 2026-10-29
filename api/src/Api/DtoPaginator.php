<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Api;

use ApiPlatform\State\Pagination\PaginatorInterface;
use Closure;
use IteratorAggregate;
use Override;
use Traversable;

/**
 * Applies a mapper to each item while preserving pagination metadata.
 *
 * @template TSource of object
 * @template TDto of object
 *
 * @implements IteratorAggregate<mixed, TDto>
 * @implements PaginatorInterface<TDto>
 *
 * @psalm-api
 */
final class DtoPaginator implements IteratorAggregate, PaginatorInterface
{
    /**
     * @var Closure(TSource): TDto
     */
    private readonly Closure $mapper;

    /**
     * @param PaginatorInterface<TSource> $paginator
     * @param callable(TSource): TDto     $mapper
     */
    public function __construct(
        private readonly PaginatorInterface $paginator,
        callable $mapper,
    ) {
        $this->mapper = Closure::fromCallable($mapper);
    }

    #[Override]
    public function count(): int
    {
        return $this->paginator->count();
    }

    #[Override]
    public function getCurrentPage(): float
    {
        return $this->paginator->getCurrentPage();
    }

    #[Override]
    public function getItemsPerPage(): float
    {
        return $this->paginator->getItemsPerPage();
    }

    #[Override]
    public function getLastPage(): float
    {
        return $this->paginator->getLastPage();
    }

    #[Override]
    public function getTotalItems(): float
    {
        return $this->paginator->getTotalItems();
    }

    #[Override]
    public function getIterator(): Traversable
    {
        foreach ($this->paginator as $resource) {
            yield ($this->mapper)($resource);
        }
    }
}
