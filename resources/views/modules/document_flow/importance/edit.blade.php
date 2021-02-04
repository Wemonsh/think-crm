@extends('layouts.default')

@section('main')
    <form action="{{ route('importance.update',$importance['id']) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $importance }}">
        </div>
        <div class="form-group">
            <label for="class">Класс</label>
            <input type="text" class="form-control" id="class" name="class" value="{{ $importance }}">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
