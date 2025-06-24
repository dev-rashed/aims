@extends('layouts.staff.app')

@section('title', 'Payment')

@section('content')
    <x-staff.page title="Payment">
        <x-staff.table :items="['SN', 'Customer Name', 'Subtotal', 'Discount', 'Total', 'For']" />
    </x-staff.page>
@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.payment.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'user.full_name', name: 'user.first_name', defaultContent: ''},
                {data: 'subtotal', name: 'subtotal', render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'discount', name: 'discount', render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'total', name: 'total', render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'for', name: 'for'},
            ]
        });

    </script>
@endpush
