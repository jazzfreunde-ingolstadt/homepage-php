<?php declare(strict_types=1);

namespace Jazzfreunde\App\Workflow\ConfirmationContract;

/**
 * All possible transitions of a confirmation contract.
 */
enum TransitionsEnum: string
{
    case AwaitConfirmation = 'await_confirmation';
    case Confirm = 'confirm';
    case Cancel = 'cancel';
    case Retry = 'retry';
}
