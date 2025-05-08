<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{

    public function authenticate(array $credentials)
    {
        $user = User::where('username', $credentials['username'])->first();

        if (!$user) {
            return $this->formatResponse(false, 'Usuario no encontrado', 404);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return $this->formatResponse(false, 'Contraseña incorrecta', 401);
        }

        try {
            $token = JWTAuth::fromUser($user);
        } catch (JWTException $e) {
            return $this->formatResponse(false, 'No se pudo generar el token', 500);
        }

        return $this->formatResponse(true, 'Inicio de sesión exitoso', 200, [
            'token' => $token,
            'user'  => $this->formatUserResponse($user)
        ]);
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return $this->formatResponse(true, 'Sesión cerrada correctamente', 200);
        } catch (JWTException $e) {
            return $this->formatResponse(false, 'Error al cerrar sesión', 500);
        }
    }

    private function formatResponse($status, $message, $code, $data = [])
    {
        return [
            'status'  => $status,
            'message' => $message,
            'code'    => $code,
            'data'    => $data
        ];
    }

    private function formatUserResponse(User $user)
    {
        return [
            'id'               => $user->id,
            'name'             => $user->name,
            'last_name'        => $user->last_name ?? null,
            'second_last_name' => $user->second_last_name ?? null,
            'username'         => $user->username,
            'email'            => $user->email,
            'role_id'            => $user->role_id,
            'status_id'            => $user->status_id,
            'language_id' => $user->language_id,
        ];
    }
}
