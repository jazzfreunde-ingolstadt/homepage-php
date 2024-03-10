<?php

namespace Jazzfreunde\App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

/**
 * Symfony Main Kernel
 */
class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    /**
     * @inheritDoc
     */
    public function getProjectDir(): string
    {
        return \dirname(__DIR__);
    }

    /**
     * @inheritDoc
     */
    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import(sprintf('%s/config/{packages}/*.yaml', \dirname(__DIR__)));
        $container->import(sprintf('%s/config/{packages}/%s/*.yaml', \dirname(__DIR__), $this->environment));

        if (is_file(\dirname(__DIR__).'/config/services.yaml')) {
            $container->import(\dirname(__DIR__).'/config/services.yaml');
            $container->import(sprintf('%s/config/{services}_%s.yaml', \dirname(__DIR__), $this->environment));
        }
    }

    /**
     * @inheritDoc
     */
    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import(sprintf('%s/config/{routes}/%s/*.yaml', \dirname(__DIR__), $this->environment));
        $routes->import(\dirname(__DIR__).'/config/{routes}/*.yaml');

        if (is_file(\dirname(__DIR__).'/config/routes.yaml')) {
            $routes->import(\dirname(__DIR__).'/config/routes.yaml');
        }
    }
}
