@extends('layouts.staff.app')

@section('title', 'Subscriber')

@section('content')
    <x-staff.page title="Subscriber">
        <x-staff.table :items="['SN', 'Name', 'Email','Action']" />
    </x-staff.page>
@endsection

@push('js')

    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.subscriber.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });

    </script>
@endpush
