@extends('layouts.staff.app')

@section('title', 'Enroll')

@section('content')

    <x-staff.page title="Enroll">
        <x-staff.table :items="['Sl No', 'Course','Invoice','Customer','Subtotal','Discount','Total','Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.enroll.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'course.title', name: 'course.title', defaultContent: ''},
                {data: 'invoice', name: 'invoice'},
                {data: 'user.full_name', name: 'user.first_name', defaultContent: ''},
                {data: 'payment.subtotal', name: 'payment.subtotal', render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'payment.discount', name: 'payment.discount', render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'payment.total', name: 'payment.total', render: function(data) {
                    return convertAmount(data);
                }},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
