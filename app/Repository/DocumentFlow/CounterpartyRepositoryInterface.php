<?php

namespace App\Repository\DocumentFlow;

use App\Repository\EloquentRepositoryInterface;

interface CounterpartyRepositoryInterface extends EloquentRepositoryInterface {

    /**
     * @param array $params
     * @return array
     */
    public function paginate(array $params = []): array;
}


