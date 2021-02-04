@extends('layouts.default')

@section('main')
    <form action="{{ route('correspondent.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="number">Номер</label>
            <input type="text" class="form-control" id="number" name="number">
        </div>
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
