<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Contract;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Entity\Type\Enum\Contract\ConfirmationStateEnumType;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Confirmation contract authorized by a user
 * @psalm-api
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
    public DateTimeImmutable $requestTime;
    #[ORM\Column(type: ConfirmationStateEnumType::ENTITY_NAME, options: [ 'default' => ConfirmationStateEnum::New ])]
    public ConfirmationStateEnum $state = ConfirmationStateEnum::New;

    /**
     * Has the contract been confirmed?
     *
     * @return boolean
     */
    public function isConfirmed(): bool
    {
        return ConfirmationStateEnum::Confirmed === $this->state;
    }

    /**
     * Generate a new token
     *
     * @return string
     */
    public static function generateToken(): string
    {
        return bin2hex(random_bytes(32));
    }

    /**
     * Get the current place of the workflow
     *
     * @return string
     * @see https://symfony.com/doc/current/workflow.html#creating-a-workflow
     */
    public function getState(): string
    {
        return $this->state->value;
    }

    /**
     * Set the current place of the workflow
     *
     * @param string $currentPlace
     * @param array $context
     *
     * @see https://symfony.com/doc/current/workflow.html#creating-a-workflow
     */
    public function setState(string $currentPlace, array $_ = []): void
    {
        $this->state = ConfirmationStateEnumType::tryFrom($currentPlace);
    }
}
