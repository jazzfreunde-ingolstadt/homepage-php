<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Validation\Attribute;

use Attribute;
use Jazzfreunde\Api\Validation\Validator\TwigTemplateValidator;
use Override;
use Symfony\Component\Validator\Constraint;

/**
 * Attribute to validate a string as a Twig template.
 *
 * @see https://symfony.com/doc/current/mailer.html#twig-html-css
 *
 * @psalm-api
 */
#[Attribute]
final class TwigTemplate extends Constraint
{
    public string $message = 'The string "{{ string }}" is not a valid twig template path: it must have the .html.twig file extension.';

    /**
     * @param null|string                $message
     * @param null|array<string, string> $groups
     * @param null|mixed                 $payload
     */
    public function __construct(?string $message = null, ?array $groups = null, $payload = null)
    {
        parent::__construct(null, $groups, $payload);

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
