<?php declare(strict_types = 1);

namespace Jazzfreunde\App\DependencyInjection;

use DomainException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Trait to ensure Typesafety in meta data.
 */
trait FromMetaDataTrait
{
    /**
     * Create a meta data object from the given data.
     *
     * @param ValidatorInterface $validator Validator to validate the object
     * @param array $data Associative array of data to populate the object
     * @return static
     * @throws DomainException
     */
    public static function fromMetaData(
        ValidatorInterface $validator,
        array $data,
    ): static {
        $data = array_filter($data, static fn ($name) => property_exists(static::class, $name), ARRAY_FILTER_USE_KEY);

        $instance = new static(...$data);

        if (0 < count($validator->validate($instance))) {
            throw new DomainException('Invalid subscription data');
        }

        return $instance;
    }
}
