<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Platform\Contract;

use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Jazzfreunde\Api\Entity\Contract\ConfirmationContract;
use Jazzfreunde\Api\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\Api\Type\Primitive\HexToken;
use Jazzfreunde\UnitTest\Fixtures\CallbackFixture;
use Jazzfreunde\UnitTest\Trait\SetupDatabaseTrait;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Functional tests for the confirmation contract API resource.
 *
 * @internal
 *
 * @coversNothing
 */
final class ConfirmationContractTest extends WebTestCase
{
    use SetupDatabaseTrait;

    public function testConfirmContract(): void
    {
        $token = 'cccccccccccccccccccccccccccccccc';
        $client = $this->createClientWithContract(ConfirmationStateEnum::Pending, $token);

        $client->request(Request::METHOD_POST, '/api/contracts/confirm/'.$token);

        $this->assertResponseStatusCodeSame(202);
        $this->assertSame(
            ConfirmationStateEnum::Confirmed,
            $this->findContract($token)?->state,
        );
    }

    public function testConfirmExpiredContractReturnsGoneError(): void
    {
        $token = 'cccccccccccccccccccccccccccccccc';
        $client = $this->createClientWithContract(
            ConfirmationStateEnum::Pending,
            $token,
            new DateTimeImmutable('-1 day'),
        );

        $client->request(Request::METHOD_POST, '/api/contracts/confirm/'.$token);

        $this->assertResponseStatusCodeSame(410);
        $this->assertProblemResponse(
            $client,
            'Confirmation expired',
            'The confirmation period for this contract has expired.',
            'urn:jazzfreunde-ingolstadt-error:confirmation-expired',
        );
    }

    public function testConfirmUnknownContractReturnsNotFoundError(): void
    {
        $client = self::createClient();
        $kernel = $client->getKernel();
        $this->initDatabase($kernel);
        $token = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';

        $client->request(Request::METHOD_POST, '/api/contracts/confirm/'.$token);

        $this->assertResponseStatusCodeSame(404);
        $this->assertProblemResponse(
            $client,
            'Confirmation contract not found',
            'The confirmation contract could not be found.',
            'urn:jazzfreunde-ingolstadt-error:confirmation-contract-not-found',
        );
    }

    public function testCancelConfirmedContract(): void
    {
        $token = 'cccccccccccccccccccccccccccccccc';
        $client = $this->createClientWithContract(ConfirmationStateEnum::Confirmed, $token);

        $client->request(Request::METHOD_DELETE, '/api/contracts/cancel/'.$token);

        $this->assertResponseStatusCodeSame(202);
        $this->assertSame(
            ConfirmationStateEnum::Cancelled,
            $this->findContract($token)?->state,
        );
    }

    public function testCancelUnknownContractReturnsNotFoundError(): void
    {
        $client = self::createClient();
        $kernel = $client->getKernel();
        $this->initDatabase($kernel);
        $token = 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb';

        $client->request(Request::METHOD_DELETE, '/api/contracts/cancel/'.$token);

        $this->assertResponseStatusCodeSame(404);
        $this->assertProblemResponse(
            $client,
            'Confirmation contract not found',
            'The confirmation contract could not be found.',
            'urn:jazzfreunde-ingolstadt-error:confirmation-contract-not-found',
        );
    }

    /**
     * Create a client with a persisted confirmation contract.
     */
    private function createClientWithContract(
        ConfirmationStateEnum $state,
        string $token,
        ?DateTimeImmutable $requestTime = null,
    ): KernelBrowser {
        $client = self::createClient();
        $kernel = $client->getKernel();
        $this->initDatabase($kernel);

        $this->applyFixtures(
            $kernel,
            new CallbackFixture(callback: static function (ObjectManager $manager) use ($state, $requestTime, $token): void {
                $contract = new ConfirmationContract();
                $contract->token = new HexToken($token);
                $contract->state = $state;
                if (null !== $requestTime) {
                    $contract->requestTime = $requestTime;
                }

                $manager->persist($contract);
                $manager->flush();
            })
        );

        return $client;
    }

    private function findContract(string $token): ?ConfirmationContract
    {
        return self::getContainer()
            ->get('doctrine')
            ->getRepository(ConfirmationContract::class)
            ->findOneBy(['token' => $token]);
    }

    private function assertProblemResponse(KernelBrowser $client, string $title, string $detail, string $typePath): void
    {
        /** @var array{status:int, type:string, title:string, detail:string} $response */
        $response = json_decode((string) $client->getResponse()->getContent(), true, flags: JSON_THROW_ON_ERROR);
        $this->assertSame($title, $response['title']);
        $this->assertSame($detail, $response['detail']);
        $this->assertStringContainsString($typePath, $response['type']);
    }
}
