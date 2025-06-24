@extends('layouts.staff.app')

@section('title', 'About')

@section('content')

    <x-staff.page title="About" column="col-md-6 mx-auto">

        <form class="mt-2" id="fileForm" action="{{ route('staff.about.update') }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <div class="mt-3">
                <x-staff.form-group label="title" for="about_title" :value="setting('about_title')" />
            </div>

            <div class="mt-3">
                <x-staff.form-group label="description" for="about_description" :isInput="false">
                    <textarea name="about_description" id="about_description" cols="5" class="form-control text-editor">{{ setting('about_description') }}</textarea>
                </x-staff.form-group>
            </div>

            <x-staff.submit-button text="Update" />
        </form>
    </x-staff.page>
@endsection
