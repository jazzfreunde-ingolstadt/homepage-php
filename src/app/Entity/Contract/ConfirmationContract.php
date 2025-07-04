<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Contract;

use DateInterval;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Entity\Type\Enum\Contract\ConfirmationStateEnumType;
use Jazzfreunde\App\Entity\Type\String\HexTokenType;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\App\Type\Primitive\HexToken;
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

    /**
     * Unique identifier in the database
     *
     * @var string|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class:"doctrine.uuid_generator")]
    #[ORM\Column(type: 'uuid')]
    public ?string $uuid = null;

    /**
     * Unique token that acts as a public identifier on the API
     *
     * @var HexToken
     */
    #[Assert\NotBlank(message: 'Token is required.')]
    #[ORM\Column(type: HexTokenType::ENTITY_NAME, unique: true)]
    public HexToken $token;

    /**
     * Time the confirmation request was created
     *
     * @var DateTimeImmutable
     */
    #[ORM\Column(type: 'datetime_immutable')]
    public DateTimeImmutable $requestTime;

    /**
     * State of the confirmation contract
     *
     * @var ConfirmationStateEnum
     */
    #[ORM\Column(type: ConfirmationStateEnumType::ENTITY_NAME, options: [ 'default' => ConfirmationStateEnum::New ])]
    public ConfirmationStateEnum $state = ConfirmationStateEnum::New;

    /**
     * Create a new contract
     * @param array<string, mixed> ...$params
     * @psalm-suppress UndefinedThisPropertyFetch
     */
    public function __construct(array ...$params)
    {
        $params['requestTime'] ??= new DateTimeImmutable();
        $params['token'] ??= new HexToken();
        $this->injectProperties($params);
    }

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
     * Has the confirmation period expired?
     *
     * @return boolean
     */
    public function isExpired(DateInterval $tokenLifeTime): bool
    {
        $expiredOn = $this->requestTime->add($tokenLifeTime);

        return $expiredOn < new DateTimeImmutable();
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
     * @param enum-string $currentPlace
     * @param array $_
     *
     * @see https://symfony.com/doc/current/workflow.html#creating-a-workflow
     */
    public function setState(string $currentPlace, array $_ = []): void
    {
        /**
         * @var ConfirmationStateEnum $state
         */
        $state = ConfirmationStateEnum::From($currentPlace);
        $this->state = $state;
    }
}
