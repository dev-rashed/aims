@extends('layouts.staff.app')

@section('title', 'Role Details')

@section('content')

    <x-staff.page title="Role Details">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.role.index')" title="Back to Role" icon="back" class="btn-danger me-2" />
            @isset($role)
                @can('edit_role')
                    <x-staff.page-button :href="route('staff.role.edit', $role->id)" title="Edit Role" icon="edit" />
                @endcan
            @endisset
        </x-slot>

        
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $role->name }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $role->description }}</td>
                    </tr>
                    <tr>
                        <th>Permissions</th>
                        <td>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Module</th>
                                        <th>Can Create</th>
                                        <th>Can Show</th>
                                        <th>Can Edit</th>
                                        <th>Can Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($modules as $key => $module)
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $module->name }}</td>
                                            @for ($i = 0; $i <= 3; $i++)
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" name="permissions[]" id="permissions" value="{{ $module->permissions[$i]->slug }}" @isset($role) @foreach(json_decode($role->permissions) as $permission) {{$module->permissions[$i]->slug == $permission ? 'checked' : ''}} @endforeach @endisset @disabled(true)>
                                                    </div>
                                                    {{-- <input type="checkbox" class="form-check-input" name="permissions[]" id="permissions" value="{{ $module->permissions[$i]->id }}" @isset($role) @foreach($role->permissions as $permission) {{$module->permissions[$i]->id == $permission->id ? 'checked' : ''}} @endforeach @endisset> --}}
                                                </td>
                                            @endfor
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center primary-text">Data not available!</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </x-staff.page>

@endsection
