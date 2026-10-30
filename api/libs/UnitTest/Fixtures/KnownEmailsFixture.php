<?php

declare(strict_types=1);

namespace Jazzfreunde\UnitTest\Fixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Jazzfreunde\Api\Entity\KnownMail;
use Jazzfreunde\Api\Type\Enum\KnownMailHandleEnum;
use Jazzfreunde\Api\Type\Primitive\Email;
use Override;

/**
 * Sets up {@see KnownMail}.
 *
 * @psalm-api
 */
final class KnownEmailsFixture implements FixtureInterface
{
    /** @var list<KnownMail> */
    private array $knownEmails;

    /**
     * Initialize fixture with default known emails.
     */
    public function __construct()
    {
        $this->knownEmails = [
            new KnownMail(handle: KnownMailHandleEnum::NoReply, address: new Email('no-reply@example.com')),
            new KnownMail(handle: KnownMailHandleEnum::Jazzletter, address: new Email('jazzletter@example.com')),
        ];
    }

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function load(ObjectManager $manager): void
    {
        foreach ($this->knownEmails as $user) {
            $manager->persist($user);
        }
        $manager->flush();
    }
}
