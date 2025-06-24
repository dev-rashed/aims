<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="{{ uploadedFile(setting('favicon')) }}" type="image/png" />

    <title>@yield('title') || {{ config('app.name') }}</title>

    @include('layouts.staff.partials.style')

</head>

<body>
    <!--wrapper-->
    <div class="wrapper">

        <!--sidebar wrapper -->
        @include('layouts.staff.partials.sidebar')
        <!--end sidebar wrapper -->

        <!--start header -->
        @include('layouts.staff.partials.header')
        <!--end header -->

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')

                <x-requred-component />
            </div>
        </div>
        <!--end page wrapper -->

        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:void(0)" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <footer class="page-footer">
            <p class="mb-0">{{ setting('copyright') }}</p>
        </footer>

    </div>
    <!--end wrapper-->

    <!--start switcher-->
    {{-- @include('layouts.staff.partials.switcher') --}}
    <!--end switcher-->

    @include('layouts.staff.partials.script')
</body>

</html>
