@extends('layouts.staff.app')

@section('title', 'Online Platform')

@section('content')

    <x-staff.page title="Online Platform" column="col-xxl-8 mx-auto">

        @can('create_online_platform')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.online-platform.create')" title="Add new online platform" icon="add" id="addBtn" />
            </x-slot>
        @endcan


        <x-staff.table :items="['Sl No', 'Image', 'Name', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.online-platform.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'image', name: 'image', render: function(data) {
                    return '<img src="'+showUploadedFile(data)+'" width="20px" />';
                }},
                {data: 'name', name: 'name'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
