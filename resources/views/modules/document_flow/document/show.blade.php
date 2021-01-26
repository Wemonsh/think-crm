@extends('layouts.default')

@section('main')
    <h1 class="h3 mb-3 text-gray-800">Просмотр документа</h1>

    <div class="mb-3">
        <a href="" class="btn btn-primary"><i class="fas fa-undo"></i> Назад</a>
        <a href="{{ route('document.file-attach', $document['id']) }}" class="btn btn-secondary"><i class="fas fa-paperclip"></i> Прикрепить документ</a>
        <a href="" class="btn btn-secondary"><i class="fas fa-pen"></i> Редактировать</a>
        <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Удалить</a>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="co-6">
            @foreach($files as $file)
                <p><a href="">{{ $file->file_name }}</a></p>
            @endforeach
        </div>
    </div>
@endsection
