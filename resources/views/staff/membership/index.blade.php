@extends('layouts.staff.app')

@section('title', 'Membership plan')

@section('content')

    <x-staff.page title="Membership plan">

        @can('create_membership_plan')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.membership-plan.create')" title="Add new plan" icon="add" id="addBtn" />
            </x-slot>
        @endcan

        <x-staff.table :items="['Sl No', 'Name', 'Monthly Price', 'Yearly Price', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.membership-plan.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'name', name: 'name'},
                {data: 'monthly_price', name: 'monthly_price', render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'yearly_price', name: 'yearly_price', render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
