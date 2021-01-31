@extends('layouts.default')

@section('main')
    <form action="{{ route('counterparty.update',$counterparty['id']) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="code">Код</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $counterparty['code'] }}">
        </div>
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $counterparty['name'] }}">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
