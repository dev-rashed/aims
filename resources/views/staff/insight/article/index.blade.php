@extends('layouts.staff.app')

@section('title', 'Insights')

@section('content')

    <x-staff.page title="Insights">

        @can('create_article')
            <x-slot:header>
                <x-staff.page-button :href="route('staff.article.create')" title="Add new insights" icon="add" />
            </x-slot>
        @endcan


        <x-staff.table :items="['Sl No', 'Image', 'Contributor', 'Title', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.article.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'image', name: 'image', render: function(data) {
                    return '<img src="'+showUploadedFile(data)+'" width="70px" height="70px" />';
                }, searchable: false, orderable: false},
                {data: 'counsellor.full_name', name: 'counsellor.first_name', defaultContent: '', orderable: false},
                {data: 'title', name: 'title'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
