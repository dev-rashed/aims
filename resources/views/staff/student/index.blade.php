@extends('layouts.staff.app')

@section('title', 'Students')

@section('content')

    <x-staff.page title="Students">

        @can('create_therapist')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.student.create')" title="Add new student" icon="add" />
            </x-slot>
        @endcan

        <x-staff.table :items="['Sl No', 'Avatar', 'Name', 'Email', 'Phone', 'Location', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: {
                url: '{!! route('staff.student.index') !!}',
                data: function (d) {
                    d.approved = 1
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'avatar', name: 'avatar', render: function(data) {
                    return '<img src="'+showUploadedFile(data)+'" width="50px" height="50px" class="rounded-1" />';
                }, searchable: false, orderable: false},
                {data: 'full_name', name: 'first_name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'location', name: 'location'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
