@extends('layouts.staff.app')

@section('title', 'Session')

@section('content')

    <x-staff.page title="Session" column="col-xxl-8 mx-auto">

        @can('create_session')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.session.create')" title="Add new session" icon="add" id="addBtn" />
            </x-slot>
        @endcan


        <x-staff.table :items="['Sl No', 'Name', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.session.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'name', name: 'name'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
