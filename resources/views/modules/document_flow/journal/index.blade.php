@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="card mb-3">
            <div class="card-body text-right">
                <a href="{{ route('journal.create') }}" class="btn btn-primary">Создать</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
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
                        <th data-field="name" data-width="25" data-width-unit="%">Название</th>
                        <th data-field="slug" data-width="25" data-width-unit="%">Слаг</th>
                        <th data-field="description" data-width="45" data-width-unit="%">Описание</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Параметры запроса
        function dataQueryParams(params) {
            //params.code = $('#code').val();
            return params;
        }

        // Ajax запрос
        function ajaxRequest(params) {
            var url = '{{ route('journal.response') }}'
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            })
        }
    </script>

@endsection
