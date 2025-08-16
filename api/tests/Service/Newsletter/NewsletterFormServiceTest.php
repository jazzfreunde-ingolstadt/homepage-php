<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Newsletter;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Test for the newsletter form service.
 */
final class NewsletterFormServiceTest extends KernelTestCase
{
    /**
     * Test creating the subscription form.
     */
    public function testCreateForm(): void
    {
        $this->bootKernel();
        $container = $this->getContainer();

        $newsletterForm = $container->get('jazzfreunde.newsletter_subscription');
        $form = $newsletterForm->createForm();
        $view = $form->createView();

        $this->assertEquals(
            '/newsletter/newsletter_subscribe/',
            $view->vars['action'],
        );
    }
}
