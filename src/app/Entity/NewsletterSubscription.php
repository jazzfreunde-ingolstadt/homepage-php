<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;

/**
 * Abonement des Jazzfreunde Newsletters
 */
#[ORM\Entity]
#[ORM\Table(name: 'newsletter_subscriptions')]
class NewsletterSubscription
{
    use PropertyInjectionTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    public ?int $id = null;
    #[ORM\Column(type: 'string', unique: true)]
    public string $email;
    #[ORM\Column(type: 'datetime', options: ["default" => "CURRENT_TIMESTAMP"])]
    public DateTime $creationTime;
}
