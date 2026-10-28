<?php

use ApiPlatform\Symfony\Bundle\ApiPlatformBundle;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle;
use Endroid\QrCodeBundle\EndroidQrCodeBundle;
use Nelmio\SecurityBundle\NelmioSecurityBundle;
use Presta\SitemapBundle\PrestaSitemapBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\MakerBundle\MakerBundle;
use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Bundle\WebProfilerBundle\WebProfilerBundle;
use Symfony\UX\React\ReactBundle;
use Symfony\UX\StimulusBundle\StimulusBundle;
use Symfony\WebpackEncoreBundle\WebpackEncoreBundle;
use Twig\Extra\TwigExtraBundle\TwigExtraBundle;

return [
    FrameworkBundle::class => ['all' => true],
    DoctrineBundle::class => ['all' => true],
    DoctrineMigrationsBundle::class => ['all' => true],
    MakerBundle::class => ['dev' => true],
    MonologBundle::class => ['all' => true],
    ApiPlatformBundle::class => ['all' => true],
    TwigBundle::class => ['all' => true],
    SecurityBundle::class => ['all' => true],
    WebpackEncoreBundle::class => ['all' => true],
    TwigExtraBundle::class => ['all' => true],
    NelmioSecurityBundle::class => ['all' => true],
    StimulusBundle::class => ['all' => true],
    ReactBundle::class => ['all' => true],
    PrestaSitemapBundle::class => ['all' => true],
    EndroidQrCodeBundle::class => ['all' => true],
    WebProfilerBundle::class => ['dev' => true, 'test' => true],
];
