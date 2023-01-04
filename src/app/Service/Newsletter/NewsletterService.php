<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Newsletter;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\KnownMail;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Service\Newsletter\Exception\SubscriptionException;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

/**
 * Service zur Verwaltung des Newsletters
 */
final class NewsletterService implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @param ManagerRegistry $doctrine
     * @param MailerInterface $mailer
     */
    public function __construct(private ManagerRegistry $doctrine, private MailerInterface $mailer)
    {
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function subscribe(NewsletterSubscription $subscription): void
    {
        try {
            $entityManager = $this->doctrine->getManager();
            $entityManager->persist($subscription);
            $entityManager->flush();

            /**
             * @var KnownMail|null $jazzletter
             */
            $jazzletter = $this->doctrine->getRepository(KnownMail::class)->findOneBy([ 'handle' => 'jazzletter' ]);
            
            if (is_null($jazzletter)) {
                
            }

            $email = (new TemplatedEmail())
                ->from('info@jazzfreunde-ingolstadt.de')
                ->to($jazzletter?->address)
                ->subject('Neuer Newsletter Abonnent!')
                ->htmlTemplate('emails/newsletter-subscription.html.twig')
                ->context([
                    'subscription' => [
                        'email' => $subscription->email
                    ],
                ]);
            
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            $this->logger?->error($e);
            throw new SubscriptionException();
        } catch (UniqueConstraintViolationException $e) {
            throw new SubscriptionException(code: SubscriptionException::ALREADY_SUBSCRIBED);
        }
    }
}
