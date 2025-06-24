@extends('layouts.staff.app')

@section('title', 'Update Password')

@section('content')
    <x-staff.page title="Update Password" column="col-md-8 mx-md-auto">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.profile.index')" title="Back to Profile" icon="back" class="btn-danger me-2" />
        </x-slot>

        <form id="submit" action="{{ route('staff.profile.password.update') }}" method="post" data-redirect="{{ route('staff.profile.password.index') }}">
            @csrf
            @method('PUT')

            <x-staff.form-group 
                label="current_password"
                type="password"
                placeholder="Enter current password"
            />
            <x-staff.form-group 
                label="password"
                type="password"
                placeholder="Enter password"
            />
            <x-staff.form-group 
                label="confirm_password"
                type="password"
                for="password_confirmation"
                placeholder="Enter confirm password"
            />

            <x-staff.submit-button text="Update" />

        </form>

    </x-staff.page>
@endsection

@push('js')
@include('staff.neurologist.therapist.form-script')
@endpush
