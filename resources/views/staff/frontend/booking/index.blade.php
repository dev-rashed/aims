@extends('layouts.staff.app')

@section('title', 'Booking')

@section('content')

    <x-staff.page title="booking">
        <x-staff.table :items="['Sl No', 'Event','Invoice','Customer','Subtotal','Discount','Total','Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.booking.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'event.title', name: 'event.title', defaultContent: ''},
                {data: 'invoice', name: 'invoice'},
                {data: 'user.full_name', name: 'user.first_name', defaultContent: ''},
                {data: 'payment.subtotal', name: 'payment.subtotal', render: function(data) {
                    return convertAmount(data);
                }, defaultContent: 0},
                {data: 'payment.discount', name: 'payment.discount', render: function(data) {
                    return convertAmount(data);
                }, defaultContent: 0},
                {data: 'payment.total', name: 'payment.total', render: function(data) {
                    return convertAmount(data);
                }, defaultContent: 0},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
