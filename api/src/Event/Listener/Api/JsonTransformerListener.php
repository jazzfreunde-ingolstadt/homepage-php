<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Event\Listener\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

use function is_array;
use function json_decode;

/**
 * Dekodiert JSON-Daten in der Request, sofern vorhanden.
 *
 * @psalm-api
 */
final class JsonTransformerListener
{
    private const int JSON_DEPTH = 512;

    /**
     * Transformiere JSON Daten.
     *
     * @param RequestEvent $event
     */
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        if (!$this->supports($request)) {
            return;
        }

        $content = $request->getContent();

        if (0 === strlen($content)) {
            return;
        }

        $decoded = $this->decodeJson($content);

        if (null !== $decoded) {
            $request->request->replace($decoded);

            return;
        }

        $event->setResponse(new JsonResponse(['message' => 'Unable to parse JSON'], Response::HTTP_BAD_REQUEST));
    }

    /**
     * Wird die Anfrage vom Listener unterstützt?
     *
     * @param Request $request
     *
     * @return bool
     */
    private function supports(Request $request): bool
    {
        return $request->isMethod('post')
            && 'json' == $request->getContentTypeFormat()
            && $request->getContent();
    }

    /**
     * Dekodiert einen JSON-String in ein assoziatives Array.
     *
     * @param string $json
     *
     * @return null|array<string, mixed>
     */
    private function decodeJson(string $json): ?array
    {
        if (0 === strlen($json)) {
            return null;
        }

        $data = json_decode($json, true, self::JSON_DEPTH);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return null;
        }

        if (is_null($data) || is_bool($data)) {
            return [];
        }

        if (!is_array($data)) {
            return null;
        }

        return array_combine(
            array_map('strval', array_keys($data)),
            array_values($data),
        );
    }
}
