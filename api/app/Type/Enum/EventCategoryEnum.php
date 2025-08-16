<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Type\Enum;

/**
 * Veranstaltungskategorien
 */
enum EventCategoryEnum: string
{
    const DEFAULT = 'none';

    case default = self::DEFAULT;
    case session = 'session';
    case jazztage = 'jazztage';
    case jazzAndLiterature = 'jazz-and-literature';
}
