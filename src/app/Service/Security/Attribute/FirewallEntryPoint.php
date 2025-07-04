<?php declare(strict_types=1);

namespace Jazzfreunde\App\Service\Security\Attribute;

use Attribute;

/**
 * Marks a method or class as an entry point for a specific firewall.
 */
#[Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::TARGET_FUNCTION)]
final class FirewallEntryPoint
{
    /**
     * Undocumented function
     *
     * @param string $firewallName
     */
    public function __construct(
        private string $firewallName,
    ) {
    }
    
    /**
     * Get the name of the firewall.
     *
     * @return string
     */
    public function getFirewallName(): string
    {
        return $this->firewallName;
    }
}
