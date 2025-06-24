@extends('layouts.staff.app')

@section('title', 'Role')

@section('content')

    <x-staff.page title="Role">

        @can('create_role')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.role.create')" title="Add new role" icon="add" />
            </x-slot>
        @endcan

        <x-staff.table :items="['Sl No', 'Name', 'Description', 'Permissions', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.role.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'permissions', name: 'permissions'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
