<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
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

