@extends('layouts.staff.app')

@section('title', 'Career')

@section('content')
    <x-staff.page title="Career">
        <x-staff.table :items="['Sl No','Name','Email','Phone','Action']" />
    </x-staff.page>
@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.career.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
