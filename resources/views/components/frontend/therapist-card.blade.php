@props(['therapist'])

<div class="card border-0 shadow-sm rounded-10 py-3 px-2 mb-3" data-therapist>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-2 text-center text-lg-start position-relative">
                <div>
                    <a href="{{ route('neurologist.details', $therapist->user?->username) }}" class="d-block">
                        <img src="{{ uploadedFile($therapist->user->avatar) }}" class="therapist-img" alt="{{ $therapist->user?->full_name }}" secret="{{ uploadedFile($therapist->user->avatar) }}" />
                    </a>
                </div>
                @if ($therapist->membershipPlan?->slug !== 'student-member')
                    <div class="text-center mt-4 position-absolute bottom-0 w-100 d-none d-lg-block">
                        <img src="{{ asset('build/assets/frontend/images/membership/'.str_replace('-member', '', $therapist->membershipPlan?->slug).'.png') }}" alt="{{ $therapist->membershipPlan?->name }}" width="80px" />
                    </div>
                @endif
            </div>
            <div class="col-lg-6 mt-3 mt-lg-0">
                <div class="ms-lg-3">
                    <p class="mb-0">
                        <a href="{{ route('neurologist.details', $therapist->user->username) }}" class="fs-22 fw-bold text-primary-700">{{ $therapist->user?->full_name }}</a>
                    </p>
                    <p class="fs-16 text-primary-500">{{ $therapist->degree }}</p>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('build/assets/frontend/images/icons/location.svg') }}" alt="" srcset="">
                        <p class="fs-14 mb-0 ms-1">
                            {{ $therapist->user?->location }}
                            @if (!empty(request()->get('location')))
                                @if (($distances->location == session()->get('location')) && $therapist->distance > 0)
                                    • Within <span class="fw-bold text-primary-500">{{ $therapist->distance }} mile</span> of {{ request()->get('location') }}
                                @endif
                                {{-- @foreach ($therapist->distances as $distances)
                                    @if (($distances->location == session()->get('location')) && $distances->distance > 0)
                                    • Within <span class="fw-bold text-primary-500">{{ $distances->distance }} mile</span> of {{ request()->get('location') }}
                                    @endif
                                @endforeach --}}
                            @endif
                        </p>
                    </div>
                    <p class="fs-16 text-gray-600 mt-3">{!! $therapist->short_description !!}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <p class="fs-14 fw-bold text-gray-800">Search Matches</p>

                <div class="mb-3">
                    @foreach (explode(',', $therapist->tags) as $tag)
                        @if (!empty($tag))
                            <a href="#" class="btn border-gray-300 rounded-26 fs-14 text-gray-600 fw-medium mb-3">{{ $tag }}</a>
                        @endif
                    @endforeach
                </div>
                <x-frontend.bookmark-button :id="$therapist->id" :username="$therapist->user->username" />

                <a href="{{ route('neurologist.details', $therapist->user->username) }}" class="btn bg-primary-500 rounded-10 w-100 py-2 text-white fw-bold fs-14 mt-3">View Profile</a>
            </div>
        </div>
    </div>
</div>
