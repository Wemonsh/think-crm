<?php

namespace App\StateMachines\DocumentFlow;

use Asantibanez\LaravelEloquentStateMachines\StateMachines\StateMachine;

class DocumentStatusStateMachine extends StateMachine
{
    public function recordHistory(): bool
    {
        return true;
    }

    public function transitions(): array
    {
        return [
            'registered' => ['pending'],
            'pending' => ['working', 'registered'],
            'working' => ['completed'],
            'completed' => ['closed', 'working'],
            'closed' => []
        ];
    }

    public function defaultState(): ?string
    {
        return 'registered';
    }
}
