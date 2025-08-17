<?php

declare(strict_types=1);

namespace Jazzfreunde\App\DependencyInjection\Compiler;

use Generator;
use Override;
use ReflectionClass;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Finder\Finder;

use function is_string;
use function sprintf;
use function array_key_exists;
use function preg_replace;
use function is_null;

/**
 * Compiler pass to register all Doctrine custom types from the project.
 */
final readonly class DoctrineTypeRegisterCompilerPass implements CompilerPassInterface
{
    private const CONTAINER_TYPES_PARAMETER = 'doctrine.dbal.connection_factory.types';
    private const SRC_FOLDER_MASK           = '%s/src/Entity/Type';
    private const TOP_LEVEL_NAMESPACE       = 'Jazzfreunde\\App\\Entity\\Type\\';
    private const TYPE_NAME_CONSTANT_NAME   = 'ENTITY_NAME';

    /**
     * @param string $projectDir
     */
    public function __construct(
        private string $projectDir,
    ) {
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function process(ContainerBuilder $container): void
    {
        /** @var array<string, array{class: class-string}> $typeDefinition */
        $typeDefinition = $container->getParameter(self::CONTAINER_TYPES_PARAMETER);
        $types = $this->generateTypes();

        /** @var array{namespace: string, name: string} $type */
        foreach ($types as $type) {
            $name      = $type['name'];
            $namespace = $type['namespace'];

            if (array_key_exists($name, $typeDefinition)) {
                continue;
            }

            $typeDefinition[$name] = ['class' => $namespace];
        }

        $container->setParameter(self::CONTAINER_TYPES_PARAMETER, $typeDefinition);
    }

    /**
     * @return Generator<int, array{namespace: class-string, name: string}>
     */
    private function generateTypes(): iterable
    {
        $finder = new Finder();
        $finder->files()->in(sprintf(self::SRC_FOLDER_MASK, $this->projectDir))->name('*Type.php');
        

        foreach ($finder as $file) {
            $path = $file->getRelativePathname();
            $normalized = self::TOP_LEVEL_NAMESPACE.str_replace('/', '\\', $path);
            /** @var class-string|null */
            $className = preg_replace('/\.php$/', '', $normalized);

            if (is_null($className)) {
                continue;
            }

            $reflection = new ReflectionClass($className);

            if (!$reflection->hasConstant(self::TYPE_NAME_CONSTANT_NAME)) {
                continue;
            }

            $constantValue = $reflection->getConstant(self::TYPE_NAME_CONSTANT_NAME);

            if (!is_string($constantValue) || $constantValue === 'undefined') {
                continue;
            }

            yield [
                'namespace' => $reflection->getName(),
                'name'      => $constantValue,
            ];
        }
    }
}
