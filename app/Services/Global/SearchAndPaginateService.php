<?php

namespace App\Services\Global;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SearchAndPaginateService
{
    public function searchAndPaginate($modelOrQuery, Request $request, array $searchColumns, array $relationSearch = [], $perPage = 10)
    {
        $query = $modelOrQuery instanceof Model ? $modelOrQuery->query() : $modelOrQuery;

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');

            $query->where(function ($q) use ($searchColumns, $searchTerm) {
                foreach ($searchColumns as $index => $column) {
                    $method = $index === 0 ? 'where' : 'orWhere';
                    $q->{$method}($column, 'LIKE', '%' . $searchTerm . '%');
                }
            });

            foreach ($relationSearch as $relation => $columns) {
                $query->orWhereHas($relation, function ($q) use ($columns, $searchTerm) {
                    foreach ($columns as $index => $column) {
                        $method = $index === 0 ? 'where' : 'orWhere';
                        $q->{$method}($column, 'LIKE', '%' . $searchTerm . '%');
                    }
                });
            }
        }

        foreach (array_keys($relationSearch) as $relation) {
            $query->with($relation);
        }

        $perPage = $request->input('per_page', $perPage);
        $page = $request->input('page', 1);

        return $query->orderByDesc('created_at')
            ->paginate($perPage, ['*'], 'page', $page)
            ->appends([
                'per_page' => $perPage,
                'page' => $page,
                'search' => $request->input('search'),
            ]);
    }
}
