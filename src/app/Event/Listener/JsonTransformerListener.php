<?php declare(strict_types=1);

namespace Jazzfreunde\App\Event\Listener\Transformer;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;

/**
 * Dekodiert JSON-Daten in der Request, sofern vorhanden
 */
final class JsonTransformerListener
{
    /**
     * Transformiere JSON Daten
     *
     * @param RequestEvent $event
     * @return void
     */
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        if (!$this->supports($request)) {
            return;
        }

        try {
            /**
             * @var object|array $data
             */
            $data = \json_decode($request->getContent(), true, 512, \JSON_THROW_ON_ERROR);

            if (\is_array($data)) {
                $request->request->replace($data);
            }
        } catch (\JsonException $exception) {
            $event->setResponse(new JsonResponse(['message' => $exception->getMessage()], Response::HTTP_BAD_REQUEST));
        }
    }

    /**
     * Wird die Anfrage vom Listener unterstützt?
     *
     * @param Request $request
     * @return boolean
     */
    private function supports(Request $request): bool
    {
        return $request->isMethod('post')
            && 'json' == $request->getContentTypeFormat()
            && $request->getContent();
    }
}
