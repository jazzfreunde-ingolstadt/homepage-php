<?php declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Validation\Validator;

use Jazzfreunde\App\Validation\Attribute\TwigTemplate;
use Jazzfreunde\App\Validation\Validator\TwigTemplateValidator;
use PHPUnit\Framework\Attributes\TestWith;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

/**
 * Tests for the TwigTemplateValidator class.
 */
final class TwigTemplateValidatorTest extends ConstraintValidatorTestCase
{
    /**
     * @inheritDoc
     */
    protected function createValidator(): TwigTemplateValidator
    {
        return new TwigTemplateValidator();
    }

    /**
     * Test valid input.
     *
     * @return void
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
}
