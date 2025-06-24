@extends('layouts.user.app')

@section('title', 'Account Details')

@section('content')
    <div>
        <form id="submit" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-7">
                <!-- Photo File Input -->
                <input type="file" class="hidden" name="avatar" data-show-image="showAvatar" id="avatar" accept="avatar/*" />
                <div class="text-center">
                    <div class="mx-auto w-28 h-28 relative group">
                        <img src="{{ uploadedFile(auth()->user()?->avatar) }}" id="showAvatar" class="w-full h-full m-auto rounded-full shadow">
                        <div title="Upload your profile picture">
                            <label class="absolute w-full h-full rounded-full inset-0 bg-gray-500/40 flex items-center justify-center transition-all duration-500 cursor-pointer" for="avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" x-data="{ update_password: false, type: 'password' }">
                <x-user.form-group label="first_name" :value="auth()->user()->first_name" placeholder="First Name" column="col-span-2 md:col-span-1" />
                <x-user.form-group label="last_name" :value="auth()->user()->last_name" placeholder="Last Name" column="col-span-2 md:col-span-1" />
                <x-user.form-group label="email" type="email" :value="auth()->user()->email" placeholder="Email Address" column="col-span-2 md:col-span-1" />
                <x-user.form-group label="phone" :value="auth()->user()->phone" placeholder="Phone Number" column="col-span-2 md:col-span-1" />
                <x-user.form-group label="location" :value="auth()->user()->location" placeholder="Location" column="md:col-span-2" />

                <div class="col-span-2 flex items-center gap-x-2 cursor-pointer">
                    <input type="checkbox" id="update_password" class="w-6 h-6 checked:bg-primary" x-on:click="update_password = ! update_password" />
                    <label for="update_password">Update Password</label>
                </div>

                <div class="col-span-2 md:col-span-1 relative" x-show="update_password" x-transition:enter.duration.500ms x-transition:leave.duration.400ms>
                    <x-user.form-group label="password" ::type="type" placeholder="Enter Password" :required="false" />

                    <div class="absolute right-3 bottom-4">
                        <svg x-show="type == 'password'" x-on:click="type = 'text'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                        <svg x-show="type == 'text'" x-on:click="type = 'password'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </div>

                </div>
                {{-- <div class="col-span-2 md:col-span-1" x-show="update_password" x-transition:enter.duration.500ms x-transition:leave.duration.400ms>
                    <x-user.form-group label="confirm_password" for="password_confirmation" type="password" placeholder="Enter Confirm Password" :required="false" />
                </div> --}}

                <div class="md:col-span-2">
                    <x-user.submit-button label="Update" />
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
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
