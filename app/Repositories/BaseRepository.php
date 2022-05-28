<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    public Model $model;


    /**
     * BaseService constructor.
     *
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }


    /**
     * @param int $id
     * @param array $attributes
     *
     * @return bool
     */
    public function update(int $id, array $attributes): bool
    {
        return $this->model->query()
            ->where('id', $id)
            ->update($attributes);
    }


    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->model->query()->findOrFail($id);
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->query()->create($attributes);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): boolean
    {
        return $this->model->query()
            ->where('id', $id)
            ->delete();
    }


    /**
     * @param Request $request
     * @param $perPage
     * @return LengthAwarePaginator
     */
    public function read($request, $perPage): LengthAwarePaginator
    {
        return $this->model->query()
            ->orderByDesc('id')
            ->paginate($perPage, '*', '', $request->query('page'));
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return Model|null
     */
    public function updateAndFetch(int $id, array $attributes): ?Model
    {
        if ($this->update($id, $attributes)) {
            return $this->find($id);
        }

        return null;
    }
}
