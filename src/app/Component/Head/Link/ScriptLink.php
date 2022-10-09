<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Head\Link;

use Jazzfreunde\App\Component\ComponentInterface;

/**
 * Html Element zur Einbindung von Skripten.
 */
class ScriptLink implements ComponentInterface
{
    /**
     * @param string $src
     * @param string $referrerpolicy
     * @param string $crossorigin
     */
    public function __construct(private string $src, private string $referrerpolicy = 'no-referrer', private string $crossorigin = 'anonymous', private string $integrity = '')
    {
    }

    /**
     * @inheritDoc
     */
    public function render(): void
    {
        $integrity = empty($this->integrity) ? '' : " integrity=\"{$this->integrity}\"";
        ?><script src="<?= $this->src ?>" referrerpolicy="<?= $this->referrerpolicy ?>" crossorigin="<?= $this->crossorigin ?><?= $integrity ?>"></script><?php
    }
}
