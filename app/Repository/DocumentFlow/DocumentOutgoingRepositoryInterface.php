<?php

namespace App\Repository\DocumentFlow;

use App\Repository\EloquentRepositoryInterface;

interface DocumentOutgoingRepositoryInterface extends EloquentRepositoryInterface {

    /**
     * @param array $params
     * @return array
     */
    public function paginate(array $params = []): array;

    /**
     * @return mixed
     */
    public function findLast();
}
