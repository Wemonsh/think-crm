@extends('layouts.app')

@section('main')
    <form action="{{ route('document.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="registered_at">Дата регистрации документа</label>
            <input type="date" class="form-control" id="registered_at" name="registered_at">
        </div>
        <div class="form-group">
            <label for="planned_at">Планируемый срок исполнения</label>
            <input type="date" class="form-control" id="planned_at" name="planned_at">
        </div>
        <div class="form-group">
            <label for="content">Содержание</label>
            <textarea class="form-control" id="description" name="content" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
