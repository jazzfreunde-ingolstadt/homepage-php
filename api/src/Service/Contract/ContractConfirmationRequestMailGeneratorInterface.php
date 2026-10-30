<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Contract;

use Jazzfreunde\Api\Entity\Contract\ConfirmationContract;
use Jazzfreunde\Api\Message\Messages\Email\EmailNotification;
use Jazzfreunde\Api\Type\Primitive\Email;

/**
 * Generates a confirmation request email for a contract.
 */
interface ContractConfirmationRequestMailGeneratorInterface
{
    public function generate(ConfirmationContract $contract, Email $recipient): EmailNotification;
}
