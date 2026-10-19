<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Contract;

use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Message\Messages\Email\EmailNotification;
use Jazzfreunde\App\Type\Primitive\Email;

/**
 * Generates a confirmation request email for a contract.
 */
interface ContractConfirmationRequestMailGeneratorInterface
{
    public function generate(ConfirmationContract $contract, Email $recipient): EmailNotification;
}
