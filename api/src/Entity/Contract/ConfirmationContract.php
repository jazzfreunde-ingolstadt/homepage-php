<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Entity\Contract;

use DateInterval;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Entity\Type\Enum\Contract\ConfirmationStateEnumType;
use Jazzfreunde\App\Entity\Type\String\HexTokenType;
use Jazzfreunde\App\Repository\ConfirmationContractRepository;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\App\Type\Primitive\HexToken;
use LogicException;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Confirmation contract authorized by a user.
 *
 * @psalm-api
 */
#[ORM\Entity(repositoryClass: ConfirmationContractRepository::class)]
#[ORM\Table(name: 'confirmation_contracts')]
class ConfirmationContract
{
    use PropertyInjectionTrait;

    public const string METADATA_CONFIRMABLE_ENTITY_CLASS = 'confirmableEntityClass';

    public const string METADATA_CONFIRMABLE_ENTITY_UUID = 'confirmableEntityUuid';

    /**
     * Unique identifier in the database.
     *
     * @var null|string
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid')]
    public ?string $uuid = null;

    /**
     * Unique token that acts as a public identifier on the API.
     *
     * @var HexToken
     */
    #[Assert\NotBlank(message: 'Token is required.')]
    #[ORM\Column(type: HexTokenType::ENTITY_NAME, unique: true)]
    public HexToken $token;

    /**
     * Time the confirmation request was created.
     *
     * @var DateTimeImmutable
     */
    #[ORM\Column(type: 'datetime_immutable')]
    public DateTimeImmutable $requestTime;

    /**
     * Time after which the contract can be purged.
     *
     * @var null|DateTimeImmutable
     */
    #[Assert\GreaterThanOrEqual(
        propertyPath: 'requestTime',
        message: 'The expiration time cannot be before the request time.',
    )]
    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    public ?DateTimeImmutable $expirationTime = null;

    /**
     * Metadata containing additional information about the confirmation contract.
     *
     * @var array<string, mixed>
     */
    #[ORM\Column(type: 'json')]
    public array $metadata = [];

    /**
     * State of the confirmation contract.
     *
     * @var ConfirmationStateEnum
     */
    #[ORM\Column(type: ConfirmationStateEnumType::ENTITY_NAME, options: ['default' => ConfirmationStateEnum::New])]
    public ConfirmationStateEnum $state = ConfirmationStateEnum::New;

    /**
     * Create a new contract.
     *
     * @param array<string, mixed> ...$params
     *
     * @psalm-suppress UndefinedThisPropertyFetch
     */
    public function __construct(array ...$params)
    {
        $params['requestTime'] ??= new DateTimeImmutable();
        $params['token'] ??= new HexToken();
        $this->injectProperties($params);
    }

    /**
     * Store the identity of the entity that owns this confirmation contract.
     *
     * @throws LogicException if the confirmable entity has not been persisted
     */
    public function setConfirmableEntity(ConfirmableEntity $entity): void
    {
        $uuid = $entity->uuid
            ?? throw new LogicException('Cannot associate a confirmation contract with an unpersisted entity.');

        $this->metadata[self::METADATA_CONFIRMABLE_ENTITY_CLASS] = $entity::class;
        $this->metadata[self::METADATA_CONFIRMABLE_ENTITY_UUID] = $uuid;
    }

    /**
     * Has the contract been confirmed?
     *
     * @return bool
     */
    public function isConfirmed(): bool
    {
        return ConfirmationStateEnum::Confirmed === $this->state;
    }

    /**
     * Has the confirmation period expired?
     *
     * @return bool
     */
    public function isExpired(DateInterval $tokenLifeTime): bool
    {
        $expiredOn = $this->requestTime->add($tokenLifeTime);

        return $expiredOn < new DateTimeImmutable();
    }

    /**
     * Get the current place of the workflow.
     *
     * @return string
     *
     * @see https://symfony.com/doc/current/workflow.html#creating-a-workflow
     */
    public function getState(): string
    {
        return $this->state->value;
    }

    /**
     * Set the current place of the workflow.
     *
     * @param enum-string $currentPlace
     * @param array       $_
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
