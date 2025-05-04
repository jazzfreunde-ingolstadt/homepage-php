<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Service\Newsletter;

use Jazzfreunde\App\Form\NewsletterSubscriptionType;
use Jazzfreunde\App\Service\Newsletter\NewsletterFormService;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Test for the newsletter form service.
 */
final class NewsletterFormServiceTest extends TestCase
{
    /**
     * Test creating the subscription form.
     */
    public function testCreateForm(): void
    {
        $uut = new UnitUnderTest(NewsletterFormService::class);
        $uut->mock(FormFactoryInterface::class)
            ->expects($this->once())
            ->method('create')
            ->with(
                $this->equalTo(NewsletterSubscriptionType::class),
                $this->equalTo(['action' => 'http://localhost/tests/subscribe'])
            )
            ->willReturn($this->createMock(FormInterface::class));
        $uut->mock(UrlGeneratorInterface::class)
            ->expects($this->once())
            ->method('generate')
            ->willReturn('http://localhost/tests/subscribe');

        $uut->target()->createForm();
    }
}
