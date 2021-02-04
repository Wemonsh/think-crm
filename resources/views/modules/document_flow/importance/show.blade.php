@extends('layouts.default')

@section('main')
    <h1 class="h3 mb-3 text-gray-800">Просмотр</h1>

    <div class="mb-3">
        <a href="{{ route('importance.index') }}" class="btn btn-primary"><i class="fas fa-undo"></i> Назад</a>
        <a href="{{ route('importance.edit', $importance['id']) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Править</a>
        <a href="{{ route('importance.destroy', $importance['id']) }}" class="btn btn-primary"><i class="fas fa-trash"></i> Удалить</a>
    </div>

    <div class="card">
        <div class="card-body">
            <p><small>Название</small><br>{{ $importance['name'] }}</p>
            <p><small>Класс</small><br>{{ $importance['class'] }}</p>
        </div>
    </div>
@endsection
