<?php

namespace App\Traits;

trait ApiResponseTrait
{
    protected function success($data = [], $message = 'Operación exitosa', $code = 200)
    {
        return response()->json([
            'status' => true,
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function error($message = 'Error interno del servidor', $errors = [], $code = 500)
    {
        return response()->json([
            'status' => false,
            'code' => $code,
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }
}
