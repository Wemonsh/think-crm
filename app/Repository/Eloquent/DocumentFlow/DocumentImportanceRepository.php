<?php

namespace App\Repository\Eloquent\DocumentFlow;

use App\Models\DocumentFlow\DocumentImportance;
use App\QueryFilters\DocumentFlow\DocumentImportanceFilters;
use App\Repository\DocumentFlow\DocumentImportanceRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;

class DocumentImportanceRepository extends BaseRepository implements DocumentImportanceRepositoryInterface
{
    protected $model;

    /**
     * JournalRepository constructor.
     * @param DocumentImportance $model
     */
    public function __construct(DocumentImportance $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $params
     * @return array
     */
    public function paginate(array $params = []): array
    {
        $filters = DocumentImportanceFilters::hydrate($params);

        return  $this->model->orderBy($params['sortName'] ?? 'id', $params['sortOrder'] ?? 'asc')
            ->filterBy($filters)->paginate($params['pageSize'] ?? 50, ['*'], 'pageNumber')->toArray();
    }
}
