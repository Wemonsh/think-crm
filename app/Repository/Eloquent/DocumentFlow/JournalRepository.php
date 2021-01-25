<?php

namespace App\Repository\Eloquent\DocumentFlow;

use App\Models\DocumentFlow\Journal;
use App\QueryFilters\DocumentFlow\JournalFilters;
use App\Repository\DocumentFlow\JournalRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class JournalRepository extends BaseRepository implements JournalRepositoryInterface
{
    protected $model;

    /**
     * JournalRepository constructor.
     * @param Journal $model
     */
    public function __construct(Journal $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $params
     * @return array
     */
    public function paginate(array $params = []): array
    {
        $filters = JournalFilters::hydrate($params);

        return  $this->model->orderBy($params['sortName'] ?? 'id', $params['sortOrder'] ?? 'asc')
            ->filterBy($filters)->paginate($params['pageSize'] ?? 50, ['*'], 'pageNumber')->toArray();
    }
}
