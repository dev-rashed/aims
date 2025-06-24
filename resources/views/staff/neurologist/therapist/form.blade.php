@extends('layouts.staff.app')

@section('title', isset($therapist) ? 'Update member' : 'Add New member')
@push('css')
    <link href="{{ asset('build/assets/staff') }}/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
@endpush

@section('content')

    <x-staff.page :title="isset($therapist) ? 'Update member' : 'Add New member'">

        <x-slot name="header">
            <x-staff.page-button :href="request()->is('admin/application*') ? route('staff.application.index') : route('staff.therapist.index')" title="Back to members" icon="back" class="btn-danger me-2" />
            @isset($therapist)
                @can('show_therapist')
                    <x-staff.page-button :href="request()->is('admin/application*') ? route('staff.application.show', $therapist->id) : route('staff.therapist.show', $therapist->id)" title="Member Details" icon="show" />
                @endcan
            @endisset
        </x-slot>

        <form class="mt-2" id="fileForm"
            action="{{ isset($therapist) ? route('staff.therapist.update', $therapist->id) : route('staff.therapist.store') }}"
            method="POST"
            class="row g-3"
            data-redirect="{{ request()->is('admin/application*') ? route('staff.application.index') : route('staff.therapist.index') }}"
        >
            @csrf
            @isset($therapist)
                @method('PUT')
            @endisset

            <div class="row">
                <x-staff.form-group
                    label="first_name"
                    placeholder="Enter applications first name"
                    :value="$therapist->user->first_name ?? ''"
                    column="col-md-6 col-xl-4"
                />
                <x-staff.form-group
                    label="last_name"
                    placeholder="Enter applications last name"
                    :value="$therapist->user->last_name ?? ''"
                    column="col-md-6 col-xl-4"
                />
                <x-staff.form-group
                    label="email"
                    placeholder="Enter applications email"
                    :value="$therapist->user->email ?? ''"
                    column="col-md-6 col-xl-4"
                />
                <x-staff.form-group
                    label="phone"
                    placeholder="Enter applications phone"
                    :value="$therapist->user->phone ?? ''"
                    column="col-md-6"
                />
                <x-staff.form-group
                    label="degree"
                    placeholder="Enter applications degree"
                    :value="$therapist->degree ?? ''"
                    column="col-md-6"
                />

                @isset($therapist)
                @else
                    <x-staff.form-group
                        label="password"
                        type="password"
                        placeholder="Enter password"
                        column="col-md-6"
                    />
                    <x-staff.form-group
                        label="confirm password"
                        for="password_confirmation"
                        type="password"
                        placeholder="Enter confirm password"
                        column="col-md-6"
                    />
                @endisset

                <x-staff.form-group
                    label="location"
                    placeholder="Enter applications location"
                    :value="$therapist->user->location ?? ''"
                    column="col-md-6"
                />

                <x-staff.form-group
                    label="website"
                    placeholder="Enter applications website"
                    :value="$therapist->website ?? ''"
                    column="col-md-6"
                    :required="false"
                />
                <x-staff.form-group
                    label="fees"
                    type="number"
                    step="0.1"
                    min="0.1"
                    placeholder="Enter applications fees"
                    :value="$therapist->fees ?? ''"
                    column="col-md-6"
                />

                <x-staff.form-group label="currency" :isInput="false" :required="false" column="col-md-6">
                    <select name="currency" id="currency" class="form-control multiple-select">
                        @foreach ($data['currencies'] as $currency)
                        <option value="{{ $currency->id }}" @selected(isset($therapist) && $therapist->user?->currency_id == $currency->id)>
                            {{ $currency->name }}({{ $currency->symbol }})
                        </option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <x-staff.form-group
                    label="short_description"
                    :isInput="false"
                    column="col-12"
                >
                    <textarea name="short_description" id="short_description" cols="5" class="form-control text-editor" placeholder="Enter short description">{{ $therapist->short_description ?? '' }}</textarea>
                </x-staff.form-group>

                <x-staff.form-group
                    label="key_details"
                    placeholder="Enter applications key details"
                    :value="$therapist->key_details ?? ''"
                    column="col-12"
                />

                <x-staff.form-group label="professions" :isInput="false" column="col-12">
                    <select name="professions[]" id="professions" class="form-control multiple-select" multiple="multiple">
                        @foreach ($data['professions'] as $profession)
                            <option value="{{ $profession->id }}" @selected(isset($therapist) && in_array($profession->id, $therapist->professions->pluck('id')->toArray()))>
                                {{ $profession->name }}
                            </option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <x-staff.form-group label="languages" :isInput="false" column="col-12">
                    <select name="languages[]" id="languages" class="form-control multiple-select" multiple="multiple">
                        @foreach ($data['languages'] as $language)
                            <option value="{{ $language->id }}" @selected(isset($therapist) && in_array($language->id, $therapist->languages->pluck('id')->toArray()))>
                                {{ $language->name }}
                            </option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <x-staff.form-group label="sessions" :isInput="false" column="col-12">
                    <select name="sessions[]" id="sessions" class="form-control multiple-select" multiple="multiple">
                        @foreach ($data['sessions'] as $session)
                            <option value="{{ $session->id }}" @selected(isset($therapist) && in_array($session->id, $therapist->sessions->pluck('id')->toArray()))>
                                {{ $session->name }}
                            </option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <x-staff.form-group label="accessibilities" :isInput="false" :required="false" column="col-12">
                    <select name="accessibilities[]" id="accessibilities" class="form-control multiple-select" multiple="multiple">
                        @foreach ($data['accessibilities'] as $accessibility)
                        <option value="{{ $accessibility->id }}" @selected(isset($therapist) && in_array($accessibility->id, $therapist->accessibilities->pluck('id')->toArray()))>
                            {{ $accessibility->name }}
                        </option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <x-staff.form-group label="concessions" :isInput="false" :required="false" column="col-12">
                    <select name="concessions[]" id="concessions" class="form-control multiple-select" multiple="multiple">
                        @foreach ($data['concessions'] as $concession)
                            <option value="{{ $concession->id }}" @selected(isset($therapist) && in_array($concession->id, $therapist->concessions->pluck('id')->toArray()))>
                                {{ $concession->name }}
                            </option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <x-staff.form-group label="formats" :isInput="false" :required="false" column="col-12">
                    <select name="formats[]" id="formats" class="form-control multiple-select" multiple="multiple">
                        @foreach ($data['formats'] as $format)
                            <option value="{{ $format->id }}" @selected(isset($therapist) && in_array($format->id, $therapist->formats->pluck('id')->toArray()))>
                                {{ $format->name }}
                            </option>
                        @endforeach
                    </select>
                </x-staff.form-group>

                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="">Online Platform</h6>
                        <button type="button" class="btn btn-primary" id="addPlatform">Add Platform</button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Platform</th>
                                <th>URL</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($therapist)
                                @if (in_array(gettype($therapist->online_platforms), ['array','object']))
                                    @foreach ($therapist->online_platforms as $online_platform)
                                        <tr>
                                            <td>
                                                <select name="online_platforms[]" id="online_platforms" class="form-control">
                                                    <option id="">Select online platform</option>
                                                    @foreach ($data['onlinePlatforms'] as $onlinePlatform)
                                                        <option value="{{ $onlinePlatform->id }}"
                                                            @selected($onlinePlatform->id == $online_platform->id)>{{ $onlinePlatform->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="urls[]" id="urls" placeholder="Enter URL" value="{{ $online_platform->url }}" />
                                            </td>
                                            <td>
                                                <button type="button" class="btn" id="removePlatform">
                                                    <i class='bx bxs-trash'></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endisset
                        </tbody>
                    </table>
                </div>

                <x-staff.form-group label="about" :isInput="false" :required="false" column="col-12">
                    <textarea name="about" id="about" cols="5" class="form-control text-editor">{{ $therapist->about ?? '' }}</textarea>
                </x-staff.form-group>

                <x-staff.form-group label="experience" :isInput="false" :required="false" column="col-12">
                    <textarea name="experience" id="experience" cols="5" class="form-control text-editor">{{ $therapist->experience ?? '' }}</textarea>
                </x-staff.form-group>

                <x-staff.form-group label="health_insurance_providers" :required="false" :isInput="false" column="col-12">
                    <textarea name="health_insurance_providers" id="health_insurance_providers" cols="5" class="form-control text-editor">{{ $therapist->health_insurance_providers ?? '' }}</textarea>
                </x-staff.form-group>

                <x-staff.form-group label="availability" :isInput="false" :required="false" column="col-12">
                    <textarea name="availability" id="availability" cols="5" class="form-control text-editor">{{ $therapist->availability ?? '' }}</textarea>
                </x-staff.form-group>

                <x-staff.form-group label="further_information" :isInput="false" :required="false" column="col-12">
                    <textarea name="further_information" id="further_information" cols="5" class="form-control text-editor">{{ $therapist->further_information ?? '' }}</textarea>
                </x-staff.form-group>

                <x-staff.form-group
                    label="tags"
                    placeholder="Enter course tags"
                    :value="$therapist->tags ?? ''"
                    question="maximum 10 tag allowed"
                    class="tags"
                />

                <div class="col-md-6">
                    <div class="row">
                        <x-staff.form-group
                            label="avatar"
                            type="file"
                            :required="false"
                            column="col-12"
                            accept="image/*"
                        />
                        @isset($therapist->user?->avatar)
                            <div class="col-12 mb-3">
                                <img src="{{ uploadedFile($therapist->user?->avatar) }}" alt="" width="50px" />
                            </div>
                        @endisset
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <x-staff.form-group
                            label="documents"
                            for="documents[]"
                            type="file"
                            column="col-12"
                            accept="application/pdf,application/vnd.ms-excel,image/*"
                            multiple
                            :required="false"
                        />
                        @if(isset($therapist))
                            @php $documents = json_decode($therapist->documents); @endphp
                            <div class="col-12 mb-3">
                                <div class="row">
                                    @foreach ($documents ?? [] as $document)
                                        <a href="{{ uploadedFile($document) }}" download="">Download Now</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <x-staff.form-group
                            label="video"
                            type="file"
                            column="col-12"
                            accept="video/*"
                            :required="false"
                        />
                        @if(isset($therapist) && !empty($therapist->video))
                            <div class="col-12 mb-3">
                                Video file uploaded to storage, <a href="{{ uploadedFile($therapist->user?->avatar) }}" download="">Download Now</a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-check form-switch ms-3 mt-3">
                    <input class="form-check-input" type="checkbox" name="registered" id="registered" @checked(isset($therapist) && $therapist->registered) />
                    <label class="form-check-label" for="registered">Is Registered</label>
                </div>
                <div class="form-check form-switch ms-3 mt-3">
                    <input class="form-check-input" type="checkbox" name="hide_profile" id="hide_profile" @checked(isset($therapist) && $therapist->hide_profile) />
                    <label class="form-check-label" for="hide_profile">Hide Profile?</label>
                </div>
                <div class="form-check form-switch ms-3 mt-3">
                    <input class="form-check-input" type="checkbox" name="live_profile" id="live_profile" @checked(isset($therapist) && $therapist->live_profile) />
                    <label class="form-check-label" for="live_profile">Live Profile?</label>
                </div>
            </div>

            <x-staff.submit-button :text="isset($therapist) ? 'Update' : 'Submit'" />
        </form>

    </x-staff.page>
@endsection

@push('js')
    <script src="{{ asset('build/assets/staff') }}/plugins/input-tags/js/tagsinput.js"></script>
    @include('staff.neurologist.therapist.form-script')
@endpush
