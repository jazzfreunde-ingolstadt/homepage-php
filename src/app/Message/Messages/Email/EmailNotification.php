<?php declare(strict_types=1);

namespace Jazzfreunde\App\Message\Messages\Email;

use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use Symfony\Component\Mime\Address;

/**
 * Message for sending an email
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
    public string $subject;

    /**
     * Template for the email
     * Has to be a valid twig template
     * @see https://symfony.com/doc/current/mailer.html#twig-html-css
     */
    public string $twigTemplate;

    /**
     * Context for the email
     * Associative array of key-value pairs
     * @see https://symfony.com/doc/current/mailer.html#html-content
     */
    public array $twigContext = [];

    /**
     * Set the sender of the email
     *
     * @param string $value
     * @return void
     */
    public function setSubject(string $value): void
    {
        if (strlen($value) < 5) {
            throw new \InvalidArgumentException('Subject must be at least 5 characters long.');
        }
            
        $this->subject = $value;
    }

    /**
     * Set the template for the email
     *
     * @param string $value
     * @return void
     */
    public function setTwigTemplate(string $value): void
    {
        if (!str_contains($value, '.html.twig')) {
            throw new \InvalidArgumentException('Template must be a valid twig template.');
        }
            
        $this->twigTemplate = $value;
    }
}
