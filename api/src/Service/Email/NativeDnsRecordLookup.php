<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Email;

use Override;

/**
 * Resolves DNS records with PHP's configured system resolver.
 *
 * @psalm-api
 */
final class NativeDnsRecordLookup implements DnsRecordLookupInterface
{
    /**
     * {@inheritDoc}
     */
    #[Override]
    public function lookup(string $domain, int $type): array|false
    {
        if (!function_exists('dns_get_record')) {
            return false;
        }

        return @dns_get_record($domain, $type);
    }
}
