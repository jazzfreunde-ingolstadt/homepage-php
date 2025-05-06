<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Event\MetaData\Workflow\ConfirmationContract;

use DateInterval;
use InvalidArgumentException;
use Jazzfreunde\App\DependencyInjection\FromMetaDataTrait;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
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
     * @throws InvalidArgumentException
     */
    public function getTokenLifeTime(): DateInterval
    {
        $interval = DateInterval::createFromDateString($this->token_lifetime);
        return $interval ?: throw new InvalidArgumentException('Invalid token lifetime format');
    }
}
