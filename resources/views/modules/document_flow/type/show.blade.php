@extends('layouts.default')

@section('main')
    <h1 class="h3 mb-3 text-gray-800">Просмотр</h1>

    <div class="mb-3">
        <a href="{{ route('type.index') }}" class="btn btn-primary"><i class="fas fa-undo"></i> Назад</a>
        <a href="{{ route('type.edit', $type['id']) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Править</a>
        <a href="{{ route('type.destroy', $type['id']) }}" class="btn btn-primary"><i class="fas fa-trash"></i> Удалить</a>
    </div>

    <div class="card">
        <div class="card-body">
            <p><small>Название</small><br>{{ $type['name'] }}</p>
            <p><small>Класс</small><br>{{ $type['class'] }}</p>
        </div>
    </div>
@endsection
