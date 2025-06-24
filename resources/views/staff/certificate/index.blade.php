@extends('layouts.staff.app')

@section('title', 'Certificate')

@section('content')

    <x-staff.page title="certificate">

        @can('create_certificate')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.certificate.create')" title="Add new certificate" icon="add" />
            </x-slot>
        @endcan


        <x-staff.table :items="['Sl No', 'Practitioner', 'Certificate', 'Badge', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.certificate.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'therapist.user.full_name', name: 'therapist.user.first_name'},
                {data: 'image', name: 'image', render: function(data) {
                    return '<a href="'+showUploadedFile(data)+'" download>Download</a>';
                }, searchable: false, orderable: false},
                {data: 'logo', name: 'logo', render: function(data) {
                    return '<a href="'+showUploadedFile(data)+'" download>Download</a>';
                }, searchable: false, orderable: false},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
