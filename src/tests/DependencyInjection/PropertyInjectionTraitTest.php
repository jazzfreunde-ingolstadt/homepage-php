<?php declare(strict_types = 1);
// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses

namespace JazzfreundeTests\App\Tests\Entity\Contract;

use InvalidArgumentException;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Type\Primitive\PrimitiveTypeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Dummy enum for testing property injection
 */
enum DummyEnum: string
{
    case FOO = 'foo';
    case BAR = 'bar';
}

/**
 * Dummy type for testing property injection
 */
class DummyType implements PrimitiveTypeInterface
{
    private string $value;

    /**
     * @inheritDoc
     */
    public static function tryFrom(mixed $value): static|null
    {
        if (!is_string($value)) {
            return null;
        }
        return new self($value);
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->value;
    }
}

/**
 * Dummy complex type for testing property injection
 */
class DummyComplexType implements DummyInterface1, DummyInterface2
{
    /**
     * @param string $value
     */
    public function __construct(public string $value)
    {
    }

    /**
     * @inheritDoc
     */
    public function getValue(): string
    {
        return $this->value;
    }
}

/**
 * Dummy interface for testing property injection
 */
interface DummyInterface1
{
    /**
     * @return string
     */
    public function getValue(): string;
}

/**
 * Dummy interface for testing property injection
 */
interface DummyInterface2
{
    /**
     * @return string
     */
    public function getValue(): string;
}

/**
 * Dummy class for testing property injection
 */
class DummyClass
{
    use PropertyInjectionTrait;

    public string $name;
    public int $age;
    public ?string $nullable;
    public DummyEnum $enum;
    public DummyEnum|string $enumOrString;
    public DummyType $type;
    public DummyType|int $typeOrInt;
    public array $array;
    public DummyComplexType $complexType;
    public DummyInterface1&DummyInterface2 $complexTypeAndInterface;
}

/**
 * Test for email confirmation service
 */
final class PropertyInjectionTraitTest extends TestCase
{

    /**
     * Test injecting one property
     */
    public function testInjectingOneProperty(): void
    {
        $dummy = new DummyClass(name:'John');
        $this->assertEquals('John', $dummy->name);
    }

    /**
     * Test injecting multiple properties
     */
    public function testInjectingMultipleProperties(): void
    {
        $dummy = new DummyClass(name:'John', age: 30);
        $this->assertEquals('John', $dummy->name);
        $this->assertEquals(30, $dummy->age);
    }

    /**
     * Test injecting nullable property
     */
    public function testInjectingNullableProperty(): void
    {
        $dummy = new DummyClass(nullable: null);
        $this->assertNull($dummy->nullable);
    }

    /**
     * Test injecting enum property
     */
    public function testInjectingEnumProperty(): void
    {
        $dummy = new DummyClass(enum: DummyEnum::FOO);
        $this->assertEquals(DummyEnum::FOO, $dummy->enum);
    }

    /**
     * Test injecting enum property with value of enum
     */
    public function testInjectingEnumPropertyWithBackedValue(): void
    {
        $dummy = new DummyClass(enum: 'foo');
        $this->assertEquals(DummyEnum::FOO, $dummy->enum);
    }

    /**
     * Test injecting enum or string property
     */
    public function testInjectingEnumOrStringProperty(): void
    {
        $dummy = new DummyClass(enumOrString: DummyEnum::FOO);
        $this->assertEquals(DummyEnum::FOO, $dummy->enumOrString);
        $dummy = new DummyClass(enumOrString: 'string');
        $this->assertEquals('string', $dummy->enumOrString);
    }

    /**
     * Test injecting type property
     */
    public function testInjectingTypeProperty(): void
    {
        $dummy = new DummyClass(type: DummyType::tryFrom('foo'));
        $this->assertEquals(DummyType::tryFrom('foo'), $dummy->type);
    }

    /**
     * Test injecting type property with value of type
     */
    public function testInjectingTypePropertyWithBackedValue(): void
    {
        $dummy = new DummyClass(type: 'foo');
        $this->assertEquals(DummyType::tryFrom('foo'), $dummy->type);
    }

    /**
     * Test injecting array property
     */
    public function testInjectingArrayProperty(): void
    {
        $dummy = new DummyClass(array: ['foo', 'bar']);
        $this->assertEquals(['foo', 'bar'], $dummy->array);
    }

    /**
     * Test injecting primitive type or string property
     */
    public function testInjectingTypeOrStringProperty(): void
    {
        $dummy = new DummyClass(typeOrInt: DummyType::tryFrom('foo'));
        $this->assertEquals(DummyType::tryFrom('foo'), $dummy->typeOrInt);
        $dummy = new DummyClass(typeOrInt: 1337);
        $this->assertEquals(1337, $dummy->typeOrInt);
    }

    /**
     * Test injecting object property
     */
    public function testInjectingComplexTypeProperty(): void
    {
        $complexType = new DummyComplexType('John');
        $dummy = new DummyClass(complexType: $complexType);
        $this->assertEquals($complexType, $dummy->complexType);
    }

    /**
     * Test injecting object and interface property
     */
    public function testInjectingComplexTypeAndInterfaceProperty(): void
    {
        $complexType = new DummyComplexType('John');
        $dummy = new DummyClass(complexTypeAndInterface: $complexType);
        $this->assertEquals($complexType, $dummy->complexTypeAndInterface);
    }

    /**
     * Test injecting invalid argument
     */
    public function testInjectingInvalidArgument(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Property 'age' must be of type 'int', 'string' given.");
        new DummyClass(age: 'foo');
    }
}
