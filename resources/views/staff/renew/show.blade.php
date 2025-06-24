@extends('layouts.staff.app')

@section('title', 'Renew Details')

@section('content')

    <x-staff.page title="Renew Details">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.renew.index')" title="Back to renew" icon="back" class="btn-danger me-2" />
        </x-slot>

        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th width="14%">Customer</th>
                    <td>
                        <p class="mb-1"><strong>Name:</strong> {{ $renew->user?->full_name }}</p>
                        <p class="mb-1"><strong>Email:</strong> {{ $renew->user?->email }}</p>
                        <p class="mb-1"><strong>Phone:</strong> {{ $renew->user?->phone }}</p>
                    </td>
                </tr>
                <tr>
                    <th>Membership</th>
                    <td>
                        <p class="mb-1"><strong>Name:</strong> {{ $renew->membership->name }}</p>
                        <p class="mb-1"><strong>Type:</strong> {{ $renew->membership_type }}</p>
                    </td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td>{{ ucfirst($renew->type) }}</td>
                </tr>
                <tr>
                    <th>Note</th>
                    <td>{{ $renew->note }}</td>
                </tr>
            </tbody>
        </table>
    </x-staff.page>

@endsection
