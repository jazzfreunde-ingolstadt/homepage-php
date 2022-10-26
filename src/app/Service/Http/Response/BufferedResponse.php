<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Http\Response;

use Jazzfreunde\App\Component\ComponentInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Http Response zum Rendern von Php-Komponenten
 */
final class BufferedResponse extends Response
{
    /**
     * Verschlüsselte Antwort
     *
     * @param ComponentInterface Html-Seite, die in Response gerendert wird.
     * @param integer $status
     * @param array $headers
     *
     * @throws \InvalidArgumentException When the HTTP status code is not valid
     */
    public function __construct(private ComponentInterface $page, int $status = 200, array $headers = [])
    {
        $this->page = $page;
        $this->charset = 'UTF-8';
        $this->content = '';
        $this->statusCode = $status;
        $this->statusText = '';
        $this->version = '1.0';

        parent::__construct(content: null, status: $status, headers: $headers);
    }

    /**
     * @inheritDoc
     */
    public function sendContent(): static
    {
        echo $this->getContent();

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getContent(): string|false
    {
        try {
            ob_start();
            $this->page->render();
            $html = ob_get_contents();
        } finally {
            ob_end_clean();
        }
        return $html;
    }
}
