@extends('layouts.staff.app')

@section('title', 'Section Show/Hide')

@section('content')

    <x-staff.page title="Section Show/Hide" column="col-md-6 mx-auto">

        <form class="mt-2" id="fileForm" action="{{ route('staff.section.update') }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            @foreach (json_decode(setting('sections')) as $key => $section)
                <div class="form-check form-switch">
                    <input type="checkbox" name="{{ $key }}" id="{{ $key }}" class="form-check-input" @checked($section) />
                    <label class="form-check-label text-capitalize" for="{{ $key }}">{{ str_replace('_', ' ', $key) }}</label>
                </div>
            @endforeach

            <div class="mt-3">
                <x-staff.form-group label="embed_video" :isInput="false">
                    <textarea name="embed_video" id="embed_video" rows="4" class="form-control" placeholder="Enter youtube embed video">{{ setting('embed_video') }}</textarea>
                </x-staff.form-group>
            </div>

            <x-staff.submit-button text="Update" />
        </form>
    </x-staff.page>
@endsection
