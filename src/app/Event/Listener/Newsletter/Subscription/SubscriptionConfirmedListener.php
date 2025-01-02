<?php declare(strict_types=1);

namespace Jazzfreunde\App\Event\Listener\Newsletter\Subscription;

use Doctrine\ORM\EntityManagerInterface;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Event\Event\Contract\ContractConfirmedEvent;
use Jazzfreunde\App\Service\Email\Exception\MailException;
use Jazzfreunde\App\Service\Email\MailService;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

use function is_null;

/**
 * Listener after a new subscription has been confirmed
 */
#[AsEventListener(event: ContractConfirmedEvent::class, method: 'onConfirmed')]
final class SubscriptionConfirmedListener implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @param EntityManagerInterface $entityManager
     * @param MailService $mailer
     */
    public function __construct(
        private EntityManagerInterface $entityManager,
        private MailService $mailer,
    ) {
    }

    /**
     * Handle confirmation of a new subscription
     *
     * @param ContractConfirmedEvent $event
     * @return void
     */
    public function onConfirmed(ContractConfirmedEvent $event): void
    {
        $repository = $this->entityManager->getRepository(NewsletterSubscription::class);
        $subscription = $repository->findOneBy(['confirmation' => $event->contract]);

        if (is_null($subscription)) {
            return;
        }

        try {
            $this->mailer->send(
                KnownMailHandleEnum::NoReply,
                $subscription->email,
                'Newsletter abonniert',
                'email/newsletter/newsletter-subscription-confirmation.html.twig',
                [
                    'token' => $subscription->confirmation->token,
                ]
            );
        } catch (MailException $e) {
            $this->logger?->error(
                'Failed to send out subscription confirmation.',
                ['exception' => $e->getMessage()]
            );
        }

        try {
            $this->mailer->send(
                KnownMailHandleEnum::NoReply,
                KnownMailHandleEnum::Jazzletter,
                'Neuer Newsletter Abonnent!',
                'email/newsletter/newsletter-subscription-notice.html.twig',
                [
                    'subscription' => [
                        'email' => $subscription->email
                    ],
                ]
            );
        } catch (MailException $e) {
            $this->logger?->error(
                'Failed to notify jazzletter about new subscription.',
                ['exception' => $e->getMessage()]
            );
        }
    }
}
