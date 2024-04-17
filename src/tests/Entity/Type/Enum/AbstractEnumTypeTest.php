<?php declare(strict_types = 1);
// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses

namespace JazzfreundeTests\App\Tests\Entity\Type\Enum;

use Jazzfreunde\App\Entity\Type\Enum\AbstractEnumType;
use PHPUnit\Framework\TestCase;

/**
 * Test Enum
 */
enum TestEnum: string
{
    case first = 'first';
    case second = 'second';
}

/**
 * Test Enum Type
 */
class TestEnumType extends AbstractEnumType
{
    public const ENTITY_NAME = 'test_enum';
    public const ENUM_CLASS_NAME = TestEnum::class;
}

/**
 * Test Enum Type
 */
class InvalidTestEnumType extends AbstractEnumType
{
    public const ENTITY_NAME = 'test_enum_invalid';
    public const ENUM_CLASS_NAME = 'invalid\\class';
}

/**
 * Test Enum Type
 */
class Invalid2TestEnumType extends AbstractEnumType
{
    public const ENTITY_NAME = 'test_enum_undefined';
}

/**
 * Testet die Basisklasse für Enum Typen.
 */
final class AbstractEnumTypeTest extends TestCase
{
    /**
     * Testet addType, wenn der Entity Name nicht definiert wurde.
     */
    public function testAddTypeUndefinedEntityName(): void
    {
        $this->expectException(\Jazzfreunde\App\Entity\Type\Enum\EntityNameUndefinedError::class);
        AbstractEnumType::addType('undefined', TestEnumType::class);
    }

    /**
     * Testet addType bei einem ungültigen Enum Typen.
     */
    public function testAddTypeInvalidEnumType(): void
    {
        $this->expectException(\Jazzfreunde\App\Entity\Type\Enum\InvalidEnumTypeNameError::class);
        InvalidTestEnumType::addType(InvalidTestEnumType::ENTITY_NAME, InvalidTestEnumType::class);
    }

    /**
     * Testet addType bei einem undefinierten Enum Typen.
     */
    public function testAddTypeUndefinedEnumType(): void
    {
        $this->expectException(\Jazzfreunde\App\Entity\Type\Enum\EnumClassNameUndefinedError::class);
        Invalid2TestEnumType::addType(Invalid2TestEnumType::ENTITY_NAME, Invalid2TestEnumType::class);
    }

    /**
     * Testet die Comment Vorgabe.
     */
    public function testSQLCommentHin(): void
    {
        $type = new TestEnumType();

        $this->assertEquals(true, $type->requiresSQLCommentHint($this->createMock(\Doctrine\DBAL\Platforms\AbstractPlatform::class)));
    }

    /**
     * Testet die SQL Deklaration.
     */
    public function testSQLDeclaration(): void
    {
        $type = new TestEnumType();

        $this->assertEquals("ENUM('first', 'second')", $type->getSQLDeclaration([], $this->createMock(\Doctrine\DBAL\Platforms\AbstractPlatform::class)));
    }

    /**
     * Testet die Konvertierung von Datenbankwerten.
     */
    public function testConvertToDatabaseValue(): void
    {
        $type = new TestEnumType();

        $this->assertEquals('first', $type->convertToDatabaseValue(TestEnum::first, $this->createMock(\Doctrine\DBAL\Platforms\AbstractPlatform::class)));
    }

    /**
     * Testet die Konvertierung von PHP Werten.
     */
    public function testConvertToPHPValue(): void
    {
        $type = new TestEnumType();

        $this->assertEquals(TestEnum::first, $type->convertToPHPValue('first', $this->createMock(\Doctrine\DBAL\Platforms\AbstractPlatform::class)));
    }

    /**
     * Testet die Konvertierung von Datenbankwerten, wenn es kein BackedEnum ist.
     */
    public function testConvertToDatabaseValueNotBackedEnum(): void
    {
        $type = new TestEnumType();

        $this->expectException(\Doctrine\DBAL\Types\ConversionException::class);
        $type->convertToDatabaseValue('first', $this->createMock(\Doctrine\DBAL\Platforms\AbstractPlatform::class));
    }

    /**
     * Testet die Konvertierung von PHP Werten, wenn der Eintrag im Enum nicht existiert.
     */
    public function testConvertToPHPValueEnumValueNotExist(): void
    {
        $type = new TestEnumType();

        $this->expectException(\Doctrine\DBAL\Types\ConversionException::class);
        $type->convertToPHPValue('third', $this->createMock(\Doctrine\DBAL\Platforms\AbstractPlatform::class));
    }

    /**
     * Testet die Konvertierung von PHP Werten, wenn der Wert kein String ist.
     */
    public function testConvertToPHPValueNotString(): void
    {
        $type = new TestEnumType();

        $this->expectException(\Doctrine\DBAL\Types\ConversionException::class);
        $type->convertToPHPValue(1, $this->createMock(\Doctrine\DBAL\Platforms\AbstractPlatform::class));
    }
}
