<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\DependencyInjection\Compiler;

use Generator;
use Jazzfreunde\Api\Service\Notification\Scope\Attribute\NotificationResource;
use LogicException;
use Override;
use ReflectionClass;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Finder\Finder;

use function array_key_exists;
use function is_string;
use function preg_replace;
use function sprintf;
use function str_replace;
use function strlen;

/**
 * Compiler pass to register all notification scopes from API resources.
 */
final readonly class NotificationScopeRegisterCompilerPass implements CompilerPassInterface
{
    public const SCOPE_RESOURCES_PARAMETER = 'jazzfreunde.notification.scope_resources';
    private const SRC_FOLDER_MASK = '%s/src/Platform';
    private const TOP_LEVEL_NAMESPACE = 'Jazzfreunde\Api\Platform\\';

    public function __construct(
        private string $projectDir,
    ) {}

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function process(ContainerBuilder $container): void
    {
        /** @var array<string, array{uri: string, className: class-string}> $scopeIndex */
        $scopeIndex = [];

        foreach ($this->generateScopeResources() as $resource) {
            $scopeUri = $resource['uri'];

            if (array_key_exists($scopeUri, $scopeIndex)) {
                continue;
            }

            $scopeIndex[$scopeUri] = $resource;
        }

        $container->setParameter(self::SCOPE_RESOURCES_PARAMETER, array_values($scopeIndex));
    }

    /**
     * @return Generator<int, array{uri: string, className: class-string}>
     */
    private function generateScopeResources(): iterable
    {
        $finder = new Finder();
        $finder->files()->in(sprintf(self::SRC_FOLDER_MASK, $this->projectDir))->name('*.php');

        foreach ($finder as $file) {
            $relativePath = $file->getRelativePathname();
            $normalized = self::TOP_LEVEL_NAMESPACE.str_replace('/', '\\', $relativePath);
            $className = preg_replace('/\.php$/', '', $normalized);

            if (!is_string($className) || !class_exists($className)) {
                continue;
            }

            $reflection = new ReflectionClass($className);

            $attributes = $reflection->getAttributes(NotificationResource::class);

            if (0 === count($attributes)) {
                continue;
            }

            $resourceAttribute = $attributes[0]->newInstance();
            $scopeUri = $resourceAttribute->getUri();

            if (0 === strlen($scopeUri)) {
                throw new LogicException('Notification scope URI cannot be empty.');
            }

            yield [
                'uri' => $scopeUri,
                'className' => $reflection->getName(),
            ];
        }
    }
}
