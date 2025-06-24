@extends('layouts.staff.app')

@section('title', 'All Members')

@section('content')

    <x-staff.page title="All Members">

        @can('create_therapist')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.therapist.create')" title="Add new member" icon="add" />
            </x-slot>
        @endcan

        <x-staff.table :items="['Sl No','Name','Email','Phone','Membership','Expire Date','Profile','Profile Status','Action']" />
    </x-staff.page>
@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.therapist.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'user.full_name', name: 'user.first_name', defaultContent: ''},
                {data: 'user.email', name: 'user.email', defaultContent: ''},
                {data: 'user.phone', name: 'user.phone', defaultContent: ''},
                {data: 'membership_plan.name', name: 'membershipPlan.name', defaultContent: '', render: (data, type, row) => {
                    return data != null ? `${data} (${row.membership_type})` : null;
                }},
                {data: 'membership_expire', name: 'membership_expire'},
                // {data: 'video', name: 'video', render: (data) => data !== null ? 'Live profile':'Standard profile'},
                {data: 'live_profile', name: 'live_profile', render: (data, type, row) => {
                    return `<div class="d-flex">
                            <div class="me-2">Standard</div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" ${data ? 'checked':''} id="inActiveSwitch" value="${row.id}" data-type="live_profile">
                            </div>
                            <div>Live</div>
                        </div>`
                }, searchable: false, orderable: false},
                {data: 'hide_profile', name: 'hide_profile', render: (data, type, row) => {
                    return `<div class="d-flex">
                            <div class="me-2">Hide</div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" ${!data ? 'checked':''} id="inActiveSwitch" value="${row.id}" data-type="hide_profile">
                            </div>
                            <div>Show</div>
                        </div>`
                }, searchable: false, orderable: false},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
