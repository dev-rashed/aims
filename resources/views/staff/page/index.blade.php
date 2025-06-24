@extends('layouts.staff.app')

@section('title', 'Pages')

@section('content')

    <x-staff.page title="Pages">

        @can('create_page')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.page.create')" title="Add new page" icon="add" />
            </x-slot>
        @endcan

        <x-staff.table :items="['SN', 'Name', 'Title', 'Status', 'Action']" />

    </x-staff.page>

@endsection

@push('js')

    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.page.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'name', name: 'name'},
                {data: 'title', name: 'title'},
                {data: 'status', name: 'status', render: function(data) {
                    return data ? 'Active': 'Disabled';
                }},
                {data: 'action', searchable: false, orderable: false}
            ]
        });

    </script>
@endpush
