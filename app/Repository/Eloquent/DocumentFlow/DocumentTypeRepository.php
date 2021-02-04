<?php

namespace App\Repository\Eloquent\DocumentFlow;

use App\Models\DocumentFlow\DocumentType;
use App\QueryFilters\DocumentFlow\DocumentTypeFilters;
use App\Repository\DocumentFlow\DocumentTypeRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;

class DocumentTypeRepository extends BaseRepository implements DocumentTypeRepositoryInterface
{
    protected $model;

    /**
     * JournalRepository constructor.
     * @param DocumentType $model
     */
    public function __construct(DocumentType $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $params
     * @return array
     */
    public function paginate(array $params = []): array
    {
        $filters = DocumentTypeFilters::hydrate($params);

        return  $this->model->orderBy($params['sortName'] ?? 'id', $params['sortOrder'] ?? 'asc')
            ->filterBy($filters)->paginate($params['pageSize'] ?? 50, ['*'], 'pageNumber')->toArray();
    }
}
