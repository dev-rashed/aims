@extends('layouts.staff.app')

@section('title', 'Testimonial')

@section('content')

    <x-staff.page title="Testimonial">

        @can('create_review')
            <x-slot name="header">
                <x-staff.page-button :href="route('staff.review.create')" title="Add new testimonial" icon="add" id="addBtn" />
            </x-slot>
        @endcan


        <x-staff.table :items="['Sl No', 'Image', 'Name', 'Rating', 'Action']" />

    </x-staff.page>

@endsection

@push('js')
    <script>
        var table = $('#table').DataTable({
            ajax: '{!! route('staff.review.index') !!}',
            columns: [
                {data: 'DT_RowIndex', name: 'id', searchable: false},
                {data: 'image', name: 'image', render: function(data) {
                    return '<img src="'+showUploadedFile(data)+'" width="70px" height="70px" />';
                }},
                {data: 'name', name: 'name'},
                {data: 'rating', name: 'rating'},
                {data: 'action', searchable: false, orderable: false}
            ]
        });
    </script>
@endpush
