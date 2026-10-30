<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Event\MetaData\Workflow\ConfirmationContract;

use Jazzfreunde\Api\DependencyInjection\FromMetaDataTrait;
use Jazzfreunde\Api\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\Api\Type\Primitive\Email;
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

    public const EMAIL = 'email';

    /**
     * @param Email $email Email address of the user to notify
     */
    #[NotBlank(message: 'Email is required.')]
    public Email $email;
}
