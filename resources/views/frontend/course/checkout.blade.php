@extends('layouts.frontend.app')

@section('meta_keywords', $course->keywords)
@section('meta_description', $course->short_description)

@section('title', $course->title)

@section('content')
    <x-frontend.checkout
        title="Enroll"
        :route="route('course.checkout')"
        from="course"
        :product="[
            'name'  => $course->title,
            'price' => $course->price,
            'slug'  => $course->slug,
        ]"
    />
@endsection

@push('js')
    @if (config('services.stripe.enable'))
        <script src="https://js.stripe.com/v3/"></script>
    @endif

    <script>
        function cities() {
            var options = {
                types: ['(postal_code)']
            };
            var location = document.getElementById('location');
            var autoComplete = new google.maps.places.Autocomplete(location)
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.map_api_key') }}&libraries=places&callback=cities" type="text/javascript"></script>
@endpush
