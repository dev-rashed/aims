
@extends('layouts.staff.app')

@section('title', isset($certificate) ? 'Update certificate':'Add New certificate')

@section('content')

    <x-staff.page :title="isset($certificate) ? 'Update certificate':'Add New certificate'">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.certificate.index')" title="Back to certificate" icon="back" class="btn-danger me-2" />
        </x-slot>

        <form class="mt-2" id="fileForm" action="{{isset($certificate) ? route('staff.certificate.update', $certificate->id) : route('staff.certificate.store')}}" method="POST" class="row g-3" data-redirect="{{ route('staff.certificate.index') }}">
            @csrf
            @isset($certificate)
                @method('PUT')
            @endisset

            <x-staff.form-group label="member" for="therapist" :isInput="false">
                <select name="therapist" id="therapist" class="form-control single-select">
                    <option value="">Select therapist</option>
                    @foreach ($data['therapists'] as $therapist)
                        <option value="{{ $therapist->id }}" @isset($certificate) @selected($certificate->therapist_id == $therapist->id) @endisset>{{ $therapist->user?->full_name }}</option>
                    @endforeach
                </select>
            </x-staff.form-group>

            <x-staff.form-group label="certificate" :isInput="false" :required="!isset($certificate)">
                <input type="file" name="image" id="image" class="form-control" data-show-image="show_certificate_image" />
                <div class="mt-3">
                    @isset ($certificate)
                        <a href="{{ uploadedFile($certificate->image) }}">Download</a>
                    @else
                        <img src="" class="img-fluid" width="150px" id="show_certificate_image" />
                    @endisset
                </div>
            </x-staff.form-group>

            <x-staff.form-group label="badge" :isInput="false" :required="!isset($certificate)">
                <input type="file" name="logo" id="logo" class="form-control" data-show-image="show_certificate_logo" />
                <div class="mt-3">
                    @isset ($certificate)
                        <a href="{{ uploadedFile($certificate->logo) }}">Download</a>
                    @else
                        <img src="" class="img-fluid" width="150px" id="show_certificate_logo" />
                    @endisset
                </div>
            </x-staff.form-group>


            <x-staff.submit-button :text="isset($certificate) ? 'Update':'Submit'" />

        </form>

    </x-staff.page>

@endsection
