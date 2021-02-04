@extends('layouts.default')

@section('main')
    <h1 class="h3 mb-3 text-gray-800">Просмотр</h1>

    <div class="mb-3">
        <a href="{{ route('correspondent.index') }}" class="btn btn-primary"><i class="fas fa-undo"></i> Назад</a>
        <a href="{{ route('correspondent.edit', $correspondent['id']) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Править</a>
        <a href="{{ route('correspondent.destroy', $correspondent['id']) }}" class="btn btn-primary"><i class="fas fa-trash"></i> Удалить</a>
    </div>

    <div class="card">
        <div class="card-body">
            <p><small>Номер</small><br>{{ $correspondent['code'] }}</p>
            <p><small>Название</small><br>{{ $correspondent['name'] }}</p>
        </div>
    </div>
@endsection
