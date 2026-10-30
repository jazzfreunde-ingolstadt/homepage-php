<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Validation\Validator;

use Jazzfreunde\Api\Validation\Attribute\TwigTemplate;
use Jazzfreunde\Api\Validation\Validator\TwigTemplateValidator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

/**
 * Tests for the TwigTemplateValidator class.
 *
 * @internal
 *
 * @coversNothing
 *
 * @extends ConstraintValidatorTestCase<TwigTemplateValidator>
 */
final class TwigTemplateValidatorTest extends ConstraintValidatorTestCase
{
    /**
     * Test valid input.
     */
    public function isValid(): void
    {
        $constraint = new TwigTemplate();

        $this->validator->validate('test.html.twig', $constraint);
        $this->assertNoViolation();
    }

    /**
     * Test invalid input.
     */
    #[Test]
    #[TestWith(['test.twig'])]
    #[TestWith(['test.html'])]
    #[TestWith(['.html.twig'])]
    #[TestWith(['test'])]
    public function testIsInvalid(
        string $input
    ): void {
        $constraint = new TwigTemplate(message: 'Test message');

        $this->validator->validate($input, $constraint);
        $this->buildViolation('Test message')
            ->setParameter('{{ string }}', $input)
            ->assertRaised();
    }

    /**
     * {@inheritDoc}
     */
    protected function createValidator(): TwigTemplateValidator
    {
        return new TwigTemplateValidator();
    }
}
