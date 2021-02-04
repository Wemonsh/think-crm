@extends('layouts.default')

@section('main')
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-3 text-gray-800">Типы</h1>
        </div>
        <div class="col-6">
            <a href="{{ route('type.create') }}" class="btn btn-primary float-right">Создать</a>
        </div>
    </div>

    <div class="toolbar" id="toolbar">
        <div class="form-inline">
            <div class="form-group mb-2 mr-2">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                   aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-filter"></i> Фильтр
                </a>
            </div>
        </div>
        <div class="collapse" id="collapseExample">

        </div>
    </div>

    <table
        id="table"
        class="bg-white"
        data-toggle="table"
        data-ajax="ajaxRequest"
        data-side-pagination="server"
        data-pagination="true"
        data-page-number="1"
        data-query-params="dataQueryParams"
        data-query-params-type=""
        data-pagination-v-align="both"
        data-toolbar=".toolbar"
        data-show-columns="true"
        data-minimum-count-columns="2"
        data-show-refresh="true"
        data-page-size="50">
        <thead>
        <tr>
            <th data-field="id" data-width="5" data-width-unit="%">#</th>
            <th data-field="name" data-width="10" data-width-unit="%">Название</th>
            <th data-field="class" data-width="30" data-width-unit="%">Класс</th>
            <th data-field="created_at" data-width="20" data-width-unit="%">Дата создания</th>
            <th data-field="updated_at" data-width="20" data-width-unit="%">Дата изменения</th>
            <th data-formatter="actionFormatter" data-width="15" data-width-unit="%">Действия</th>
        </tr>
        </thead>
    </table>

    <script>
        // Параметры запроса
        function dataQueryParams(params) {
            //params.code = $('#code').val();
            return params;
        }

        // Ajax запрос
        function ajaxRequest(params) {
            var url = '{{ route('type.response') }}'
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            })
        }

        function actionFormatter(value, row) {
            return '<div class="text-center"><a class="btn btn-primary btn-sm mr-1" href="/document-flow/type/show/' + row.id + '">Просмотр</a>' +
                '<a class="btn btn-primary btn-sm" href="/document-flow/type/edit/' + row.id + '">Править</a></div>';
        }
    </script>

@endsection
