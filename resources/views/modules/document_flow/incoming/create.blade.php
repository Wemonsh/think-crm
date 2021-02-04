@extends('layouts.default')

@section('main')
    <form action="{{ route('importance.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="">Дата регистрации</label>
            <input type="date" class="form-control" id="" name="">
        </div>

        <div class="form-group">
            <label for="">Количество страниц</label>
            <input type="number" class="form-control" id="" name="">
        </div>

        <div class="form-group">
            <label for="">Дата документа</label>
            <input type="number" class="form-control" id="" name="">
        </div>

        <div class="form-group">
            <label for="">Корреспондент</label>
            <select multiple class="form-control" id="" name="">
                <option>Не выбран</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Тип документа</label>
            <select multiple class="form-control" id="" name="">
                <option>Не выбран</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Важность</label>
            <select multiple class="form-control" id="" name="">
                <option>Не выбран</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Содержание</label>
            <textarea class="form-control" id="" name="" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="">Куратор</label>
            <select multiple class="form-control" id="" name="">
                <option>Не выбран</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Дата резоюции</label>
            <input type="date" class="form-control" id="" name="">
        </div>

        <div class="form-group">
            <label for="">Резолюция</label>
            <textarea class="form-control" id="" name="" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="">Исполнитель</label>
            <select multiple class="form-control" id="" name="">
                <option>Не выбран</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Планируемая дата</label>
            <input type="date" class="form-control" id="" name="">
        </div>

        <div class="form-group">
            <label for="">Фактическое исполнение</label>
            <input type="date" class="form-control" id="" name="">
        </div>

        <div class="form-group">
            <label for="">Отметка об исполнении</label>
            <textarea class="form-control" id="" name="" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection

