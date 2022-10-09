<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Head\Meta;

use Jazzfreunde\App\Component\ComponentInterface;

/**
 * Html für Metadaten im Kopfsatz
 */
class MetadataOpenGraph extends Metadata implements ComponentInterface
{
    /**
     * @param string $property
     * @param string $content
     */
    public function __construct(private string $property, private string $content)
    {
    }

    /**
     * @inheritDoc
     */
    public function render(): void
    {
        ?><meta property="<?= $this->property ?>" content="<?= $this->content ?>" /><?php
    }
}
