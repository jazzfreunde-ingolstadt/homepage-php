<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Head\Link;

use Jazzfreunde\App\Component\ComponentInterface;

/**
 * Html Element zur Einbindung von Stylesheets.
 */
class StylesheetLink implements ComponentInterface
{
    /**
     * @param string $href
     * @param string $integrity
     * @param string $crossorigin
     * @param string $media
     */
    public function __construct(private string $href, private string $crossorigin = 'anonymous', private string $integrity = '', private string $media = '')
    {
    }

    /**
     * @inheritDoc
     */
    public function render(): void
    {
        $integrity = empty($this->integrity) ? '' : " integrity=\"{$this->integrity}\"";
        $media = empty($this->media) ? '' : " media=\"{$this->media}\"";
        ?><link rel="stylesheet" href="<?= $this->href ?>" crossorigin="<?= $this->crossorigin ?><?= $integrity ?>" media="<?= $media ?>"><?php
    }
}
