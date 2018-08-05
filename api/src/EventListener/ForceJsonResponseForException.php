<?php


namespace App\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ForceJsonResponseForException
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        $error = [
            'message' => $exception->getMessage(),
            'debug' => [
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ],
        ];

        $response = new JsonResponse($error);

        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
            $response->headers->replace($exception->getHeaders());
        } else {
            $response->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
        $event->setResponse($response);

    }
}