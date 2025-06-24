@extends('layouts.frontend.app')

@section('meta_keywords', $event->keywords)
@section('meta_description', $event->short_description)

@section('title', $event->title)

@section('content')
    <x-frontend.checkout
        title="Booking"
        :route="route('event.checkout')"
        from="event"
        :product="[
            'name'  => $event->title,
            'price' => $event->price,
            'slug'  => $event->slug,
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

