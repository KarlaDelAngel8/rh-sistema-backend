<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class PermissionService
{
    protected $service;

    public function __construct(PermissionService $service)
    {
        $this->service = $service;
    }

    public function checkRoutePermission(Request $request)
    {
        return response()->json(
            $this->service->checkRoutePermission($request->route_name, $request->role_id)
        );
    }

    public function getUserPermissions(Request $request)
    {
        return response()->json(
            $this->service->getUserPermissions($request->role_id)
        );
    }
}
