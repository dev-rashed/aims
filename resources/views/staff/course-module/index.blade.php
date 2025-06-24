@extends('layouts.staff.app')

@section('title', 'Course module')

@section('content')

    <x-staff.page title="Course module">

        @can('create_course')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.course-module.create')" title="Add new module" icon="add" />
            </x-slot>
        @endcan
        
        <x-staff.table :items="['Sl No', 'Course Title', 'Module Title', 'Total Lectures', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.course-module.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'course.title', name: 'course.title', defaultContent: ''},
                {data: 'title', name: 'title'},
                {data: 'lectures', name: 'lectures'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
