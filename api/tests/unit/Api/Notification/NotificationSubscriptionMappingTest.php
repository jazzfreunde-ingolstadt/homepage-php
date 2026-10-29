<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Api\Notification;

use Jazzfreunde\App\Api\Notification\NotificationSubscription as NotificationSubscriptionDto;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\Notification\NotificationSubscription;
use Jazzfreunde\App\Type\Primitive\Email;
use Jazzfreunde\App\Type\Primitive\Uri;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Symfony\Component\ObjectMapper\ObjectMapper;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * @internal
 *
 * @coversNothing
 */
final class NotificationSubscriptionMappingTest extends TestCase
{
    public function testObjectMapperValuesAreConvertedToApiStrings(): void
    {
        $subscription = (new ReflectionClass(NotificationSubscription::class))->newInstanceWithoutConstructor();
        $subscription->resourceScope = Uri::from('/events/123');
        $subscription->email = Email::from('subscriber@example.test');
        $subscription->confirmation = (new ReflectionClass(ConfirmationContract::class))->newInstanceWithoutConstructor();

        $mapper = new ObjectMapper(propertyAccessor: PropertyAccess::createPropertyAccessor());
        $dto = $mapper->map($subscription, NotificationSubscriptionDto::class);

        self::assertSame('/events/123', $dto->resourceScope);
        self::assertSame('subscriber@example.test', $dto->email);
    }
}
