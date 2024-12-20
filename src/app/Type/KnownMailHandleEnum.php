<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Type;

/**
 * Sammlung aller bekannten Mail-Handles
 * @see Jazzfreunde\App\Entity\KnownMail
 */
enum KnownMailHandleEnum: string
{
    case NoReply = 'no-reply';
    case Jazzletter = 'jazzletter';
}
