<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Validation\Validator;

use Jazzfreunde\App\Validation\Attribute\TwigTemplate;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Validator for the TwigTemplate constraint.
 *
 * @psalm-api
 */
final class TwigTemplateValidator extends ConstraintValidator
{
    /**
     * @inheritDoc
     */
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof TwigTemplate) {
            throw new UnexpectedTypeException($constraint, TwigTemplate::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) to take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if (str_ends_with($value, '.html.twig') && strlen($value) > 10) {
            return;
        }

        $this->context->buildViolation($constraint->message)
            ->setParameter('{{ string }}', $value)
            ->addViolation();
    }
}
