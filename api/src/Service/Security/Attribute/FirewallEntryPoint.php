<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Service\Security\Attribute;

use Attribute;

/**
 * Marks a method or class as an entry point for a specific firewall.
 */
#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION)]
final class FirewallEntryPoint
{
    /**
     * @param string $firewallName
     */
    public function __construct(
        public readonly string $firewallName,
    ) {}
}
