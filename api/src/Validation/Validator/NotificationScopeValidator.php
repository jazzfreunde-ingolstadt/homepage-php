<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Validation\Validator;

use Jazzfreunde\Api\Service\Notification\Scope\NotificationScopeMatcher;
use Jazzfreunde\Api\Validation\Attribute\NotificationScope;
use Override;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Validator for the notification scope constraint.
 *
 * @psalm-api
 */
#[AutoconfigureTag('validator.constraint_validator')]
final class NotificationScopeValidator extends ConstraintValidator
{
    public function __construct(
        private readonly NotificationScopeMatcher $scopeMatcher
    ) {}

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof NotificationScope) {
            throw new UnexpectedTypeException($constraint, NotificationScope::class);
        }

        // Custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) to take care of that.
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if ($this->scopeMatcher->isMatch($value)) {
            return;
        }

        $this->context->buildViolation($constraint->message)
            ->setParameter('{{ string }}', $value)
            ->addViolation();
    }
}
