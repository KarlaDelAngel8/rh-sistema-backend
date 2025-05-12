<?php

namespace App\Traits;
use Illuminate\Http\JsonResponse;
trait JsonResponseTrait
{
    protected function successResponse(array $data = [], string $message = 'Operación exitosa.', int $code = 200): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function errorResponse(string $message = 'Ocurrió un error.', int $code = 400, array $errors = []): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }
}
