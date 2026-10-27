<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Email;

/**
 * Looks up DNS records for email domain validation.
 */
interface DnsRecordLookupInterface
{
    /**
     * Query DNS for records of the requested type.
     *
     * @param string $domain Domain name to query
     * @param int    $type   DNS record type
     *
     * @return false|list<array<array-key, mixed>> False indicates that the lookup could not be completed
     */
    public function lookup(string $domain, int $type): array|false;
}
