<?php declare(strict_types = 1);

namespace Jazzfreunde\App\DependencyInjection;

use InvalidArgumentException;
use Jazzfreunde\Util\ArrayUtil;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Trait to ensure Typesafety in meta data.
 */
trait FromMetaDataTrait
{
    use PropertyInjectionTrait;

    /**
     * Create a meta data object from the given data.
     *
     * @param ValidatorInterface $validator Validator to validate the object
     * @param array<array-key, mixed> $data Associative array of data to populate the object
     * @return static
     * @throws ValidationFailedException if the data validation for the domain model fails
     * @throws InvalidArgumentException if the data passed is not an associative array
     */
    public static function fromMetaData(
        ValidatorInterface $validator,
        array $data,
    ): static {
        if (!ArrayUtil::isAssociativeArray($data)) {
            throw new InvalidArgumentException('data must be an associative array');
        }

        $data = array_filter(
            $data,
            static fn (string|int $name): bool => is_string($name) && property_exists(static::class, $name),
            ARRAY_FILTER_USE_KEY
        );

        $instance = new static(...$data);
        $violationList = $validator->validate($instance);

        if (0 < count($violationList)) {
            throw new ValidationFailedException($instance, $violationList);
        }

        return $instance;
    }
}
