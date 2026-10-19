<?php

declare(strict_types=1);

namespace JazzfreundeTests\App\Tests\Entity\Contract;

use DateInterval;
use DateTimeImmutable;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

/**
 * Test for email confirmation service.
 *
 * @internal
 *
 * @coversNothing
 */
final class ConfirmationContractTest extends TestCase
{
    public function testMetadataDefaultsToEmpty(): void
    {
        $contract = new ConfirmationContract();

        $this->assertSame([], $contract->metadata);
    }

    public function testSetConfirmableEntityPreservesExistingMetadata(): void
    {
        $contract = new ConfirmationContract();
        $contract->metadata = ['customKey' => 'customValue'];

        $entity = new NewsletterSubscription();
        $entity->uuid = 'f020db38-914c-4bb9-9990-017b7bf831ce';

        $contract->setConfirmableEntity($entity);

        $this->assertSame([
            'customKey' => 'customValue',
            ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_CLASS => NewsletterSubscription::class,
            ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_UUID => $entity->uuid,
        ], $contract->metadata);
    }

    /**
     * Test if the confirmation period has expired.
     */
    public function testHasConfirmationPeriodExpired(): void
    {
        $contract = new ConfirmationContract();
        $contract->requestTime = new DateTimeImmutable('-1 day');
        $tokenLifeTime = DateInterval::createFromDateString('1 hour');

        $this->assertTrue($contract->isExpired($tokenLifeTime));
    }

    public function testExpirationTimeCannotPrecedeRequestTime(): void
    {
        $contract = new ConfirmationContract();
        $contract->requestTime = new DateTimeImmutable('2026-10-18T12:00:00+00:00');
        $contract->expirationTime = $contract->requestTime->modify('-1 second');

        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $this->assertCount(1, $validator->validateProperty($contract, 'expirationTime'));
    }

    /**
     * Test if a contract is confirmed.
     */
    public function testIsConfirmed(): void
    {
        $contract = new ConfirmationContract();
        $contract->state = ConfirmationStateEnum::Confirmed;
        $this->assertTrue($contract->isConfirmed());
    }

    /**
     * Test changing state of a contract.
     */
    public function testSetState(): void
    {
        $contract = new ConfirmationContract();
        $contract->setState('confirmed', []);
        $this->assertTrue($contract->isConfirmed());
        $this->assertEquals(ConfirmationStateEnum::Confirmed, $contract->state);
    }
}
