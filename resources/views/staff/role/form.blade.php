@extends('layouts.staff.app')

@section('title', isset($role) ? 'Update Role':'Add New Role')

@section('content')

    <x-staff.page :title="isset($role) ? 'Update Role':'Add New Role'">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.role.index')" title="Back to Role" icon="back" class="btn-danger me-2" />
            @isset($role)
                @can('show_role')
                    <x-staff.page-button :href="route('staff.role.show', $role->id)" title="Role Details" icon="show" />
                @endcan
            @endisset
        </x-slot>

        <form id="submit" action="{{isset($role) ? route('staff.role.update', $role->id) : route('staff.role.store')}}" method="POST" class="row g-3" data-redirect="{{ route('staff.role.index') }}">
            @csrf
            @isset($role)
                @method('PUT')
            @endisset
            <x-staff.form-group
                label="name"
                placeholder="Enter role name"
                :value="$role->name ?? ''"
            />
            <x-staff.form-group
                label="description"
                placeholder="Enter role description"
                :value="$role->description ?? ''"
                :required="false"
            />

            <div class="col-12 mt-4">
                <h5>Role Permissions</h5>
                <!-- Permission table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="text-nowrap fw-semibold">
                                    Administrator Access
                                    <i class="bx bx-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="selectAll" @isset($role) @checked(DB::table('permissions')->count() === count(json_decode($role->permissions))) @endisset />
                                        <label class="form-check-label" for="selectAll"> Select All </label>
                                    </div>
                                </td>
                            </tr>
                            @foreach ($modules as $module)
                                <tr>
                                    <td class="text-nowrap fw-semibold">{{ replaceModuleName($module->name) }}</td>
                                    <td>
                                        <div class="d-flex">
                                            @foreach ($module->permissions as $permission)
                                                <div class="form-check form-switch me-3 me-lg-5 w-25">
                                                    <input class="form-check-input permission-checkbox" type="checkbox" name="permissions[]" id="permissions_{{ $permission->slug }}" value="{{ $permission->slug }}" @isset($role) @foreach(json_decode($role->permissions) as $rolePermission) @checked($permission->slug == $rolePermission) @endforeach @endisset />
                                                    <label class="form-check-label" for="permissions_{{ $permission->slug }}">{{ replaceModuleName($permission->name) }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            <x-staff.submit-button :text="isset($role) ? 'Update':'Submit'" />
        </form>

    </x-staff.page>

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            let selectAll = document.getElementById('selectAll')
            if (selectAll) {
                selectAll.addEventListener('click', (e) => {
                    let checkboxes = document.querySelectorAll('input.permission-checkbox');
                    checkboxes.forEach(element => element.checked = e.target.checked ? true: false);
                })
            }
        });
    </script>
@endpush
