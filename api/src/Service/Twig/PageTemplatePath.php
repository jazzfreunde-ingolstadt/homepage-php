<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Twig;

/**
 * Twig template paths for pages.
 */
final class PageTemplatePath
{
    public const string HOME = '@pages/home.html.twig';
    public const string ABOUT = '@pages/about.html.twig';
    public const string JOIN = '@pages/join.html.twig';
    public const string EVENTS = '@pages/events.html.twig';
    public const string LEGAL_END_USER_AGREEMENT = '@pages/legal/end-user-agreement.html.twig';
    public const string LEGAL_END_USER_AGREEMENT_SOCIAL_MEDIA = '@pages/legal/end-user-agreement-social-media.html.twig';
    public const string LEGAL_END_USER_AGREEMENT_NOTIFICATIONS = '@pages/legal/end-user-agreement-notifications.html.twig';
    public const string LEGAL_IMPRESSUM = '@pages/legal/impressum.html.twig';
    public const string LEGAL_STATUTE = '@pages/legal/satzung.html.twig';
    public const string INFO_JAZZ_AND_LITERATURE = '@pages/info/jazz-and-literature.html.twig';
    public const string INFO_SESSIONS = '@pages/info/sessions.html.twig';
    public const string INFO_SESSIONS_COMMUNITY = '@pages/info/sessions-community.html.twig';
    public const string LANDING_OVERVIEW = '@pages/landing/overview.html.twig';
    public const string LANDING_SOCIALS = '@pages/landing/socials.html.twig';
    public const string NEWSLETTER_SUBSCRIPTION_RECEIVED = '@pages/newsletter/subscription-received-notification.html.twig';
    public const string NEWSLETTER_CONFIRMATION = '@pages/newsletter/confirmation-notification.html.twig';
    public const string NEWSLETTER_CANCELLATION = '@pages/newsletter/cancellation-notification.html.twig';
    public const string NEWSLETTER_ALREADY_SUBSCRIBED = '@pages/newsletter/already-subscribed-notification.html.twig';
    public const string NOTIFICATION_CONFIRMATION = '@pages/notifications/confirmation-notification.html.twig';
    public const string NOTIFICATION_UNSUBSCRIBED = '@pages/notifications/unsubscribed.html.twig';
    public const string SECURITY_CODE_LOGIN_FORM = '@pages/security/code/login-form.html.twig';
    public const string SECURITY_CODE_VERIFICATION_FORM = '@pages/security/code/verification-form.html.twig';
    public const string SECURITY_LINK_LOGIN_FORM = '@pages/security/link/login-form.html.twig';
    public const string SECURITY_LINK_LOGIN_CONFIRMATION = '@pages/security/link/login-confirmation.html.twig';
    public const string SECURITY_LINK_LOGIN_SENT = '@pages/security/link/login-sent.html.twig';
    public const string SECURITY_USER_PROFILE = '@pages/security/user/profile.html.twig';
}
