@extends('layouts.staff.app')

@section('title', 'Profession')

@section('content')

    <x-staff.page title="Profession" column="col-xxl-8 mx-auto">

        @can('create_profession')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.profession.create')" title="Add new profession" icon="add" id="addBtn" />
            </x-slot>
        @endcan

        <x-staff.table :items="['Sl No', 'Name', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.profession.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'name', name: 'name'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
