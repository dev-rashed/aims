<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="@yield('meta_keywords', 'aims, aims website, aims, education, education website, online study, online, education platform')">
    <meta name="description" content="@yield('meta_description', 'Home page of '.url()->current())">
    <link rel="canonical" href="{{url()->current()}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--favicon-->
    <link rel="icon" href="{{ uploadedFile(setting('favicon')) }}" type="image/png" />

    <title>@yield('title', 'Online education') &#8211; {{ config('app.name') }}</title>

    @vite(['resources/js/app.js'])

    @stack('css')

</head>
<body>

    @if (!request()->is('admin*'))
        <!-- Navbar Start -->
        @include('layouts.frontend.partials.navbar')
        <!-- Navbar End -->
    @endif


    <main class="main-content">

        @yield('content')

        <x-requred-component />

        <!-- Footer Section Start -->
        @if (!request()->is('admin*'))
            @include('layouts.frontend.partials.footer')
        @endif
        <!-- Footer Section End -->

    </main>

    <div class="back-top">
        <img src="{{ asset('build/assets/frontend/images/icons/arrow-up.svg') }}" alt="">
    </div>

    <script  src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
    <script src="{{ asset('build/assets/plugins/nice-select/dist/js/nice-select2.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/OwlCarousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('build/assets/staff') }}/plugins/notifications/js/lobibox.min.js"></script>
    <script src="{{ asset('build/assets/staff') }}/plugins/select2/js/select2.min.js"></script>

    @stack('js')

    @if (request()->is('directory') || request()->is('membership/*') || request()->is('/'))
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
    @endif
</body>
</html>
