@extends('layouts.default')

@section('main')
    <h1 class="h3 mb-3 text-gray-800">Прикрепить файл</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('document.file-store', $document_id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="files">Файлы</label>
                    <input type="file" class="form-control-file" id="files" name="files[]" multiple>
                </div>

                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
