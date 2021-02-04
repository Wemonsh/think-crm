<?php

namespace App\Repository\Eloquent\DocumentFlow;

use App\Models\DocumentFlow\DocumentCorrespondent;
use App\QueryFilters\DocumentFlow\DocumentCorrespondentFilters;
use App\Repository\DocumentFlow\DocumentCorrespondentRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;

class DocumentCorrespondentRepository extends BaseRepository implements DocumentCorrespondentRepositoryInterface
{
    protected $model;

    /**
     * JournalRepository constructor.
     * @param DocumentCorrespondent $model
     */
    public function __construct(DocumentCorrespondent $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $params
     * @return array
     */
    public function paginate(array $params = []): array
    {
        $filters = DocumentCorrespondentFilters::hydrate($params);

        return  $this->model->orderBy($params['sortName'] ?? 'id', $params['sortOrder'] ?? 'asc')
            ->filterBy($filters)->paginate($params['pageSize'] ?? 50, ['*'], 'pageNumber')->toArray();
    }
}
