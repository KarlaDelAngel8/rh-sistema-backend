<?php

namespace App\Http\Controllers\Auth;

use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController
{
    public function __construct(protected AuthService $authService)
    {}

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $result = $this->authService->authenticate($request->only('username', 'password'));
        return response()->json($result, $result['code']);
    }

    public function logout()
    {
        $token = JWTAuth::getToken();
        if (!$token) {
            return response()->json([
                'status'  => false,
                'message' => 'Token no proporcionado',
                'code'    => 400
            ]);
        }

        $result = $this->authService->logout();
        return response()->json($result, $result['code']);
    }
}
