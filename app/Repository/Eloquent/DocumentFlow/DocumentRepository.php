<?php

namespace App\Repository\Eloquent\DocumentFlow;

use App\Models\DocumentFlow\Document;
use App\QueryFilters\DocumentFlow\DocumentFilters;
use App\Repository\DocumentFlow\DocumentRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class DocumentRepository extends BaseRepository implements DocumentRepositoryInterface
{
    protected $model;

    /**
     * JournalRepository constructor.
     * @param Document $model
     */
    public function __construct(Document $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $params
     * @return array
     */
    public function paginate(array $params = []): array
    {
        $filters = DocumentFilters::hydrate($params);

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
