@extends('layouts.staff.app')

@section('title', 'Order Details')

@section('content')

    <x-staff.page title="Order Details">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.order.index')" title="Back to order" icon="back" class="btn-danger me-2" />
        </x-slot>

        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th width="14%">Invoice No</th>
                    <td>{{ $order->invoice }}</td>
                </tr>
                <tr>
                    <th>Membership plan</th>
                    <td>{{ $order->membershipPlan->name }}</td>
                </tr>
                <tr>
                    <th>Membership plan type</th>
                    <td>{{ $order->membership_type }}</td>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <td>{{ $order->user?->full_name }}</td>
                </tr>
                <tr>
                    <th>Subtotal</th>
                    <td>{{ convertAmount($order->subtotal) }}</td>
                </tr>
                <tr>
                    <th>Discount</th>
                    <td>{{ convertAmount($order->discount) }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{ convertAmount($order->total) }}</td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td>
                        <span class="badge bg-success">{{ $order->payment?->method }}</span>
                    </td>
                </tr>
            </tbody>
        </table>

    </x-staff.page>

@endsection
