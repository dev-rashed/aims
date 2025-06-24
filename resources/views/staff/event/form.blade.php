@extends('layouts.staff.app')

@section('title', isset($event) ? 'Update event':'Add New event')

@push('css')
    <link href="{{ asset('build/assets/staff') }}/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
@endpush

@section('content')

    <x-staff.page :title="isset($event) ? 'Update event':'Add New event'">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.event.index')" title="Back to event" icon="back" class="btn-danger me-2" />
            @isset($event)
                @can('show_event')
                    <x-staff.page-button :href="route('staff.event.show', $event->id)" title="event Details" icon="show" />
                @endcan
            @endisset
        </x-slot>

        <form class="mt-2" id="fileForm" action="{{isset($event) ? route('staff.event.update', $event->id) : route('staff.event.store')}}" method="POST" class="row g-3" data-redirect="{{ route('staff.event.index') }}">
            @csrf
            @isset($event)
                @method('PUT')
            @endisset

            <div class="row">
                <x-staff.form-group label="contributor" :isInput="false" :required="false" column="col-md-6">
                    <select name="counsellor" id="counsellor" class="form-control single-select">
                        <option value="">Select contributor</option>
                        @foreach ($data['counsellors'] as $counsellor)
                            <option value="{{ $counsellor->id }}" @isset($event) @selected($event->counsellor_id == $counsellor->id) @endisset>{{ $counsellor->full_name }}</option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <x-staff.form-group
                    label="title"
                    placeholder="Enter event title"
                    :value="$event->title ?? ''"
                    column="col-md-6"
                />
                
                <x-staff.form-group
                    label="price"
                    type="number"
                    placeholder="Enter event price"
                    :value="$event->price ?? ''"
                    column="col-md-6"
                    step="0.5"
                />

                <x-staff.form-group
                    label="location"
                    placeholder="Enter event location"
                    :value="$event->location ?? ''"
                    column="col-md-6"
                />

                <x-staff.form-group
                    label="date"
                    type="date"
                    placeholder="Enter event date"
                    :value="$event->date ?? ''"
                    column="col-md-6"
                />

                <x-staff.form-group
                    label="time"
                    type="time"
                    placeholder="Enter event time"
                    :value="isset($event) ? date('H:i', strtotime($event->time)) : ''"
                    column="col-md-6"
                />
            </div>

            <x-staff.form-group label="short_description" :isInput="false">
                <textarea name="short_description" id="short_description" cols="5" class="form-control" placeholder="Event short description">{{ $event->short_description ?? '' }}</textarea>
            </x-staff.form-group>


            <x-staff.form-group label="description" :isInput="false">
                <textarea name="description" id="description" cols="5" class="form-control text-editor">{{ $event->description ?? '' }}</textarea>
            </x-staff.form-group>

            <x-staff.form-group
                label="tags"
                placeholder="Enter event tags"
                :value="$event->tags ?? ''"
                data-role="tagsinput"
            />

            <x-staff.form-group label="image" :isInput="false">
                <input type="file" name="image" id="image" class="form-control" data-show-image="show_event_image" />
            </x-staff.form-group>

            <div class="">
                <img src="{{ isset($event) ? uploadedFile($event->image) : '' }}" id="show_event_image" class="img-fluid" />
            </div>


            <x-staff.submit-button :text="isset($event) ? 'Update':'Submit'" />

        </form>

    </x-staff.page>

@endsection

@push('js')
    <script src="{{ asset('build/assets/staff') }}/plugins/input-tags/js/tagsinput.js"></script>
@endpush
