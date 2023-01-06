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
use Symfony\Component\Form\FormView;
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
     * Verarbeitet ein neues Abonnement.
     *
     * @return void
     * @throws SubscriptionException
     */
    public function subscribe(NewsletterSubscription $subscription): void
    {
        $this->doctrine->getConnection()->beginTransaction();
        try {
            $entityManager = $this->doctrine->getManager();
            $entityManager->persist($subscription);
            $entityManager->flush();

            $knownMails = $this->doctrine->getRepository(KnownMail::class);

            /**
             * @var KnownMail|null $from
             * @var KnownMail|null $to
             */
            $from = $knownMails->findOneBy([ 'handle' => 'no-reply' ]);
            $to = $knownMails->findOneBy([ 'handle' => 'jazzletter' ]);
            
            $errorMsg = fn(string $handle) => sprintf('%s: Mail mit dem Handle "%s" ist nicht konfiguriert.', KnownMail::class, $handle);

            if (is_null($from)) {
                $this->logger?->error($errorMsg('jazzletter'));
                throw new SubscriptionException();
            }
            if (is_null($to)) {
                $this->logger?->error($errorMsg('no-reply'));
                throw new SubscriptionException();
            }

            $email = (new TemplatedEmail())
            ->from($from?->address ?? '')
            ->to($to?->address ?? '')
            ->subject('Neuer Newsletter Abonnent!')
            ->htmlTemplate('email/newsletter-subscription-notice.html.twig')
            ->context([
                'subscription' => [
                    'email' => $subscription->email
                ],
            ]);
            
            $this->mailer->send($email);

            $this->doctrine->getConnection()->commit();
        } catch (UniqueConstraintViolationException $e) {
            throw new SubscriptionException(code: SubscriptionException::ALREADY_SUBSCRIBED);
        } catch (\Exception $e) {
            $this->logger?->error($e);
            $this->doctrine->getConnection()->rollback();
            throw new SubscriptionException();
        }
    }
}
