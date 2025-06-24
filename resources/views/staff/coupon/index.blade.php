@extends('layouts.staff.app')

@section('title', 'Coupon')

@section('content')

    <x-staff.page title="coupon">

        @can('create_coupon')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.coupon.create')" title="Add new coupon" icon="add" id="addBtn" />
            </x-slot>
        @endcan

        <x-staff.table :items="['Sl No', 'Code', 'Discount Type', 'Discount', 'Expire Date', 'Status', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.coupon.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'code', name: 'code'},
                {data: 'discount_type', name: 'discount_type'},
                {data: 'discount', name: 'discount', render: function(data, type, row, meta) {
                    return row.discount_type == 'Fixed' ? convertAmount(data) : data+'%';
                }},
                {data: 'expire_date', name: 'expire_date'},
                {data: 'status', name: 'status', render: function(data) {
                    return data ? 'Active': 'Disabled';
                }},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
