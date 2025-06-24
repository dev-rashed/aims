@extends('layouts.staff.app')

@section('title', 'Service')

@section('content')

    <x-staff.page title="service">

        @can('create_service')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.service.create')" title="Add new service" icon="add" id="addBtn" />
            </x-slot>
        @endcan


        <x-staff.table :items="['Sl No', 'Image', 'Title', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.service.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'image', name: 'image', render: function(data) {
                    return '<img src="'+showUploadedFile(data)+'" width="70px" height="70px" />';
                }},
                {data: 'title', name: 'title'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
