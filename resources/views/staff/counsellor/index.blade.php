@extends('layouts.staff.app')

@section('title', 'Contributor')

@section('content')

    <x-staff.page title="Contributor">

        @can('create_counsellor')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.counsellor.create')" title="Add new contributor" icon="add" id="addBtn" />
            </x-slot>
        @endcan

        <x-staff.table :items="['Sl No', 'Image', 'First Name', 'Last Name', 'Designation', 'Email', 'Phone', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.counsellor.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'image', name: 'image', render: function(data) {
                    return '<img src="'+showUploadedFile(data)+'" width="70px" height="70px" />';
                }},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'designation', name: 'designation'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
