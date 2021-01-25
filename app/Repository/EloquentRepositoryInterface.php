<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    /**
     * @param array|string[] $columns
     * @param array $relation
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relation = []): Collection;

    /**
     * @return Collection
     */
    public function allTrashed() : Collection;

    /**
     * @param int $modelId
     * @param array|string[] $columns
     * @param array $relation
     * @param array $appends
     * @return Model|null
     */
    public function findById(
        int $modelId,
        array $columns = ['*'],
        array $relation = [],
        array $appends = []
    ): ?Model;

    /**
     * @param int $modelId
     * @return Model|null
     */
    public function findTrashedById(int $modelId): ?Model;

    /**
     * @param int $modelId
     * @return Model|null
     */
    public function findOnlyTrashedById(int $modelId): ?Model;

    /**
     * @param array $payload
     * @return Model|null
     */
    public function create(array $payload): ?Model;

    /**
     * @param int $modelId
     * @param array $payload
     * @return Model|null
     */
    public function update(int $modelId, array $payload): bool;

    /**
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $modelId): bool;

    /**
     * @param int $modelId
     * @return bool
     */
    public function restoreById(int $modelId): bool;

    /**
     * @param int $modelId
     * @return bool
     */
    public function permanentlyDeleteById(int $modelId): bool;
}
