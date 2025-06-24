@extends('layouts.staff.app')

@section('title', isset($student) ? 'Update student' : 'Add New student')

@section('content')

    <x-staff.page :title="isset($student) ? 'Update student' : 'Add New student'">

        <x-slot name="header">
            <x-staff.page-button :href="route('staff.student.index')" title="Back to student" icon="back" class="btn-danger me-2" />
        </x-slot>

        <form class="mt-2" id="fileForm"
            action="{{ isset($student) ? route('staff.student.update', $student->id) : route('staff.student.store') }}"
            method="POST" class="row g-3"
            data-redirect="{{ isset($student) ? route('staff.student.edit', $student->id) : route('staff.student.index') }}"
        >
            @csrf
            @isset($student)
                @method('PUT')
            @endisset

            <div class="row">

                <x-staff.form-group label="first_name" placeholder="Enter student first name" :value="$student->first_name ?? ''" column="col-md-6" />

                <x-staff.form-group label="last_name" placeholder="Enter student last name" :value="$student->last_name ?? ''" column="col-md-6" />

                <x-staff.form-group label="email" placeholder="Enter student email" :value="$student->email ?? ''" column="col-md-6" />

                <x-staff.form-group label="phone" placeholder="Enter student phone" :value="$student->phone ?? ''" column="col-md-6" />

                @isset($student)
                @else
                    <x-staff.form-group label="password" type="password" placeholder="Enter password" column="col-md-6" />

                    <x-staff.form-group label="confirm password" for="password_confirmation" type="password" placeholder="Enter confirm password" column="col-md-6" />
                @endisset


                <x-staff.form-group label="location" placeholder="Enter student location" :value="$student->location ?? ''"
                    column="col-md-6" />

                <x-staff.form-group label="avatar" type="file" column="col-md-6" accept="image/*" :required="false" />
            </div>

            <x-staff.submit-button :text="isset($student) ? 'Update' : 'Submit'" />
        </form>

    </x-staff.page>
@endsection

@push('js')
    <script>
        function cities() {

            var options = {
                types: ['(postal_code)']
            };
            console.log(google.maps);
            var location = document.getElementById('location');
            var autoComplete = new google.maps.places.Autocomplete(location)
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.map_api_key') }}&libraries=places&callback=cities" type="text/javascript"></script>
@endpush
