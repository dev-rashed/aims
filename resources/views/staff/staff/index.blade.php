@extends('layouts.staff.app')

@section('title', 'Staff')

@section('content')

    <x-staff.page title="Staff">

        @can('create_staff')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.staff.create')" title="Add new staff" icon="add" />
            </x-slot>
        @endcan

        <x-staff.table :items="['Sl No', 'Image', 'Role', 'Name', 'Email', 'Phone', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.staff.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'image', name: 'image', render: function(data) {
                    return '<img src="'+showUploadedFile(data)+'" width="80px" height="80px" />';
                }, searchable: false, orderable: false},
                {data: 'role.name', name: 'role.name', orderable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
