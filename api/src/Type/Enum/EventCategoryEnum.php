<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Type\Enum;

/**
 * Veranstaltungskategorien.
 */
enum EventCategoryEnum: string
{
    case default = self::DEFAULT;
    case session = 'session';
    case jazztage = 'jazztage';
    case jazzAndLiterature = 'jazz-and-literature';
    case jazzTheKiesch = 'jazz-the-kiesch';
    public const DEFAULT = 'none';
}
