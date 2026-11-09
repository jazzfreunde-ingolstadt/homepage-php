<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Notification\Provider\Model;

use Jazzfreunde\Api\Type\Primitive\Uri;
use Jazzfreunde\Api\Validation\Attribute\TwigTemplate;

/**
 * Represents a notification resource that users can subscribe to.
 */
final class NotificationResource
{
    public function __construct(
        /**
         * The URI of the notification resource.
         *
         * @var Uri
         */
        public readonly Uri $uri,

        /**
         * Stable hash identifying the underlying notification, independent of subscription scope.
         */
        public readonly string $identityHash,

        /**
         * @param string $email_template Template of the email to send
         */
        #[TwigTemplate]
        public string $email_template,

        /**
         * The title of the notification resource.
         *
         * @var string
         */
        public readonly string $title,

        /**
         * @var array<string, mixed> metadata associated with the notification resource
         */
        public readonly array $metadata = [],
    ) {}
}
