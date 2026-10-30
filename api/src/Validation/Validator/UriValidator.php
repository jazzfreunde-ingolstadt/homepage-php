<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Validation\Validator;

use Jazzfreunde\Api\Validation\Attribute\Uri;
use Override;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Validator for the Uri constraint.
 *
 * @psalm-api
 */
#[AutoconfigureTag('validator.constraint_validator')]
final class UriValidator extends ConstraintValidator
{
    /**
     * {@inheritDoc}
     */
    #[Override]
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof Uri) {
            throw new UnexpectedTypeException($constraint, Uri::class);
        }

        // Custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) to take care of that.
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        $parts = parse_url($value);

        if (is_array($parts)
            && str_starts_with($value, '/')
            && !str_contains($value, ' ')
            && !isset($parts['scheme'])
            && !isset($parts['host'])
            && !isset($parts['user'])
            && !isset($parts['pass'])
            && !isset($parts['port'])
            && isset($parts['path'])
            && str_starts_with($parts['path'], '/')
        ) {
            return;
        }

        $this->context->buildViolation($constraint->message)
            ->setParameter('{{ string }}', $value)
            ->addViolation();
    }
}
