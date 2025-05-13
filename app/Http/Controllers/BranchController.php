<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branch;
use App\Repositories\Global\ChangesStatusRepository;
use App\Services\Global\SearchAndPaginateService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function __construct(
        protected ChangesStatusRepository $changesStatusRepository,
        protected SearchAndPaginateService $searchAndPaginateService
    ){}
    use ApiResponseTrait;

    public function activeBranches(): JsonResponse
    {
        $branches = Branch::orderBy('name', 'asc')->where('status_id', 1)->get();
        return $this->success($branches->toArray(), 'Sucursales activas.');
    }

    public function index(Request $request): JsonResponse
    {
        $searchColumns = ['name'];
        $relationSearch = [
            'status' => ['name'],
        ];

        $branches = $this->searchAndPaginateService->searchAndPaginate(
            new Branch(),
            $request,
            $searchColumns,
            $relationSearch,
            $request->input('per_page', 10)
        );

        return $this->success($branches->toArray(), 'Sucursales activas.');
    }

    public function store(StoreBranchRequest $request): JsonResponse
    {
        $branch = Branch::create($request->all());
        return $this->success($branch->toArray(), 'Sucursal creada exitosamente.', 201);
    }

    public function update(UpdateBranchRequest $request, $id): JsonResponse
    {
        $branch = Branch::findOrFail($id);
        $branch->update([
            'name' => $request->input('nameEdit'),
            'status_id' => $request->input('status_idEdit'),
        ]);

        return $this->success($branch->toArray(), 'Sucursal actualizada exitosamente.');
    }
}
