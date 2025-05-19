<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Event\MetaData\Workflow\ConfirmationContract;

use Jazzfreunde\App\DependencyInjection\FromMetaDataTrait;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Validation\Attribute\TwigTemplate;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Meta data for the confirmation contract workflow.
 * Used when the contract transitions pending state.
 *
 * @psalm-api
 */
final class AwaitConfirmationMetaData
{
    use PropertyInjectionTrait;
    use FromMetaDataTrait;

    /**
     * @param string $email_subject Subject of the email to send
     */
    #[NotBlank(message: 'Email title is required.')]
    public string $email_subject;

    /**
     * @param string $email_template Template of the email to send
     */
    #[TwigTemplate]
    public string $email_template;
}
