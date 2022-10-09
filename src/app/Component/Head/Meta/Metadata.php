<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Head\Meta;

use Jazzfreunde\App\Component\ComponentInterface;

/**
 * Html für Metadaten im Kopfsatz
 */
class Metadata implements ComponentInterface
{
    /**
     * @param string $name
     * @param string $content
     */
    public function __construct(private string $name, private string $content)
    {
    }

    /**
     * @inheritDoc
     */
    public function render(): void
    {
        ?><meta name="<?= $this->name ?>" content="<?= $this->content ?>" /><?php
    }
}
