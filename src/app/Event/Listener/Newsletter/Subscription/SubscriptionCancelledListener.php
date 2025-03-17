<?php declare(strict_types=1);

namespace Jazzfreunde\App\Event\Listener\Newsletter\Subscription;

use Doctrine\ORM\EntityManagerInterface;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Event\Event\Contract\ContractCancelledEvent;
use Jazzfreunde\App\Service\Email\Exception\MailException;
use Jazzfreunde\App\Service\Email\MailService;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

use function is_null;

/**
 * Listener after a new subscription has been confirmed
 * @psalm-api
 */
#[AsEventListener(event: ContractCancelledEvent::class, method: 'onCancelled')]
final class SubscriptionCancelledListener implements LoggerAwareInterface
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
     * Handle cancellation of a subscription
     *
     * @param ContractCancelledEvent $event
     * @return void
     */
    public function onCancelled(ContractCancelledEvent $event): void
    {
        $repository = $this->entityManager->getRepository(NewsletterSubscription::class);
        $subscription = $repository->findOneBy(['confirmation' => $event->contract]);

        if (is_null($subscription)) {
            return;
        }

        try {
            $this->mailer->send(
                KnownMailHandleEnum::NoReply,
                KnownMailHandleEnum::Jazzletter,
                'Abonnement gekündigt!',
                'email/newsletter/newsletter-cancellation-notice.html.twig',
                [
                    'subscription' => [
                        'email' => $subscription->email
                    ],
                ]
            );
        } catch (MailException $e) {
            $this->logger?->error(
                'Failed to notify jazzletter about cancelled subscription.',
                ['exception' => $e->getMessage()]
            );
        }
    }
}
