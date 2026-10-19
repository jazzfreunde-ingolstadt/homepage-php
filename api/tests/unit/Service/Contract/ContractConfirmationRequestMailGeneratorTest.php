<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Service\Contract;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Service\Contract\ContractConfirmationRequestMailGenerator;
use Jazzfreunde\App\Type\Primitive\Email;
use Jazzfreunde\UnitTest\UnitUnderTest;
use LogicException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Mime\Address;

/**
 * @internal
 *
 * @coversNothing
 */
final class ContractConfirmationRequestMailGeneratorTest extends TestCase
{
    public function testGeneratesGenericConfirmationEmailWithoutEntityReference(): void
    {
        $uut = new UnitUnderTest(ContractConfirmationRequestMailGenerator::class);
        $uut->mock(ManagerRegistry::class)
            ->expects($this->never())
            ->method('getManagerForClass');

        $contract = new ConfirmationContract();
        $mail = $uut->target()->generate(
            $contract,
            Email::from('subscriber@example.test'),
        );

        self::assertSame('Bitte bestätigen Sie Ihre Anmeldung', $mail->subject);
        self::assertSame('email/contract/confirmation-request.html.twig', $mail->twigTemplate);
        self::assertSame(['token' => $contract->token], $mail->twigContext);
        self::assertInstanceOf(Address::class, $mail->recipient);
        self::assertSame('subscriber@example.test', $mail->recipient->getAddress());
    }

    public function testGeneratesNewsletterConfirmationEmailFromStoredEntityReference(): void
    {
        $subscription = new NewsletterSubscription();
        $subscription->uuid = 'f020db38-914c-4bb9-9990-017b7bf831ce';
        $contract = new ConfirmationContract();
        $contract->setConfirmableEntity($subscription);

        $uut = new UnitUnderTest(ContractConfirmationRequestMailGenerator::class);
        $uut->mock(ObjectManager::class)
            ->expects($this->once())
            ->method('find')
            ->with(NewsletterSubscription::class, $subscription->uuid)
            ->willReturn($subscription);

        $uut->mock(ManagerRegistry::class)
            ->expects($this->once())
            ->method('getManagerForClass')
            ->with(NewsletterSubscription::class)
            ->willReturn($uut->mock(ObjectManager::class));

        $mail = $uut->target()->generate(
            $contract,
            Email::from('subscriber@example.test'),
        );

        self::assertSame('Bestätigen Sie Ihre Newsletter Anmeldung', $mail->subject);
        self::assertSame('email/newsletter/confirmation-request.html.twig', $mail->twigTemplate);
        self::assertSame(['token' => $contract->token], $mail->twigContext);
        self::assertInstanceOf(Address::class, $mail->recipient);
    }

    public function testRejectsIncompleteEntityReference(): void
    {
        $uut = new UnitUnderTest(ContractConfirmationRequestMailGenerator::class);
        $uut->mock(ManagerRegistry::class)
            ->expects($this->never())
            ->method('getManagerForClass');

        $contract = new ConfirmationContract();
        $contract->metadata[ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_CLASS] = NewsletterSubscription::class;

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Confirmation metadata must contain a valid confirmable entity class and UUID.');

        $uut->target()->generate(
            $contract,
            Email::from('subscriber@example.test'),
        );
    }
}
