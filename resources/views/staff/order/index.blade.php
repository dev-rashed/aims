@extends('layouts.staff.app')

@section('title', 'Order')

@section('content')
    <x-staff.page title="Members">
        <x-staff.table :items="['SN', 'Invoice', 'Membership Plan', 'Customer Name', 'Subtotal', 'Discount', 'Total', 'Membership Expired', 'Action']" />
    </x-staff.page>
@endsection

@push('js')

    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.order.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'invoice', name: 'invoice'},
                {data: 'membership_plan.name', name: 'membership_plan.name', defaultContent: ''},
                {data: 'user.full_name', name: 'user.first_name', defaultContent: ''},
                {data: 'payment.subtotal', name: 'payment.subtotal', defaultContent: 0, render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'payment.discount', name: 'payment.discount', defaultContent: 0, render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'payment.total', name: 'payment.total', defaultContent: 0, render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'membership_expire', searchable: false, orderable: false},
                {data: 'action', searchable: false, orderable: false}
            ]
        });

    </script>
@endpush
