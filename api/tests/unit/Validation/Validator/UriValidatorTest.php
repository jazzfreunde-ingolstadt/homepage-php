<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Validation\Validator;

use Jazzfreunde\Api\Validation\Attribute\Uri;
use Jazzfreunde\Api\Validation\Validator\UriValidator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

/**
 * Tests for the UriValidator class.
 *
 * @internal
 *
 * @coversNothing
 *
 * @extends ConstraintValidatorTestCase<UriValidator>
 */
final class UriValidatorTest extends ConstraintValidatorTestCase
{
    /**
     * Test valid input.
     */
    #[Test]
    #[TestWith(['/resource'])]
    #[TestWith(['/resource/sub-resource'])]
    #[TestWith(['/api/v1/notifications?topic=concert'])]
    #[TestWith(['/api/v1/notifications#anchor'])]
    public function isValid(string $input): void
    {
        $constraint = new Uri();

        $this->validator->validate($input, $constraint);
        $this->assertNoViolation();
    }

    /**
     * Test invalid input.
     */
    #[Test]
    #[TestWith(['resource'])]
    #[TestWith(['http://example.org/resource'])]
    #[TestWith(['https://example.org/resource'])]
    #[TestWith(['//example.org/resource'])]
    #[TestWith(['/resource with-space'])]
    public function isInvalid(string $input): void
    {
        $constraint = new Uri(message: 'Test message');

        $this->validator->validate($input, $constraint);
        $this->buildViolation('Test message')
            ->setParameter('{{ string }}', $input)
            ->assertRaised();
    }

    /**
     * {@inheritDoc}
     */
    protected function createValidator(): UriValidator
    {
        return new UriValidator();
    }
}
