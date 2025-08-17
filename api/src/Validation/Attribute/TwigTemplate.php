<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Validation\Attribute;

use Attribute;
use Jazzfreunde\App\Validation\Validator\TwigTemplateValidator;
use Override;
use Symfony\Component\Validator\Constraint;

/**
 * Attribute to validate a string as a Twig template.
 * @see https://symfony.com/doc/current/mailer.html#twig-html-css
 *
 * @psalm-api
 */
#[Attribute]
final class TwigTemplate extends Constraint
{
    public string $message = 'The string "{{ string }}" is not a valid twig template path: it must have the .html.twig file extension.';

    /**
     * @param string|null $message
     * @param array<string, string>|null $groups
     * @param mixed|null $payload
     */
    public function __construct(?string $message = null, ?array $groups = null, $payload = null)
    {
        parent::__construct([], $groups, $payload);

        $this->message = $message ?? $this->message;
    }

    /**
     * Returns the name of the validator class.
     *
     * @return string
     */
    #[Override]
    public function validatedBy(): string
    {
        return TwigTemplateValidator::class;
    }
}
