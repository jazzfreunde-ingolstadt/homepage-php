<?php

declare(strict_types=1);

namespace JazzfreundeTests\Api\Tests\DependencyInjection\Compiler;

use Jazzfreunde\Api\DependencyInjection\Compiler\NotificationScopeRegisterCompilerPass;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Tests notification scope registration in the compiled application container.
 *
 * @internal
 *
 * @coversNothing
 */
final class NotificationScopeRegisterCompilerPassTest extends KernelTestCase
{
    public function testRegistersNotificationScopeResources(): void
    {
        self::bootKernel();

        /** @var array<int, array{uri: non-empty-string, className: class-string}> $registeredResources */
        $registeredResources = self::getContainer()->getParameter(
            NotificationScopeRegisterCompilerPass::SCOPE_RESOURCES_PARAMETER
        );

        $uris = array_column($registeredResources, 'uri');
        $this->assertSame($uris, array_values(array_unique($uris)));

        $actual = $this->createUriToClassMap($registeredResources);

        $expectedJson = file_get_contents(__DIR__.'/notification-scope-resources.verified.json');
        $this->assertNotFalse($expectedJson);

        /** @var array<string, class-string> $expected */
        $expected = json_decode($expectedJson, true, flags: JSON_THROW_ON_ERROR);
        ksort($expected);

        $this->assertSame($expected, $actual);
    }

    /**
     * @param array<int, array{uri: non-empty-string, className: class-string}> $resources
     *
     * @return array<string, class-string>
     */
    private function createUriToClassMap(array $resources): array
    {
        $map = [];
        foreach ($resources as $resource) {
            $map[$resource['uri']] = $resource['className'];
        }
        ksort($map);

        return $map;
    }
}
