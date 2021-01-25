@extends('layouts.app')

@section('main')

    <a href="{{ route('document.attach', $document['id']) }}">Прикрепить документ</a>

@endsection
