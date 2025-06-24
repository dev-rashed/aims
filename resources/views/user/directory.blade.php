@extends('layouts.user.app')

@section('title', 'Directory')

@push('css')
    <link href="{{ asset('build/assets/staff') }}/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
@endpush

@section('content')
    <div>
        <form id="submit" action="{{ route('directory.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <x-user.form-group label="email" placeholder="Enter email" :value="$therapist->email ?? auth()->user()->email" column="col-span-2 md:col-span-1" />
                <x-user.form-group label="phone" placeholder="Enter phone" :value="$therapist->phone ?? auth()->user()->phone" column="col-span-2 md:col-span-1" />

                <x-user.form-group label="website" placeholder="Enter website" :value="$therapist->website ?? ''" :required="false" column="col-span-2 md:col-span-1" />

                <x-user.form-group label="degree" placeholder="Enter degree" :value="$therapist->degree ?? ''" column="col-span-2 md:col-span-1" />
                <x-user.form-group label="location" placeholder="Enter location" :value="auth()->user()->location ?? ''" column="col-span-2 md:col-span-1" />

                <x-user.form-group label="currency" isType="select" :required="false" column="col-span-2 md:col-span-1" class="select2">
                    @foreach ($data['currencies'] as $currency)
                        <option value="{{ $currency->id }}" @selected(isset($therapist) && $therapist->user?->currency_id == $currency->id)>
                            {{ $currency->name }}({{ $currency->symbol }})
                        </option>
                    @endforeach
                </x-user.form-group>

                <x-user.form-group label="fees" placeholder="Enter fees" type="number" step="0.1" min="0.1" :value="$therapist->fees ?? ''" column="col-span-2 md:col-span-1" />

                <x-user.form-group label="short_description" isType="textarea" cols="5" class="text-editor" column="col-span-2" question="*" :required="false">{{ $therapist->short_description ?? '' }}</x-user.form-group>

                <x-user.form-group label="key_details" placeholder="Enter key details" :value="$therapist->key_details ?? ''" column="col-span-2" />

                <x-user.form-group label="professions" for="professions[]" isType="select" multiple class="select2" column="col-span-2 md:col-span-1">
                    @foreach ($data['professions'] as $profession)
                        <option value="{{ $profession->id }}" @selected(isset($therapist) && in_array($profession->id, $therapist->professions->pluck('id')->toArray()))>
                            {{ $profession->name }}
                        </option>
                    @endforeach
                </x-user.form-group>

                <x-user.form-group label="languages" for="languages[]" isType="select" multiple class="select2" column="col-span-2 md:col-span-1">
                    @foreach ($data['languages'] as $language)
                        <option value="{{ $language->id }}" @selected(isset($therapist) && in_array($language->id, $therapist->languages->pluck('id')->toArray()))>
                            {{ $language->name }}
                        </option>
                    @endforeach

                </x-user.form-group>

                <x-user.form-group label="sessions" for="sessions[]" isType="select" multiple class="select2" column="col-span-2 md:col-span-1">
                    @foreach ($data['sessions'] as $session)
                        <option value="{{ $session->id }}" @selected(isset($therapist) && in_array($session->id, $therapist->sessions->pluck('id')->toArray()))>
                            {{ $session->name }}
                        </option>
                    @endforeach
                </x-user.form-group>

                <x-user.form-group label="accessibilities" for="accessibilities[]" isType="select" :required="false" multiple class="select2" column="col-span-2 md:col-span-1">
                    @foreach ($data['accessibilities'] as $accessibility)
                        <option value="{{ $accessibility->id }}" @selected(isset($therapist) && in_array($accessibility->id, $therapist->accessibilities->pluck('id')->toArray()))>
                            {{ $accessibility->name }}
                        </option>
                    @endforeach
                </x-user.form-group>

                <x-user.form-group label="concessions" for="concessions[]" isType="select" :required="false" multiple class="select2" column="col-span-2 md:col-span-1">
                    @foreach ($data['concessions'] as $concession)
                        <option value="{{ $concession->id }}" @selected(isset($therapist) && in_array($concession->id, $therapist->concessions->pluck('id')->toArray()))>
                            {{ $concession->name }}
                        </option>
                    @endforeach
                </x-user.form-group>

                <x-user.form-group label="formats" for="formats[]" isType="select" :required="false" multiple class="select2" column="col-span-2 md:col-span-1">
                    @foreach ($data['formats'] as $format)
                        <option value="{{ $format->id }}" @selected(isset($therapist) && in_array($format->id, $therapist->formats->pluck('id')->toArray()))>
                            {{ $format->name }}
                        </option>
                    @endforeach
                </x-user.form-group>

                <div class="col-span-2">
                    <div class="flex items-center justify-between mb-2">
                        <h6 class="">Online Platform</h6>
                        <button type="button" class="bg-warning py-3 px-4 rounded-lg text-white font-medium" id="addPlatform">Add Platform</button>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Platform</th>
                                <th scope="col" class="px-6 py-3">URL</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($therapist)
                                @if (in_array(gettype($therapist->online_platforms), ['array','object']))
                                    @foreach ($therapist->online_platforms as $online_platform)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <td>
                                                <select name="online_platforms[]" id="online_platforms" class="form-control">
                                                    <option id="">Select online platform</option>
                                                    @foreach ($data['onlinePlatforms'] as $onlinePlatform)
                                                        <option value="{{ $onlinePlatform->id }}" @selected($onlinePlatform->id == $online_platform->id)> {{ $onlinePlatform->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="urls[]" id="urls" placeholder="Enter URL" value="{{ $online_platform->url }}" />
                                            </td>
                                            <td>
                                                <button type="button" class="btn" id="removePlatform">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5"
                                                            stroke="#141B34" stroke-width="1.5" stroke-linecap="round" />
                                                        <path
                                                            d="M3 5.5H21M16.0557 5.5L15.3731 4.09173C14.9196 3.15626 14.6928 2.68852 14.3017 2.39681C14.215 2.3321 14.1231 2.27454 14.027 2.2247C13.5939 2 13.0741 2 12.0345 2C10.9688 2 10.436 2 9.99568 2.23412C9.8981 2.28601 9.80498 2.3459 9.71729 2.41317C9.32164 2.7167 9.10063 3.20155 8.65861 4.17126L8.05292 5.5"
                                                            stroke="#141B34" stroke-width="1.5" stroke-linecap="round" />
                                                        <path d="M9.5 16.5L9.5 10.5" stroke="#141B34" stroke-width="1.5"
                                                            stroke-linecap="round" />
                                                        <path d="M14.5 16.5L14.5 10.5" stroke="#141B34" stroke-width="1.5"
                                                            stroke-linecap="round" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endisset
                        </tbody>
                    </table>
                </div>

                <x-user.form-group label="about" isType="textarea" cols="5" class="text-editor" column="col-span-2" question="*" :required="false">{{ $therapist->about ?? '' }}</x-user.form-group>

                <x-user.form-group label="experience" isType="textarea" cols="5" class="text-editor" column="col-span-2" question="*" :required="false">{{ $therapist->experience ?? '' }}</x-user.form-group>
                <x-user.form-group label="health_insurance_providers" isType="textarea" cols="5" class="text-editor" column="col-span-2" question="*" :required="false">{{ $therapist->health_insurance_providers ?? '' }}</x-user.form-group>

                <x-user.form-group label="availability" isType="textarea" :required="false" cols="5" class="text-editor" column="col-span-2">{{ $therapist->availability ?? '' }}</x-user.form-group>

                <x-user.form-group label="further_information" isType="textarea" :required="false" cols="5" class="text-editor" column="col-span-2">{{ $therapist->further_information ?? '' }}</x-user.form-group>

                <x-user.form-group label="tags" placeholder="Enter tags" question="maximum 10 tag allowed" :value="$therapist->tags ?? ''" column="col-span-2" class="tags" />

                <x-user.form-group label="documents" for="documents[]" type="file" accept="application/pdf,application/vnd.ms-excel" multiple :required="false" column="col-span-2 md:col-span-1" />

                @if ($therapist?->live_profile)
                    <x-user.form-group label="live profile" for="video" :question="!$therapist?->live_profile ? 'You are not allowed for add video' : ''" type="file" column="col-span-2 md:col-span-1" accept="video/*" :required="false" class="form-control" />
                @else
                    <x-user.form-group label="live profile" for="video" :question="!$therapist?->live_profile ? 'You are not allowed for add video' : ''" type="file" column="col-span-2 md:col-span-1" accept="video/*" :required="false" class="form-control" disabled />
                @endif

                <div class="col-span-1 md:col-span-2">
                    <x-user.submit-button label="Update" />
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script src="{{ asset('build/assets/staff') }}/plugins/input-tags/js/tagsinput.js"></script>
    <script>
        function cities() {
            var options = {
                types: ['(postal_code)']
            };
            var location = document.getElementById('location');
            var autoComplete = new google.maps.places.Autocomplete(location)
        }
        $(function () {
            $('input.tags').tagsinput({
                maxTags: 10
            });
        })
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.map_api_key') }}&libraries=places&callback=cities" type="text/javascript"></script>
@endpush
