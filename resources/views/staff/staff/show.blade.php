@extends('layouts.staff.app')

@section('title', 'Staff Details')

@section('content')

    <x-staff.page title="Staff Details">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.staff.index')" title="Back to staff" icon="back" class="btn-danger me-2" />
            @isset($staff)
                @can('edit_staff')
                    <x-staff.page-button :href="route('staff.staff.edit', $staff->id)" title="Edit staff" icon="edit" />
                @endcan
            @endisset
        </x-slot>


        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                    <tr>
                        <th>Role</th>
                        <td>{{ $staff->role->name }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $staff->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $staff->email }}</td>
                    </tr>
                    <tr>
                        <th>phone</th>
                        <td>{{ $staff->phone }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $staff->address }}</td>
                    </tr>
                    {{-- <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge bg-success">{{ $staff->status ? 'Active':'Disable' }}</span>
                        </td>
                    </tr> --}}
                    <tr>
                        <th>Image</th>
                        <td>
                            <img src="{{ uploadedFile($staff->image) }}" alt="{{ $staff->name }}" srcset="{{ uploadedFile($staff->image) }}" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </x-staff.page>

@endsection
