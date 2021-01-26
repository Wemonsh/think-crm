@extends('layouts.default')

@section('main')
    <h1 class="h3 mb-3 text-gray-800">Регистрация документа</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('document.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="journal">Журнал регистрации</label>
                    <select name="journal_id" id="journal" class="form-control">
                        <option value="" disabled selected>Не выбран</option>
                        @foreach($journals as $journal)
                            <option value="{{ $journal['id'] }}">{{ $journal['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="registered_at">Дата регистрации документа</label>
                    <input type="date" class="form-control" id="registered_at" name="registered_at" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                </div>
                <div class="form-group">
                    <label for="planned_at">Планируемый срок исполнения</label>
                    <input type="date" class="form-control" id="planned_at" name="planned_at">
                </div>
                <div class="form-group">
                    <label for="content">Содержание</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
