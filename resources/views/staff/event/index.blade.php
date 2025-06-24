@extends('layouts.staff.app')

@section('title', 'Event')

@section('content')

    <x-staff.page title="Event">

        @can('create_event')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.event.create')" title="Add new event" icon="add" />
            </x-slot>
        @endcan

        <x-staff.table :items="['Sl No', 'Image', 'Contributor', 'Title', 'Price', 'Date', 'Time', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.event.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'image', name: 'image', render: function(data) {
                    return '<img src="'+showUploadedFile(data)+'" width="50px" height="50px" />';
                }, searchable: false, orderable: false},
                {data: 'counsellor.full_name', name: 'counsellor.first_name', defaultContent: '', searchable: false, orderable: false},
                {data: 'title', name: 'title'},
                {data: 'price', name: 'price', render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'date', name: 'date'},
                {data: 'time', name: 'time'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
