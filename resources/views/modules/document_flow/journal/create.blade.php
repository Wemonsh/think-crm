@extends('layouts.app')

@section('main')
    <form action="{{ route('journal.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control" id="name" name="name">
            <small id="nameHelp" class="form-text text-muted">Название журнала регистрации</small>
        </div>
        <div class="form-group">
            <label for="slug">Название</label>
            <input type="text" class="form-control" id="slug" name="slug">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
