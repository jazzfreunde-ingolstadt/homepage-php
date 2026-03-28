# AGENTS

## Temporary Test Database Setup

Integration tests can initialize a temporary schema with `SetupDatabaseTrait`.

### Minimal example

```php
use Jazzfreunde\UnitTest\Trait\SetupDatabaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class ExampleTest extends KernelTestCase
{
    use SetupDatabaseTrait;

    public function testSomething(): void
    {
        $kernel = $this->bootKernel();
        $this->initDatabase($kernel);

        // Arrange / Act / Assert
    }
}
```

### Notes

- `initDatabase()` updates the schema from current Doctrine metadata.
- Use this in integration tests that need real persistence behavior.
- Keep test data isolated per test method.

## Mocking With MockingTrait

`MockingTrait` provides a short helper for PHPUnit mocks in unit tests.

### Minimal example

```php
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use PHPUnit\Framework\TestCase;

final class ExampleUnitTest extends TestCase
{
    use MockingTrait;

    public function testSomething(): void
    {
        $dependency = $this->mock(SomeDependency::class);
        $dependency->expects($this->once())->method('run');

        $dependency->run();
    }
}
```

### Notes

- Use this for focused unit tests where dependencies should be mocked.
- Prefer explicit expectations (`once`, `never`, `exactly`) for behavior checks.

## UnitUnderTest Helper

`UnitUnderTest` auto-constructs the class under test and creates mocks for constructor dependencies.

### Example use case

- Handler or service classes with several constructor dependencies.
- Tests where you want to configure only one or two mocked dependencies explicitly.
- Cases with scalar constructor arguments that should be set via `configure()`.

### Minimal example

```php
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\TestCase;

final class ExampleHandlerTest extends TestCase
{
    public function testHandle(): void
    {
        $uut = new UnitUnderTest(ExampleHandler::class);

        $uut->mock(ExampleDependency::class)
            ->expects($this->once())
            ->method('run');

        $uut->target()->handle();
    }
}
```

### Notes

- `target()` lazily constructs the class under test.
- `mock(ClassName::class)` returns the same mock instance for repeated calls.
- Use `configure('argumentName', value)` for built-in constructor parameters.
