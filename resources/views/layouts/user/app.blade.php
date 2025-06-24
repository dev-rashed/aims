<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="{{ config('app.name') }}" name="author" />
        <meta content="{{ csrf_token() }}" name="csrf-token" />

        <meta name="keywords" content="@yield('meta_keywords', 'immersive, immersive website, immersive, promotinal, promotinal website, uk promotinal website, online, london promotinal')">
        <meta name="description" content="@yield('meta_description', 'Home page of '.url()->current())">
        <link rel="canonical" href="{{ url()->current() }}"/>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ uploadedFile(setting('favicon')) }}">

        <title>@yield('title') - {{ config('app.name') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        @stack('css')

        @vite(['resources/css/user.css','resources/js/user.js'])

    </head>
    <body
        class="font-inter bg-white text-black text-base font-normal"
        x-data="{ navIsOpen: false, rightbarOpen: false }"
        {{-- :class="(navIsOpen || rightbarOpen) && 'overflow-hidden'" --}}
    >

        <div>

            @include('layouts.user.partials.header')

            @include('layouts.user.partials.aside')

            @include('layouts.user.partials.right-bar')

            <main class="xl:mx-[302px] p-6">
                @yield('content')
            </main>

        </div>

        <script src="{{ asset('build/assets/user/plugins/jquery/jquery.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
        @stack('script')
    </body>
</html>
