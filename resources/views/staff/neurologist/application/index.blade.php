@extends('layouts.staff.app')

@section('title', 'New Application')

@section('content')

    <x-staff.page title="New Application">
        <x-staff.table :items="['Sl No','Avatar','Name','Email','Phone','Membership','Status','Action']" />
    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.application.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'user.avatar', name: 'user.avatar', defaultContent: '', render: function(data) {
                    return '<img src="'+showUploadedFile(data)+'" width="80px" height="80px" />';
                }, searchable: false, orderable: false},
                {data: 'user.full_name', name: 'user.first_name', defaultContent: ''},
                {data: 'user.email', name: 'user.email', defaultContent: ''},
                {data: 'user.phone', name: 'user.phone', defaultContent: ''},
                {data: 'membership_plan.name', name: 'membershipPlan.name', defaultContent: '', render: (data, type, row) => {
                    return data != null ? `${data} (${row.membership_type})` : null;
                }, searchable: false, orderable: false},
                {data: 'status', name: 'status', render: function(data) {
                    return '<span class="text-capitalize">'+data+'</span>'
                }},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
