@extends('layouts.staff.app')

@section('title', 'Enroll Details')

@section('content')

    <x-staff.page title="Enroll Details">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.enroll.index')" title="Back to enroll" icon="back" class="btn-danger me-2" />
        </x-slot>

        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Enroll Details</h6>
                            </div>
                            <div class="card-body">
                                <x-staff.show-table>
                                    <tr>
                                        <th width="15%">Invoice</th>
                                        <td>{{ $enroll->invoice }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $enroll->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>{{ convertAmount($enroll->payment?->subtotal) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td>{{ convertAmount($enroll->payment?->discount) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>{{ convertAmount($enroll->payment?->total) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Method</th>
                                        <td>
                                            <span class="badge bg-success">{{ $enroll->payment?->method }}</span>
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
                                        <td>{{ $enroll->user?->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $enroll->user?->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $enroll->user?->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td>{{ $enroll->user?->location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Avatar</th>
                                        <td>
                                            <img src="{{ uploadedFile($enroll->user?->avatar) }}" class="img-fluid" alt="{{ $enroll->user?->full_name }}" srcset="{{ uploadedFile($enroll->user?->avatar) }}" />
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
                                <th width="10%">Counsellor</th>
                                <td>{{ $enroll->course?->counsellor?->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Language</th>
                                <td>{{ $enroll->course?->language?->name }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $enroll->course?->title }}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{ $enroll->course?->short_description }}</td>
                            </tr>
                            <tr>
                                <th>Duration</th>
                                <td>{{ $enroll->course?->duration }}</td>
                            </tr>
                            <tr>
                                <th>Total Class</th>
                                <td>{{ $enroll->course?->total_class }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ convertAmount($enroll->course?->price) }}</td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>{{ $enroll->course?->type }}</td>
                            </tr>
                            <tr>
                                <th>Tags</th>
                                <td>{{ $enroll->course?->tags }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img src="{{ uploadedFile($enroll->course?->image) }}" class="img-fluid" alt="{{ $enroll->course?->title }}" />
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! $enroll->course?->description !!}</td>
                            </tr>
                        </x-staff.show-table>
                    </div>
                </div>
            </div>
        </div>

    </x-staff.page>
@endsection
