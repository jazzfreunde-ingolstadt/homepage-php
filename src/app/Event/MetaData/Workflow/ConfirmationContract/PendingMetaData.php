<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Event\MetaData\Workflow\ConfirmationContract;

use DateInterval;
use Jazzfreunde\App\DependencyInjection\FromMetaDataTrait;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Meta data for the confirmation contract workflow.
 * Used when the contract enters pending state.
 *
 * @psalm-api
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
     */
    public function getTokenLifeTime(): DateInterval
    {
        return DateInterval::createFromDateString($this->token_lifetime);
    }
}
