<?php

namespace Jazzfreunde\App;

use Jazzfreunde\App\DependencyInjection\Compiler\DoctrineTypeRegisterCompilerPass;
use Override;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

use function dirname;
use function sprintf;
use function is_file;

/**
 * Symfony Main Kernel
 */
final class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    /**
     * @inheritDoc
     */
    #[Override]
    public function getProjectDir(): string
    {
        return dirname(__DIR__);
    }

    /**
     * @inheritDoc
     */
    #[Override]
    protected function build(ContainerBuilder $container): void
    {
        /** @var string */
        $projectDir = $container->getParameter('kernel.project_dir');
        
        $container->addCompilerPass(
            new DoctrineTypeRegisterCompilerPass(
                $projectDir
            )
        );
    }

    /**
     * Configures the container.
     *
     * @param ContainerConfigurator $container
     * @psalm-suppress UnusedMethod
     */
    private function configureContainer(ContainerConfigurator $container): void
    {
        $container->import(sprintf('%s/config/{packages}/*.yaml', dirname(__DIR__)));
        $container->import(sprintf('%s/config/{packages}/%s/*.yaml', dirname(__DIR__), $this->environment));

        if (is_file(dirname(__DIR__).'/config/services.yaml')) {
            $container->import(dirname(__DIR__).'/config/services.yaml');
            $container->import(sprintf('%s/config/{services}_%s.yaml', dirname(__DIR__), $this->environment));
        }
    }

    /**
     * Adds or imports routes into your application.
     *
     * @param RoutingConfigurator $routes
     * @psalm-suppress UnusedMethod
     */
    private function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import(sprintf('%s/config/{routes}/%s/*.yaml', dirname(__DIR__), $this->environment));
        $routes->import(dirname(__DIR__).'/config/{routes}/*.yaml');

        if (is_file(dirname(__DIR__).'/config/routes.yaml')) {
            $routes->import(dirname(__DIR__).'/config/routes.yaml');
        }
    }
}
