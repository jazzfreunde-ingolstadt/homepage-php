<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Event\MetaData\Workflow\ConfirmationContract;

use DateInterval;
use DateMalformedIntervalStringException;
use InvalidArgumentException;
use Jazzfreunde\Api\DependencyInjection\FromMetaDataTrait;
use Jazzfreunde\Api\DependencyInjection\PropertyInjectionTrait;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Meta data for the confirmation contract workflow.
 * Used when the contract enters pending state.
 */
final class PendingMetaData
{
    use PropertyInjectionTrait;
    use FromMetaDataTrait;

    /**
     * @param string $token_lifetime Time the token is valid for confirmation
     */
    #[NotBlank(message: 'Period must be configured.')]
    public string $token_lifetime;

    /**
     * @return DateInterval
     *
     * @throws InvalidArgumentException
     */
    public function getTokenLifeTime(): DateInterval
    {
        try {
            return DateInterval::createFromDateString($this->token_lifetime);
        } catch (DateMalformedIntervalStringException $e) {
            throw new InvalidArgumentException('Invalid token lifetime format', previous: $e);
        }
    }
}
