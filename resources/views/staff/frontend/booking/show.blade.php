@extends('layouts.staff.app')

@section('title', 'Booking Details')

@section('content')

    <x-staff.page title="Booking Details">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.booking.index')" title="Back to booking" icon="back" class="btn-danger me-2" />
        </x-slot>

        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Booking Details</h6>
                            </div>
                            <div class="card-body">
                                <x-staff.show-table>
                                    <tr>
                                        <th width="20%">Invoice</th>
                                        <td>{{ $booking->invoice }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $booking->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>{{ convertAmount($booking->payment?->subtotal) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td>{{ convertAmount($booking->payment?->discount) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>{{ convertAmount($booking->payment?->total) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Method</th>
                                        <td>
                                            <span class="badge bg-success">{{ $booking->payment->method }}</span>
                                        </td>
                                    </tr>
                                </x-staff.show-table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Customer Details</h6>
                            </div>
                            <div class="card-body">
                                <x-staff.show-table>
                                    <tr>
                                        <th width="10%">Name</th>
                                        <td>{{ $booking->user?->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $booking->user?->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $booking->user?->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td>{{ $booking->user?->location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Avatar</th>
                                        <td>
                                            <img src="{{ uploadedFile($booking->user?->avatar) }}" class="img-fluid" alt="{{ $booking->user?->full_name }}" srcset="{{ uploadedFile($booking->user->avatar) }}" />
                                        </td>
                                    </tr>
                                </x-staff.show-table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Course Details</h6>
                    </div>
                    <div class="card-body">
                        <x-staff.show-table>
                            <tr>
                                <th width="15%">Counsellor</th>
                                <td>{{ $booking->event?->counsellor?->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $booking->event?->title }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ convertAmount($booking->event?->price) }}</td>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <td>{{ $booking->event?->location }}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>{{ $booking->event?->date }}</td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td>{{ $booking->event?->time }}</td>
                            </tr>
                            <tr>
                                <th>Tags</th>
                                <td>{{ $booking->event?->tags }}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{ $booking->event?->short_description }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img src="{{ uploadedFile($booking->event?->image) }}" class="img-fluid" alt="{{ $booking->event?->title }}" width="100px" />
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! $booking->event?->description !!}</td>
                            </tr>
                        </x-staff.show-table>
                    </div>
                </div>
            </div>
        </div>


    </x-staff.page>

@endsection
