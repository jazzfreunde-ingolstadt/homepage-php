<?php declare(strict_types = 1);
// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses

namespace JazzfreundeTests\App\Tests\DependencyInjection;

use InvalidArgumentException;
use Jazzfreunde\App\DependencyInjection\FromMetaDataTrait;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Dummy class for testing the FromMetaDataTrait.
 */
class DummyMetaDataClass
{
    use FromMetaDataTrait;

    #[Length(min: 5, max: 255)]
    public string $name;
    public int $age;
    public ?string $nullable;
}

/**
 * Tests for the FromMetaDataTrait.
 */
final class FromMetaDataTraitTest extends TestCase
{
    use MockingTrait;

    /**
     * Test that the fromMetaData method rejects malformed data.
     *
     * @return void
     */
    public function testDataArrayIsNotAssociativeArray(): void
    {
        $validator = $this->mock(ValidatorInterface::class);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('data must be an associative array');

        DummyMetaDataClass::fromMetaData(
            $validator,
            ['foo', 'bar']
        );
    }

    /**
     * Test that the fromMetaData initializes the object correctly.
     *
     * @return void
     */
    public function testCreateInstanceFromMetaData():void
    {
        $validator = $this->mockValidator(0);
        $instance = DummyMetaDataClass::fromMetaData(
            $validator,
            [
                'name' => 'John Doe',
                'age' => 30,
                'nullable' => null,
            ]
        );

        $this->assertInstanceOf(DummyMetaDataClass::class, $instance);
        $this->assertSame('John Doe', $instance->name);
        $this->assertSame(30, $instance->age);
        $this->assertNull($instance->nullable);
    }

    /**
     * Test that the fromMetaData method throws a ValidationFailedException
     * if the validation fails.
     *
     * @return void
     */
    public function testCreateInstanceFromMetaDataWithValidationError(): void
    {
        $validator = $this->mockValidator(1);

        $this->expectException(ValidationFailedException::class);

        DummyMetaDataClass::fromMetaData(
            $validator,
            [
                'name' => 'Short',
                'age' => 30,
            ]
        );
    }

    /**
     * Test that the fromMetaData method throws no exception if data contains additional properties
     * These should be ignored.
     *
     * @return void
     */
    public function testOnlyAssignValuesToExistingProperties(): void
    {
        $validator = $this->mockValidator(0);
        $instance = DummyMetaDataClass::fromMetaData(
            $validator,
            [
                'name' => 'John Doe',
                'age' => 30,
                'nonExistingProperty' => 'foo',
            ]
        );

        $this->assertInstanceOf(DummyMetaDataClass::class, $instance);
        $this->assertSame('John Doe', $instance->name);
        $this->assertSame(30, $instance->age);
    }

    /**
     * Mock validator.
     *
     * @param int $errorCount error count after validation
     * @return ValidatorInterface&MockObject
     */
    private function mockValidator(
        int $errorCount
    ): ValidatorInterface&MockObject {
        $violationList = $this->mock(ConstraintViolationListInterface::class);
        $violationList
            ->method('count')
            ->willReturn($errorCount);

        $validator = $this->mock(ValidatorInterface::class);
        $validator
            ->expects($this->once())
            ->method('validate')
            ->willReturn($violationList);

        return $validator;
    }
}
