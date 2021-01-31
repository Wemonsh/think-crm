@extends('layouts.default')

@section('main')
    <h1 class="h3 mb-3 text-gray-800">Просмотр контрагента</h1>

    <div class="mb-3">
        <a href="{{ route('counterparty.index') }}" class="btn btn-primary"><i class="fas fa-undo"></i> Назад</a>
        <a href="{{ route('counterparty.edit', $counterparty['id']) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Править</a>
        <a href="{{ route('counterparty.destroy', $counterparty['id']) }}" class="btn btn-primary"><i class="fas fa-trash"></i> Удалить</a>
    </div>

    <div class="card">
        <div class="card-body">
            <p><small>Код</small><br>{{ $counterparty['code'] }}</p>
            <p><small>Название</small><br>{{ $counterparty['name'] }}</p>
        </div>
    </div>
@endsection
