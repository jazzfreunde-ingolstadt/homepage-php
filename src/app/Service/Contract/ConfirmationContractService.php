<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Contract;

use Doctrine\ORM\EntityManagerInterface;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Exception\Contract\ConfirmationContractNotFoundException;
use Jazzfreunde\App\Event\MetaData\Workflow\ConfirmationContract\AwaitConfirmationContext;
use Jazzfreunde\App\Exception\Contract\ConfirmationPeriodExpiredException;
use Jazzfreunde\App\Type\Primitive\Email;
use Jazzfreunde\App\Workflow\ConfirmationContract\TransitionsEnum;
use Symfony\Component\DependencyInjection\Attribute\Target;
use Symfony\Component\Workflow\Exception\LogicException;
use Symfony\Component\Workflow\Workflow;
use Symfony\Component\Workflow\WorkflowInterface;

use function is_null;

/**
 * Service for managing confirmation contracts.
 * @psalm-api
 */
class ConfirmationContractService
{
    /**
     * @param WorkflowInterface $workflow
     * @param EntityManagerInterface $entityManager
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function __construct(
        #[Target('confirmation_contract')]
        private WorkflowInterface $workflow,
        private EntityManagerInterface $entityManager,
    ) {
    }

    /**
     * Start the confirmation process for a contract.
     *
     * @param ConfirmationContract $contract
     * @param Email $email
     * @return void
     */
    public function startEmailConfirmation(
        ConfirmationContract $contract,
        Email $email,
    ): void {
        $this->transition(
            $contract,
            TransitionsEnum::AwaitConfirmation,
            context: [
                AwaitConfirmationContext::EMAIL => $email,
                Workflow::DISABLE_ANNOUNCE_EVENT => true,
            ]
        );
    }

    /**
     * Restart the confirmation process for a contract.
     * This is used whenever the token expires before the contract is confirmed.
     *
     * @param ConfirmationContract $contract
     * @param Email $email
     * @return void
     */
    public function restartEmailConfirmation(
        ConfirmationContract $contract,
        Email $email,
    ): void {
        $this->transition(
            $contract,
            TransitionsEnum::Retry,
            context: [
                Workflow::DISABLE_ANNOUNCE_EVENT => true,
            ]
        );
        $this->transition(
            $contract,
            TransitionsEnum::AwaitConfirmation,
            context: [
                AwaitConfirmationContext::EMAIL => $email,
                Workflow::DISABLE_ANNOUNCE_EVENT => true,
            ]
        );
    }

    /**
     * Confirm the contract.
     *
     * @param string $token
     * @return void
     * @throws ConfirmationPeriodExpiredException
     * @throws ConfirmationContractNotFoundException
     */
    public function confirmContract(string $token): void
    {
        $contract = $this->getContractByToken($token);
        
        if (!$this->workflow->can($contract, TransitionsEnum::Confirm->value)) {
            throw new ConfirmationPeriodExpiredException($contract);
        }

        $this->transition(
            $contract,
            TransitionsEnum::Confirm,
            [Workflow::DISABLE_ANNOUNCE_EVENT => true]
        );
    }

    /**
     * Cancel the contract.
     *
     * @param string $token
     * @return void
     * @throws ConfirmationContractNotFoundException
     */
    public function cancelContract(string $token): void
    {
        $contract = $this->getContractByToken($token);
        
        if (!$this->workflow->can($contract, TransitionsEnum::Cancel->value)) {
            return;
        }

        $this->transition(
            $contract,
            TransitionsEnum::Cancel,
            [Workflow::DISABLE_ANNOUNCE_EVENT => true]
        );
    }

    /**
     * Transition the confirmation contract to the next state.
     *
     * @param ConfirmationContract $contract
     * @param TransitionsEnum $transition
     * @param array $context
     * @return void
     * @throws LogicException if the transition is not valid
     */
    private function transition(
        ConfirmationContract $contract,
        TransitionsEnum $transition,
        array $context = []
    ): void {
        $this->workflow->apply($contract, $transition->value, $context);
    }

    /**
     * Retrieve a confirmation contract by its token.
     *
     * @param string $token
     * @return ConfirmationContract
     */
    private function getContractByToken(string $token): ConfirmationContract
    {
        $contract = $this->entityManager
                         ->getRepository(ConfirmationContract::class)
                         ->findOneBy(['token' => $token]);

        if (is_null($contract)) {
            throw new ConfirmationContractNotFoundException($token);
        }

        return $contract;
    }
}
