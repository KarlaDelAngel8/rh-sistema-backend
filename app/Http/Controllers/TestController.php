<?php


namespace App\Http\Controllers;

use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use JsonResponseTrait;

    public function success()
    {
        $data = ['mensaje' => 'Todo funcionó correctamente'];
        return $this->successResponse($data);
    }

    // POST /api/test/create
    public function create(Request $request)
    {
        $producto = ['id' => 10, 'nombre' => $request->input('nombre', 'Producto X')];
        return $this->successResponse(['producto' => $producto], 'Recurso creado.', 201);
    }

    // GET /api/test/bad-request
    public function badRequest()
    {
        return $this->errorResponse('Datos inválidos.', 400, [
            'El campo nombre es obligatorio.',
            'El campo precio debe ser numérico.'
        ]);
    }

    // GET /api/test/exception
    public function exception()
    {
        try {
            throw new \Exception('Fallo interno.');
        } catch (\Exception $e) {
            return $this->errorResponse('Ocurrió un error en el sistema.', 500, [$e->getMessage()]);
        }
    }
}
