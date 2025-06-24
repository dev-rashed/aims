@extends('layouts.staff.app')

@section('title', 'Course')

@section('content')

    <x-staff.page title="Course">

        @can('create_course')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.course.create')" title="Add new course" icon="add" />
            </x-slot>
        @endcan

        <x-staff.table :items="['Sl No', 'Image', 'Language', 'Type', 'Duration', 'Total Class', 'Price', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.course.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'image', name: 'image', render: function(data) {
                    return '<img src="'+showUploadedFile(data)+'" width="70px" height="70px" />';
                }, searchable: false, orderable: false},
                // {data: 'counsellor.full_name', name: 'counsellor.first_name', defaultContent: ''},
                {data: 'language.name', name: 'language.name', defaultContent: ''},
                {data: 'type', name: 'type'},
                {data: 'duration', name: 'duration'},
                {data: 'total_class', name: 'total_class'},
                {data: 'price', name: 'price', render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
