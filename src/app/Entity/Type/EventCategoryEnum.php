<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Entity\Type;

/**
 * Veranstaltungskategorien
 */
enum EventCategoryEnum: string
{
    const DEFAULT = 'none';

    case default = self::DEFAULT;
    case session = 'session';
    case jazztage = 'jazztage';
}
