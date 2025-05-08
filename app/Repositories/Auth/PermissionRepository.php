<?php

namespace App\Repositories\Auth;

use App\Models\Route;
use App\Models\Section;
use App\Models\RoutePermission;

class PermissionRepository
{
    public function getRouteByName(string $routeName)
    {
        return Route::where('name', $routeName)->first();
    }

    public function getPermission(int $routeId, int $roleId)
    {
        return RoutePermission::where('route_id', $routeId)
            ->where('role_id', $roleId)
            ->first();
    }

    public function getSectionsWithPermissions(int $routeId, int $roleId)
    {
        return Section::where('route_id', $routeId)
            ->with(['sectionPermissions' => fn($query) => $query->where('role_id', $roleId)])
            ->get(['id', 'name']);
    }

    public function getUserRoutes(int $roleId)
    {
        return RoutePermission::where('role_id', $roleId)
            ->with('route')
            ->get()
            ->pluck('route.name');
    }
}
