@extends('layouts.staff.app')

@section('title', 'Member Details')

@section('content')

    <x-staff.page title="Member Details">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.therapist.index')" title="Back to member" icon="back" class="btn-danger me-2" />
            @isset($therapist)
                @can('edit_therapist')
                    <x-staff.page-button :href="route('staff.therapist.edit', $therapist->id)" title="Edit member" icon="edit" />
                @endcan
            @endisset
        </x-slot>


        @include('staff.neurologist.therapist.show-table', ['therapist' => $therapist])

    </x-staff.page>

@endsection
