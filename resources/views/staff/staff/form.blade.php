@extends('layouts.staff.app')

@section('title', isset($staff) ? 'Update staff':'Add New staff')

@section('content')
    <x-staff.page :title="isset($staff) ? 'Update staff':'Add New staff'">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.staff.index')" title="Back to staff" icon="back" class="btn-danger me-2" />
            @isset($staff)
                @can('show_staff')
                    <x-staff.page-button :href="route('staff.staff.show', $staff->id)" title="staff Details" icon="show" />
                @endcan
            @endisset
        </x-slot>

        <form class="mt-2" id="fileForm" action="{{isset($staff) ? route('staff.staff.update', $staff->id) : route('staff.staff.store')}}" method="POST" class="row g-3" data-redirect="{{ route('staff.staff.index') }}">
            @csrf
            @isset($staff)
                @method('PUT')
            @endisset

            <div class="row">
                <x-staff.form-group label="role" :isInput="false" column="col-md-6">
                    <select name="role" id="role" class="form-control single-select">
                        <option value="">Select role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @isset($staff) @selected($staff->role_id == $role->id) @endisset>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <x-staff.form-group
                    label="name"
                    placeholder="Enter staff name"
                    :value="$staff->name ?? ''"
                    column="col-md-6"
                />
                <x-staff.form-group
                    label="email"
                    type="email"
                    placeholder="Enter staff email"
                    :value="$staff->email ?? ''"
                    column="col-md-6"
                />
                <x-staff.form-group
                    label="phone"
                    placeholder="Enter staff phone"
                    :value="$staff->phone ?? ''"
                    column="col-md-6"
                    :required="false"
                />

                @if (!isset($staff))
                    <x-staff.form-group
                        label="password"
                        type="password"
                        placeholder="Enter staff password"
                        column="col-md-6"
                    />
                    <x-staff.form-group
                        label="confirm_password"
                        type="password"
                        for="password_confirmation"
                        placeholder="Enter confirm password"
                        column="col-md-6"
                    />
                @endif

            </div>

            <x-staff.form-group label="address" placeholder="Enter staff address" :value="$staff->address ?? ''" :required="false" />
            <x-staff.form-group label="image" type="file" accept="image/*" data-show-image="show_staff_image" :required="false" />

            <div class="">
                <img src="{{ isset($staff) ? uploadedFile($staff->image) : '' }}" id="show_staff_image" class="img-fluid" />
            </div>

            <x-staff.submit-button :text="isset($staff) ? 'Update':'Submit'" />
        </form>
    </x-staff.page>
@endsection

@push('js')
    <script src="{{ asset('build/assets/staff/plugins/input-tags/js/tagsinput.js') }}"></script>
@endpush
