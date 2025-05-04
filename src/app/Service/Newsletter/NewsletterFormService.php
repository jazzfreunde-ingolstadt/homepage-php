<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Newsletter;

use Jazzfreunde\App\Form\NewsletterSubscriptionType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Service zur Verwaltung des Newsletters
 */
final class NewsletterFormService
{
    /**
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        private FormFactoryInterface $formFactory,
        private UrlGeneratorInterface $urlGenerator,
    ) {
    }

    /**
     * Generiert das Formular.
     *
     * @return FormInterface
     * @psalm-suppress PossiblyUnusedMethod used in Twig Template to render html form
     */
    public function createForm(): FormInterface
    {
        return $this->formFactory->create(
            NewsletterSubscriptionType::class,
            options: [
                'action' => $this->urlGenerator->generate('form_newsletter_subscribe')
            ]
        );
    }
}
