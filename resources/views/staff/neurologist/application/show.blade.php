@extends('layouts.staff.app')

@section('title', 'New application Details')

@section('content')

    <x-staff.page title="New application Details">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.application.index')" title="Back to new application" icon="back" class="btn-danger me-2" />
        </x-slot>

        @include('staff.neurologist.therapist.show-table', ['therapist' => $therapist])

    </x-staff.page>

@endsection
