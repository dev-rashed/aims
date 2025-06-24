@extends('layouts.staff.app')

@section('title', 'Upgrade Member')

@section('content')
    <x-staff.page title="Upgrade Member">

        @can('create_membership')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.renew.create')" title="Update membership" icon="add" id="addBtn" />
            </x-slot>
        @endcan

        <x-staff.table :items="['SN','Membership Plan','Customer Name','Type','Status','Action']" />
    </x-staff.page>
@endsection

@push('js')

    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.renew.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'membership.name', name: 'membership.name', defaultContent: '', render: (data,type,row) => {
                    return `${data} (${row.membership_type})`
                }},
                {data: 'user.full_name', name: 'user.first_name', defaultContent: 'Deleted', orderable: false},
                {data: 'type', name: 'type', render: function(data) {
                    return data.charAt(0).toUpperCase() + data.slice(1)
                }},
                {data: 'status', name: 'status', render: function(data) {
                    return data ? 'Approved':'Pending';
                }},
                {data: 'action', searchable: false, orderable: false}
            ]
        });

        $(function () {
            $(document).on('change', 'select#user', function (e) {
                let user = users.find((user) => user.id == e.target.value);

                let plans = '';
                $.each(membershipPlans, function (indexInArray, membershipPlan) {
                    plans += `<option value="${membershipPlan.id}" ${membershipPlan.id == user.therapist.membership_id ? 'selected':''}>${membershipPlan.name}</option>`
                });
                $('select#membership_plan').html(plans)

                let types = '';
                ['monthly','yearly'].forEach(type => {
                    types += `<option value="${type}" ${type == user.therapist.membership_type ? 'selected':''}>${type}</option>`
                });
                $('select#membership_type').html(types)
            })
        });
    </script>
@endpush
