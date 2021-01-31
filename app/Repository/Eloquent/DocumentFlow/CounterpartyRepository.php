<?php

namespace App\Repository\Eloquent\DocumentFlow;

use App\Models\DocumentFlow\Counterparty;
use App\QueryFilters\DocumentFlow\CounterpartyFilters;
use App\Repository\DocumentFlow\CounterpartyRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;

class CounterpartyRepository extends BaseRepository implements CounterpartyRepositoryInterface
{
    protected $model;

    /**
     * JournalRepository constructor.
     * @param Counterparty $model
     */
    public function __construct(Counterparty $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $params
     * @return array
     */
    public function paginate(array $params = []): array
    {
        $filters = CounterpartyFilters::hydrate($params);

        return  $this->model->orderBy($params['sortName'] ?? 'id', $params['sortOrder'] ?? 'asc')
            ->filterBy($filters)->paginate($params['pageSize'] ?? 50, ['*'], 'pageNumber')->toArray();
    }
}
