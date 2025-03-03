<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponse
{
    /**
     * @param string $message
     * @param string $error
     * @param int $status
     * @return JsonResponse
     */
    protected function response(string $message, object|null $data, string|null $error, int $status): JsonResponse
    {

        $array = [
            'message' => $message,
            'success' => in_array($status, $this->statuses()) ?? false,
            'data' => $data,
            'errors' => $error,

        ];

        return response()->json($array, $status);
    }

    /**
     * @return array
     */
    protected function statuses(): array
    {
        return [
            Response::HTTP_OK,
            Response::HTTP_CREATED,
            Response::HTTP_ACCEPTED,
        ];
    }

    /**
     * @param string $message
     * @param int $code
     * @param string $exception
     * @return JsonResponse
     */
    protected function notFoundResponse(string $message, int $code, string $exception): JsonResponse
    {
        return $this->response(
            $message,
            null,
            $exception,
            $code
        );
    }
}
