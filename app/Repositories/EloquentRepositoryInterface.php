<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Client\Request;
use phpDocumentor\Reflection\Types\Boolean;

interface EloquentRepositoryInterface
{
    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param int $modelModelModelId
     * @param array $attributes
     * @return bool
     */
    public function update(int $modelModelModelId, array $attributes): bool;

    /**
     * @param int $id
     * @return Model|null
     * @throws ModelNotFoundException
     */
    public function find(int $id): ?Model;


    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id):boolean;

    /**
     * @param Request $request
     * @param $perPage
     * @return LengthAwarePaginator
     */
    public function read(Request $request, $perPage): LengthAwarePaginator;

    /**
     * @param int $id
     * @param array $attributes
     * @return Model|null
     */
    public function updateAndFetch(int $id, array $attributes): ?Model;

}
