<?php

namespace App\Repository\Eloquent\DocumentFlow;

use App\Models\DocumentFlow\DocumentIncoming;
use App\QueryFilters\DocumentFlow\DocumentIncomingFilters;
use App\Repository\DocumentFlow\DocumentIncomingRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class DocumentIncomingRepository extends BaseRepository implements DocumentIncomingRepositoryInterface
{
    protected $model;

    /**
     * JournalRepository constructor.
     * @param DocumentIncoming $model
     */
    public function __construct(DocumentIncoming $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $params
     * @return array
     */
    public function paginate(array $params = []): array
    {
        $filters = DocumentIncomingFilters::hydrate($params);

        return  $this->model->with(['journal'])->orderBy($params['sortName'] ?? 'id', $params['sortOrder'] ?? 'desc')
            ->filterBy($filters)->paginate($params['pageSize'] ?? 50, ['*'], 'pageNumber')->toArray();
    }

    public function findLast()
    {
        return $this->model->where('year', '=', now()->year)->orderBy('created_at', 'desc')->first();
    }

    public function create(array $payload): ?Model
    {
        $payload['year'] = now()->year;
        $payload['number'] = ++optional($this->findLast())->number ?? 1;

        return parent::create($payload);
    }
}
