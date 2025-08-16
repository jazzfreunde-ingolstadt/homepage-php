<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Event\MetaData\Workflow\ConfirmationContract;

use Jazzfreunde\App\DependencyInjection\FromMetaDataTrait;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Type\Primitive\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Context for the confirmation contract workflow.
 * Used when the contract has entered ask_confirmation state.
 *
 * @psalm-api
 */
final class AwaitConfirmationContext
{
    use PropertyInjectionTrait;
    use FromMetaDataTrait;

    const EMAIL = 'email';

    /**
     * @param Email $email Email address of the user to notify
     */
    #[NotBlank(message: 'Email is required.')]
    public Email $email;
}
