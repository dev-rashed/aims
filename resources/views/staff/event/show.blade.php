@extends('layouts.staff.app')

@section('title', 'Event Details')

@section('content')

    <x-staff.page title="event Details">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.event.index')" title="Back to event" icon="back" class="btn-danger me-2" />
            @isset($event)
                @can('edit_event')
                    <x-staff.page-button :href="route('staff.event.edit', $event->id)" title="Edit event" icon="edit" />
                @endcan
            @endisset
        </x-slot>

        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th width="10%">Contributor</th>
                    <td>{{ $event->counsellor?->full_name }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $event->title }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ convertAmount($event->price) }}</td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>{{ $event->location }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $event->date }}</td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td>{{ $event->time }}</td>
                </tr>
                <tr>
                    <th>Tags</th>
                    <td>{{ $event->tags }}</td>
                </tr>
                <tr>
                    <th>Short Description</th>
                    <td>{{ $event->short_description }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <img src="{{ uploadedFile($event->image) }}" class="img-fluid" alt="{{ $event->title }}" width="200px" />
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{!! $event->description !!}</td>
                </tr>
            </tbody>
        </table>

    </x-staff.page>

@endsection
