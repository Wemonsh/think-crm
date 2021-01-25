<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array|string[] $columns
     * @param array $relation
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relation = []): Collection
    {
        return  $this->model->with($relation)->get($columns);
    }

    /**
     * @return Collection
     */
    public function allTrashed(): Collection
    {
        return $this->model->onlyTrashed()->get();
    }

    /**
     * @param int $modelId
     * @param array|string[] $columns
     * @param array $relation
     * @param array $appends
     * @return Model|null
     */
    public function findById(int $modelId, array $columns = ['*'], array $relation = [], array $appends = []): ?Model
    {
        return $this->model->select($columns)->with($relation)->findOrFail($modelId)->append($appends);
    }

    /**
     * @param int $modelId
     * @return Model|null
     */
    public function findTrashedById(int $modelId): ?Model
    {
        return $this->model->withTrashed()->findOrFail($modelId);
    }

    /**
     * @param int $modelId
     * @return Model|null
     */
    public function findOnlyTrashedById(int $modelId): ?Model
    {
        return $this->model->onlyTrashed()->findOrFail($modelId);
    }

    /**
     * @param array $payload
     * @return Model|null
     */
    public function create(array $payload): ?Model
    {
        $model = $this->model->create($payload);

        return $model->fresh();
    }

    /**
     * @param int $modelId
     * @param array $payload
     * @return bool
     */
    public function update(int $modelId, array $payload): bool
    {
        $model = $this->findById($modelId);

        return $model->update($payload);
    }


    public function deleteById(int $modelId): bool
    {
        return $this->findById($modelId)->delete();
    }

    /**
     * @param int $modelId
     * @return bool
     */
    public function restoreById(int $modelId): bool
    {
        return $this->findOnlyTrashedById($modelId)->restore();
    }

    /**
     * @param int $modelId
     * @return bool
     */
    public function permanentlyDeleteById(int $modelId): bool
    {
        return $this->findOnlyTrashedById($modelId)->forceDelete();
    }
}
