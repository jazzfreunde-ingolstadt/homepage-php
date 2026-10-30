<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Twig;

/**
 * Twig template paths for emails.
 */
final class EmailTemplatePath
{
    public const string NEWSLETTER_CANCELLED_NOTICE = 'email/newsletter/admin/subscription-cancelled-notice.html.twig';
    public const string NEWSLETTER_NEW_SUBSCRIBER_NOTICE = 'email/newsletter/admin/new-subscriber-notice.html.twig';
    public const string NEWSLETTER_CONFIRMATION_REQUEST = 'email/newsletter/confirmation-request.html.twig';
    public const string NOTIFICATION_CONFIRMATION_REQUEST = 'email/notifications/confirmation-request.html.twig';
    public const string EVENT_NOTIFICATION = 'email/notifications/event-notification.html.twig';
    public const string CONTRACT_CONFIRMATION_REQUEST = 'email/contract/confirmation-request.html.twig';
    public const string SECURITY_VERIFICATION_CODE = 'email/security/verification-code.html.twig';
    public const string SECURITY_LOGIN_LINK = 'email/security/login-link.html.twig';
    public const string MONITORING_DAILY_REPORT = 'email/monitoring/daily-report.html.twig';
}
