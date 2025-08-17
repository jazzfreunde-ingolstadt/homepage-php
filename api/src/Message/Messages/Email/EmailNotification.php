<?php declare(strict_types=1);

namespace Jazzfreunde\App\Message\Messages\Email;

use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use Jazzfreunde\App\Validation\Attribute\TwigTemplate;
use Symfony\Component\Mime\Address;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Message for sending an email
 * @psalm-api
 */
class EmailNotification
{
    use PropertyInjectionTrait;

    /**
     * Email address of the sender
     * Has to be a registered mailbox
     */
    public KnownMailHandleEnum $sender;

    /**
     * Email address of the recipient
     * Can be a registered mailbox or a normal email address
     * @see https://www.ionos.de/hilfe/e-mail/allgemeine-themen/wichtige-aenderung-fuer-das-versenden-von-e-mails-mit-abweichender-absenderadresse/
     */
    public KnownMailHandleEnum|Address $recipient;

    /**
     * Subject of the email
     * Has to be at least 5 characters long
     */
    #[Length(
        min: 5,
        max: 100,
        minMessage: 'Subject must be at least {{ limit }} characters long.',
        maxMessage: 'Subject cannot be longer than {{ limit }} characters.'
    )]
    public string $subject;

    /**
     * Template for the email
     * Has to be a valid twig template
     * @see https://symfony.com/doc/current/mailer.html#twig-html-css
     */
    #[TwigTemplate]
    public string $twigTemplate;

    /**
     * Context for the email
     * Associative array of key-value pairs
     * @see https://symfony.com/doc/current/mailer.html#html-content
     */
    public array $twigContext = [];
}
