<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Type\Enum;

/**
 * Sammlung aller bekannten Mail-Handles.
 *
 * @see Jazzfreunde\Api\Entity\KnownMail
 */
enum KnownMailHandleEnum: string
{
    case NoReply = 'no-reply';
    case Jazzletter = 'jazzletter';
    case Developers = 'developers';
}
