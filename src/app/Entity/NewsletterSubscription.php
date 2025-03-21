<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Jazzfreunde\App\DependencyInjection\PropertyInjectionTrait;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\Type\String\EmailType;
use Jazzfreunde\App\Type\Primitive\Email;

/**
 * Abonement des Jazzfreunde Newsletters
 * @psalm-api
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
    #[ORM\Column(type: EmailType::ENTITY_NAME, unique: true)]
    public Email $email;
    #[ORM\Column(type: 'datetime', options: ["default" => "CURRENT_TIMESTAMP"])]
    public DateTime $creationTime;
    #[ORM\OneToOne(targetEntity: ConfirmationContract::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(referencedColumnName: 'uuid')]
    public ConfirmationContract $confirmation;
}
