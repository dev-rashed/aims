@extends('layouts.staff.app')

@section('title', isset($course) ? 'Update course':'Add New course')

@push('css')
    <link href="{{ asset('build/assets/staff') }}/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
@endpush

@section('content')

    <x-staff.page :title="isset($course) ? 'Update course':'Add New course'">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.course.index')" title="Back to course" icon="back" class="btn-danger me-2" />
            @isset($course)
                @can('show_course')
                    <x-staff.page-button :href="route('staff.course.show', $course->id)" title="course Details" icon="show" />
                @endcan
            @endisset
        </x-slot>

        <form class="mt-2" id="fileForm" action="{{isset($course) ? route('staff.course.update', $course->id) : route('staff.course.store')}}" method="POST" class="row g-3" data-redirect="{{ route('staff.course.index') }}">
            @csrf
            @isset($course)
                @method('PUT')
            @endisset

            <div class="row">
                <x-staff.form-group label="contributor" :isInput="false" column="col-md-4" :required="false">
                    <select name="counsellor" id="counsellor" class="form-control single-select">
                        <option value="">Select counsellor</option>
                        @foreach ($data['counsellors'] as $counsellor)
                            <option value="{{ $counsellor->id }}" @isset($course) @selected($course->counsellor_id == $counsellor->id) @endisset>{{ $counsellor->full_name }}</option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <x-staff.form-group label="language" :isInput="false" column="col-md-4" :required="false">
                    <select name="language" id="language" class="form-control single-select">
                        <option value="">Select language</option>
                        @foreach ($data['languages'] as $language)
                            <option value="{{ $language->id }}" @isset($course) @selected($course->language_id == $language->id) @endisset>{{ $language->name }}</option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <x-staff.form-group label="type" :isInput="false" column="col-md-4">
                    <select name="type" id="type" class="form-control single-select">
                        <option value="">Select course type</option>
                        @foreach ($data['types'] as $type)
                            <option value="{{ $type }}" @isset($course) @selected($course->type == $type) @endisset>{{ $type }}</option>
                        @endforeach
                    </select>
                </x-staff.form-group>
            </div>

            <x-staff.form-group
                label="title"
                placeholder="Enter course title"
                :value="$course->title ?? ''"
            />

            <x-staff.form-group label="short_description" :isInput="false">
                <textarea name="short_description" id="short_description" cols="5" class="form-control" placeholder="Course short description">{{ $course->short_description ?? '' }}</textarea>
            </x-staff.form-group>


            <x-staff.form-group label="description" :isInput="false">
                <textarea name="description" id="description" cols="5" class="form-control text-editor">{{ $course->description ?? '' }}</textarea>
            </x-staff.form-group>

            <div class="row">
                <x-staff.form-group
                    label="duration"
                    placeholder="Example: 4 month"
                    :value="$course->duration ?? ''"
                    column="col-md-4"
                />

                <x-staff.form-group
                    label="total_class"
                    type="number"
                    placeholder="Enter course total class"
                    :value="$course->total_class ?? ''"
                    column="col-md-4"
                />

                <x-staff.form-group
                    label="price"
                    type="number"
                    placeholder="Enter course price"
                    :value="$course->price ?? ''"
                    column="col-md-4"
                    step="0.5"
                />
            </div>

            <x-staff.form-group
                label="tags"
                placeholder="Enter course tags"
                :value="$course->tags ?? ''"
                data-role="tagsinput"
            />

            <x-staff.form-group label="image" :isInput="false">
                <input type="file" name="image" id="image" class="form-control" data-show-image="show_course_image" />
            </x-staff.form-group>

            <div class="">
                <img src="{{ isset($course) ? uploadedFile($course->image) : '' }}" id="show_course_image" class="img-fluid" />
            </div>


            <x-staff.submit-button :text="isset($course) ? 'Update':'Submit'" />

        </form>

    </x-staff.page>

@endsection

@push('js')
    <script src="{{ asset('build/assets/staff') }}/plugins/input-tags/js/tagsinput.js"></script>
@endpush
