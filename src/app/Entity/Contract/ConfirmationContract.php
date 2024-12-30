<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Contract;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Entity\Type\Enum\Contract\ConfirmationStateEnumType;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Confirmation contract authorized by email
 */
#[ORM\Entity]
#[ORM\Table(name: 'confirmation_contracts')]
class ConfirmationContract
{
    use PropertyInjectionTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class:"doctrine.uuid_generator")]
    #[ORM\Column(type: 'uuid')]
    public ?string $uuid = null;
    #[Assert\NotBlank(message: 'Token is required.')]
    #[ORM\Column(type: 'string')]
    public string $token;
    #[ORM\Column(type: 'datetime_immutable')]
    public DateTimeImmutable $openForConfirmationUntil;
    #[ORM\Column(type: ConfirmationStateEnumType::ENTITY_NAME, options: [ 'default' => ConfirmationStateEnum::PendingConfirmation ])]
    public ConfirmationStateEnum $state = ConfirmationStateEnum::PendingConfirmation;

    /**
     * Create a new confirmation contract
     *
     * @return ConfirmationContract
     */
    public static function create(
        DateTimeImmutable $openForConfirmationUntil = new DateTimeImmutable('+1 day'),
    ): ConfirmationContract {
        $confirmation = new self();
        $confirmation->token = bin2hex(random_bytes(32));
        $confirmation->openForConfirmationUntil = $openForConfirmationUntil;

        return $confirmation;
    }

    /**
     * Has the period to confirm the contract expired?
     *
     * @return boolean
     */
    public function hasConfirmationPeriodExpired(): bool
    {
        return $this->openForConfirmationUntil < new DateTimeImmutable();
    }

    /**
     * Is the contract confirmed?
     *
     * @return boolean
     */
    public function isConfirmed(): bool
    {
        return $this->state === ConfirmationStateEnum::Confirmed;
    }

    /**
     * Confirm the contract
     *
     * @return void
     */
    public function confirm(): void
    {
        $this->state = ConfirmationStateEnum::Confirmed;
    }

    /**
     * Cancel the contract
     *
     * @return void
     */
    public function cancel(): void
    {
        $this->state = ConfirmationStateEnum::Cancelled;
    }
}
