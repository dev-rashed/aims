@extends('layouts.frontend.app')

@section('meta_keywords', $user->therapist?->tags)
@section('meta_description', $user->therapist?->short_description)

@section('title', $user?->full_name)

@section('content')

<!-- Neurologist Profile Section Start -->
<x-frontend.section class="neurologist-profile-section">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4">
                        @if ($user->therapist?->video != null)
                            <video width="100%" height="auto" controls style="border-radius: 10px;">
                                <source src="{{ uploadedFile($user->therapist?->video) }}" type="video/mp4">
                                <source src="{{ uploadedFile($user->therapist?->video) }}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ uploadedFile($user->avatar) }}" class="img-fluid rounded-20" alt="{{ $user?->full_name }}" srcset="{{ uploadedFile($user->avatar) }}" />
                        @endif

                        </div>
                        <div class="col-md-8">
                            <div class="">
                                <h1 class="fs-1 fw-bold line-h-60 text-primary-500">{{ $user?->full_name }}</h1>
                                <p class="fs-16 fw-bold text-primary-900">{{ $user->therapist?->degree }}</p>

                                <p class="fw-medium fs-14 text-gray-500 line-h-24">{!! $user->therapist?->short_description !!}</p>

                                <div class="my-4">
                                    <div class="d-flex">
                                        <div class="w-45 h-45 bg-primary-100 rounded-10 d-flex align-items-center justify-content-center">
                                            <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 0.5C3.6 0.5 0 4.1 0 8.5C0 13.9 7 20 7.3 20.3C7.5 20.4 7.8 20.5 8 20.5C8.2 20.5 8.5 20.4 8.7 20.3C9 20 16 13.9 16 8.5C16 4.1 12.4 0.5 8 0.5ZM8 18.2C5.9 16.2 2 11.9 2 8.5C2 5.2 4.7 2.5 8 2.5C11.3 2.5 14 5.2 14 8.5C14 11.8 10.1 16.2 8 18.2ZM8 4.5C5.8 4.5 4 6.3 4 8.5C4 10.7 5.8 12.5 8 12.5C10.2 12.5 12 10.7 12 8.5C12 6.3 10.2 4.5 8 4.5ZM8 10.5C6.9 10.5 6 9.6 6 8.5C6 7.4 6.9 6.5 8 6.5C9.1 6.5 10 7.4 10 8.5C10 9.6 9.1 10.5 8 10.5Z" fill="#062C59"/>
                                            </svg>
                                        </div>
                                        <div class="ms-2">
                                            <p class="mb-0 text-gray-500 fs-14 fw-medium">Location</p>
                                            <h6 class="fs-6 fw-bold text-primary-900">{{ $user->location }}</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-3">
                                        <div class="w-45 h-45 bg-primary-100 rounded-10 d-flex align-items-center justify-content-center">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#emailModal">
                                                <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 2.5C0 1.39543 0.89543 0.5 2 0.5H18C19.1046 0.5 20 1.39543 20 2.5V14.5C20 15.6046 19.1046 16.5 18 16.5H2C0.895432 16.5 0 15.6046 0 14.5V2.5ZM3.51859 2.5L10 8.17123L16.4814 2.5H3.51859ZM18 3.82877L10.6585 10.2526C10.2815 10.5825 9.71852 10.5825 9.3415 10.2526L2 3.82877V14.5H18V3.82877Z" fill="#062C59"/>
                                                </svg>
                                            </a>

                                        </div>
                                        <div class="ms-2">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#emailModal">
                                                <p class="mb-0 text-gray-500 fs-14 fw-medium">Email</p>
                                                <h6 class="fs-6 fw-bold text-primary-900">{{ $user->therapist?->email ?? $user->email }}</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gy-3">
                                    <div class="col-6 col-xl-5">
                                        <a href="tel:{{ $user->therapist?->phone ?? $user->phone }}" class="btn icon-btn">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.55538 1.66659H4.54867L5.51348 4.07861L3.96356 5.11189C3.7781 5.23553 3.6667 5.44368 3.6667 5.66659C3.66839 5.72901 3.6667 5.66725 3.6667 5.66725L3.6667 5.66795L3.6667 5.66944L3.66672 5.67281L3.66682 5.68103C3.66692 5.68718 3.66709 5.69464 3.66737 5.70338C3.66793 5.72085 3.66895 5.74345 3.67078 5.77083C3.67442 5.82556 3.6813 5.89954 3.69423 5.99003C3.72007 6.1709 3.77021 6.41866 3.86757 6.71074C4.06306 7.29721 4.44718 8.05655 5.19529 8.80466C5.9434 9.55276 6.70274 9.93688 7.28921 10.1324C7.58129 10.2297 7.82905 10.2799 8.00991 10.3057C8.1004 10.3186 8.17439 10.3255 8.22912 10.3292C8.2565 10.331 8.27909 10.332 8.29657 10.3326C8.30531 10.3329 8.31277 10.333 8.31891 10.3331L8.32714 10.3332L8.3305 10.3332L8.332 10.3333L8.33269 10.3333C8.33269 10.3333 8.40712 10.3292 8.33336 10.3333C8.58588 10.3333 8.81672 10.1906 8.92965 9.96473L9.37611 9.0718L12.3334 9.56467V12.4446C10.926 12.6481 7.12497 12.8487 4.1381 9.86185C1.15123 6.87498 1.35184 3.07398 1.55538 1.66659ZM5.04913 5.99064L6.25308 5.18801C6.7777 4.83826 6.98562 4.16884 6.75145 3.58342L5.78664 1.1714C5.58416 0.665187 5.09388 0.333252 4.54867 0.333252H1.52055C0.914873 0.333252 0.344753 0.754027 0.245324 1.41119C0.019117 2.90625 -0.288781 7.32058 3.19529 10.8047C6.67936 14.2887 11.0937 13.9808 12.5888 13.7546C13.2459 13.6552 13.6667 13.0851 13.6667 12.4794V9.56467C13.6667 8.91288 13.1955 8.35663 12.5526 8.24948L9.59531 7.7566C9.01793 7.66037 8.44531 7.95197 8.18354 8.47551L7.95255 8.9375C7.87994 8.91968 7.79889 8.89681 7.71085 8.86746C7.29732 8.72962 6.72332 8.44707 6.1381 7.86185C5.55288 7.27662 5.27033 6.70263 5.13248 6.2891C5.09524 6.17736 5.06842 6.07688 5.04913 5.99064Z" fill="#fff"/>
                                            </svg>
                                            <span class="ms-2">Contact</span>
                                        </a>
                                    </div>
                                    <div class="col-6 d-lg-none">
                                        <x-frontend.bookmark-button :id="$user->therapist?->id" :username="$user->username" />
                                    </div>
                                    <div class="col-6 d-lg-none">
                                        <a href="{{ $user->therapist?->website }}" class="btn icon-btn" target="_blank">
                                            <svg width="15" height="11" viewBox="0 0 15 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.2999 0.999919C10.2999 0.631729 10.5984 0.333252 10.9666 0.333252C11.3911 0.333252 11.8082 0.418548 12.2142 0.580934C12.656 0.757658 12.9961 1.01992 13.3047 1.32851C13.6132 1.63711 13.8755 1.97718 14.0522 2.41899C14.2146 2.82496 14.2999 3.24209 14.2999 3.66659C14.2999 4.09108 14.2146 4.50821 14.0522 4.91418C13.8777 5.35045 13.6198 5.68752 13.3162 5.99303L12.6599 6.71503C12.6528 6.72286 12.6455 6.73051 12.638 6.73799L10.5047 8.87132C10.1961 9.17992 9.85599 9.44218 9.41418 9.6189C9.00821 9.78129 8.59108 9.86659 8.16659 9.86659C7.74209 9.86659 7.32496 9.78129 6.91899 9.6189C6.47718 9.44218 6.13711 9.17992 5.82851 8.87132C5.51992 8.56273 5.25766 8.22266 5.08093 7.78085C4.91542 7.36707 4.83325 6.94955 4.83325 6.46659C4.83325 6.04209 4.91855 5.62496 5.08093 5.21899C5.25766 4.77718 5.51992 4.43711 5.82851 4.12851L6.56185 3.39518C6.8222 3.13483 7.24431 3.13483 7.50466 3.39518C7.76501 3.65553 7.76501 4.07764 7.50466 4.33799L6.77132 5.07132C6.54658 5.29606 6.40885 5.48932 6.3189 5.71418C6.21462 5.97488 6.16659 6.22441 6.16659 6.46659C6.16659 6.78362 6.21775 7.03277 6.3189 7.28566C6.40885 7.51052 6.54658 7.70377 6.77132 7.92851C6.99606 8.15325 7.18932 8.29099 7.41418 8.38093C7.67488 8.48521 7.92441 8.53325 8.16659 8.53325C8.40876 8.53325 8.65829 8.48521 8.91899 8.38093C9.14385 8.29099 9.33711 8.15325 9.56185 7.92851L11.684 5.8064L12.34 5.0848C12.3471 5.07698 12.3544 5.06932 12.3618 5.06185C12.5866 4.83711 12.7243 4.64385 12.8143 4.41899C12.9185 4.15829 12.9666 3.90876 12.9666 3.66659C12.9666 3.42441 12.9185 3.17488 12.8143 2.91418C12.7243 2.68932 12.5866 2.49606 12.3618 2.27132C12.1371 2.04658 11.9438 1.90885 11.719 1.8189C11.4583 1.71462 11.2088 1.66659 10.9666 1.66659C10.5984 1.66659 10.2999 1.36811 10.2999 0.999919ZM7.03325 1.99992C6.79108 1.99992 6.54155 2.04796 6.28085 2.15224C6.05599 2.24218 5.86273 2.37992 5.63799 2.60466L3.44921 4.79344L2.79321 5.51503C2.7861 5.52286 2.7788 5.53051 2.77132 5.53799C2.54658 5.76273 2.40885 5.95599 2.3189 6.18085C2.21462 6.44155 2.16659 6.69108 2.16659 6.93325C2.16659 7.17543 2.21462 7.42496 2.3189 7.68566C2.40885 7.91052 2.54658 8.10377 2.77132 8.32851C2.99606 8.55326 3.18932 8.69099 3.41418 8.78094C3.67488 8.88521 3.92441 8.93325 4.16659 8.93325C4.53478 8.93325 4.83325 9.23173 4.83325 9.59992C4.83325 9.96811 4.53478 10.2666 4.16659 10.2666C3.74209 10.2666 3.32496 10.1813 2.91899 10.0189C2.47718 9.84218 2.13711 9.57992 1.82851 9.27132C1.51992 8.96273 1.25766 8.62265 1.08093 8.18085C0.918548 7.77488 0.833252 7.35774 0.833252 6.93325C0.833252 6.50876 0.918548 6.09162 1.08093 5.68566C1.25544 5.24939 1.51336 4.91232 1.81693 4.60681L2.47329 3.8848C2.48041 3.87698 2.4877 3.86932 2.49518 3.86185L4.69518 1.66185C5.00377 1.35326 5.34385 1.09099 5.78566 0.914267C6.19162 0.751881 6.60876 0.666585 7.03325 0.666585C7.45774 0.666585 7.87488 0.751881 8.28085 0.914267C8.72266 1.09099 9.06273 1.35326 9.37132 1.66185C9.67992 1.97044 9.94218 2.31052 10.1189 2.75233C10.2813 3.15829 10.3666 3.57543 10.3666 3.99992C10.3666 4.42441 10.2813 4.84155 10.1189 5.24751C9.9442 5.68426 9.68591 6.02159 9.38191 6.32737L8.65802 7.11707C8.40923 7.38848 7.98751 7.40682 7.7161 7.15802C7.44469 6.90923 7.42635 6.48751 7.67515 6.2161L8.40848 5.4161C8.41501 5.40898 8.42169 5.40201 8.42851 5.39518C8.65325 5.17044 8.79099 4.97718 8.88093 4.75233C8.98521 4.49162 9.03325 4.24209 9.03325 3.99992C9.03325 3.75774 8.98521 3.50821 8.88093 3.24751C8.79099 3.02265 8.65326 2.8294 8.42851 2.60466C8.20377 2.37992 8.01052 2.24218 7.78566 2.15224C7.52496 2.04796 7.27543 1.99992 7.03325 1.99992Z" fill="white"/>
                                            </svg>
                                            <span class="ms-2">Visit Website</span>
                                        </a>
                                    </div>

                                    @if ($user->therapist?->video != null)
                                        <div class="col-6 d-lg-none">
                                            <a href="#" class="d-flex align-items-center justify-content-center bg-primary-100 rounded-10 h-48 text-primary-900 fw-bold fs-14" data-bs-toggle="modal" data-bs-target="#videoModal">
                                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 2.74105C0 1.19747 1.67443 0.235725 3.00774 1.01349L12.0231 6.27246C13.3461 7.04421 13.3461 8.95582 12.0231 9.72757L3.00774 14.9865C1.67443 15.7643 0 14.8026 0 13.259V2.74105ZM11.0154 8.00001L2 2.74105V13.259L11.0154 8.00001Z" fill="#0D0D0D"/>
                                                </svg>
                                                <span class="ms-2">Live Profile</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($user->therapist?->about !== null)
                    <div class="col-12 mt-5">
                        <h4 class="fs-4 fw-bold text-primary-900 line-h-45">About me</h4>
                        {!! $user->therapist?->about !!}
                    </div>
                @endif
                @if ($user->therapist?->experience !== null)
                    <div class="col-12 mt-3">
                        <h4 class="fs-4 fw-bold text-primary-900 line-h-45">Training, qualifications & experience</h4>
                        {!! $user->therapist?->experience !!}
                    </div>
                @endif
                @if ($user->therapist?->health_insurance_providers !== null)
                    {{-- <div class="col-12 mt-3">
                        <h4 class="fs-4 fw-bold text-primary-900 line-h-45">EAP/Health Insurance Providers</h4>
                        {!! $user->therapist?->health_insurance_providers !!}
                    </div> --}}
                @endif
                @if ($user->therapist?->availability !== null)
                    <div class="col-12 mt-3">
                        <h4 class="fs-4 fw-bold text-primary-900 line-h-45">Availability</h4>
                        {!! $user->therapist?->availability !!}
                    </div>
                @endif
                @if ($user->therapist?->further_information !== null)
                    <div class="col-12 mt-3">
                        <h4 class="fs-4 fw-bold text-primary-900 line-h-45">Further information</h4>
                        {!! $user->therapist?->further_information !!}
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-4 ms-auto">
            <div class="card border-0 shadow-lg">
                <div class="card-body">

                    <div class="d-none d-lg-block">
                        <x-frontend.bookmark-button :id="$user->therapist?->id" :username="$user->username" class="mb-3" />

                        <a href="{{ $user->therapist?->website }}" class="btn icon-btn w-100 mb-3" target="_blank">
                            <svg width="15" height="11" viewBox="0 0 15 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.2999 0.999919C10.2999 0.631729 10.5984 0.333252 10.9666 0.333252C11.3911 0.333252 11.8082 0.418548 12.2142 0.580934C12.656 0.757658 12.9961 1.01992 13.3047 1.32851C13.6132 1.63711 13.8755 1.97718 14.0522 2.41899C14.2146 2.82496 14.2999 3.24209 14.2999 3.66659C14.2999 4.09108 14.2146 4.50821 14.0522 4.91418C13.8777 5.35045 13.6198 5.68752 13.3162 5.99303L12.6599 6.71503C12.6528 6.72286 12.6455 6.73051 12.638 6.73799L10.5047 8.87132C10.1961 9.17992 9.85599 9.44218 9.41418 9.6189C9.00821 9.78129 8.59108 9.86659 8.16659 9.86659C7.74209 9.86659 7.32496 9.78129 6.91899 9.6189C6.47718 9.44218 6.13711 9.17992 5.82851 8.87132C5.51992 8.56273 5.25766 8.22266 5.08093 7.78085C4.91542 7.36707 4.83325 6.94955 4.83325 6.46659C4.83325 6.04209 4.91855 5.62496 5.08093 5.21899C5.25766 4.77718 5.51992 4.43711 5.82851 4.12851L6.56185 3.39518C6.8222 3.13483 7.24431 3.13483 7.50466 3.39518C7.76501 3.65553 7.76501 4.07764 7.50466 4.33799L6.77132 5.07132C6.54658 5.29606 6.40885 5.48932 6.3189 5.71418C6.21462 5.97488 6.16659 6.22441 6.16659 6.46659C6.16659 6.78362 6.21775 7.03277 6.3189 7.28566C6.40885 7.51052 6.54658 7.70377 6.77132 7.92851C6.99606 8.15325 7.18932 8.29099 7.41418 8.38093C7.67488 8.48521 7.92441 8.53325 8.16659 8.53325C8.40876 8.53325 8.65829 8.48521 8.91899 8.38093C9.14385 8.29099 9.33711 8.15325 9.56185 7.92851L11.684 5.8064L12.34 5.0848C12.3471 5.07698 12.3544 5.06932 12.3618 5.06185C12.5866 4.83711 12.7243 4.64385 12.8143 4.41899C12.9185 4.15829 12.9666 3.90876 12.9666 3.66659C12.9666 3.42441 12.9185 3.17488 12.8143 2.91418C12.7243 2.68932 12.5866 2.49606 12.3618 2.27132C12.1371 2.04658 11.9438 1.90885 11.719 1.8189C11.4583 1.71462 11.2088 1.66659 10.9666 1.66659C10.5984 1.66659 10.2999 1.36811 10.2999 0.999919ZM7.03325 1.99992C6.79108 1.99992 6.54155 2.04796 6.28085 2.15224C6.05599 2.24218 5.86273 2.37992 5.63799 2.60466L3.44921 4.79344L2.79321 5.51503C2.7861 5.52286 2.7788 5.53051 2.77132 5.53799C2.54658 5.76273 2.40885 5.95599 2.3189 6.18085C2.21462 6.44155 2.16659 6.69108 2.16659 6.93325C2.16659 7.17543 2.21462 7.42496 2.3189 7.68566C2.40885 7.91052 2.54658 8.10377 2.77132 8.32851C2.99606 8.55326 3.18932 8.69099 3.41418 8.78094C3.67488 8.88521 3.92441 8.93325 4.16659 8.93325C4.53478 8.93325 4.83325 9.23173 4.83325 9.59992C4.83325 9.96811 4.53478 10.2666 4.16659 10.2666C3.74209 10.2666 3.32496 10.1813 2.91899 10.0189C2.47718 9.84218 2.13711 9.57992 1.82851 9.27132C1.51992 8.96273 1.25766 8.62265 1.08093 8.18085C0.918548 7.77488 0.833252 7.35774 0.833252 6.93325C0.833252 6.50876 0.918548 6.09162 1.08093 5.68566C1.25544 5.24939 1.51336 4.91232 1.81693 4.60681L2.47329 3.8848C2.48041 3.87698 2.4877 3.86932 2.49518 3.86185L4.69518 1.66185C5.00377 1.35326 5.34385 1.09099 5.78566 0.914267C6.19162 0.751881 6.60876 0.666585 7.03325 0.666585C7.45774 0.666585 7.87488 0.751881 8.28085 0.914267C8.72266 1.09099 9.06273 1.35326 9.37132 1.66185C9.67992 1.97044 9.94218 2.31052 10.1189 2.75233C10.2813 3.15829 10.3666 3.57543 10.3666 3.99992C10.3666 4.42441 10.2813 4.84155 10.1189 5.24751C9.9442 5.68426 9.68591 6.02159 9.38191 6.32737L8.65802 7.11707C8.40923 7.38848 7.98751 7.40682 7.7161 7.15802C7.44469 6.90923 7.42635 6.48751 7.67515 6.2161L8.40848 5.4161C8.41501 5.40898 8.42169 5.40201 8.42851 5.39518C8.65325 5.17044 8.79099 4.97718 8.88093 4.75233C8.98521 4.49162 9.03325 4.24209 9.03325 3.99992C9.03325 3.75774 8.98521 3.50821 8.88093 3.24751C8.79099 3.02265 8.65326 2.8294 8.42851 2.60466C8.20377 2.37992 8.01052 2.24218 7.78566 2.15224C7.52496 2.04796 7.27543 1.99992 7.03325 1.99992Z" fill="white"/>
                            </svg>
                            <span class="ms-2">Visit Website</span>
                        </a>
                    </div>

                    {{-- <div class="d-flex align-items-center justify-content-center bg-primary-100 rounded-10 h-48 mt-3 text-primary-900 fw-bold fs-14">
                        <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.519651 10.3211C0.525905 9.06061 0.950005 7.83775 1.72555 6.84403C2.50109 5.85031 3.58428 5.14183 4.80551 4.82954V3.90843H4.25154C4.18591 3.9071 4.12317 3.88118 4.07573 3.83581L0.574884 0.40994C0.538943 0.376934 0.514276 0.333472 0.504366 0.285691C0.494456 0.237911 0.499802 0.188224 0.519651 0.143646C0.539387 0.100337 0.571291 0.063703 0.611478 0.0382053C0.651665 0.0127077 0.6984 -0.0005527 0.74599 3.95295e-05H5.35032C5.41346 -0.00109049 5.47462 0.0220441 5.52119 0.0646741L6.56381 1.90547L7.02941 0.0646741C7.07751 0.0222417 7.13967 -0.00079507 7.20381 3.95295e-05H11.8051C11.853 -0.000156058 11.9 0.0132312 11.9406 0.0386487C11.9812 0.0640662 12.0137 0.100473 12.0345 0.143646C12.0527 0.188512 12.0572 0.237774 12.0473 0.285184C12.0375 0.332593 12.0138 0.376015 11.9792 0.40994L8.47488 3.83604C8.42763 3.88127 8.36517 3.90718 8.29978 3.90867H7.74462V4.82977C9.09391 5.16848 10.2716 5.99134 11.0537 7.14183C11.8359 8.29231 12.1678 9.69014 11.9864 11.0694C11.805 12.4487 11.123 13.7132 10.07 14.6224C9.01706 15.5315 7.66664 16.0219 6.27566 16.0003C4.75986 16.0085 3.30267 15.4152 2.22364 14.3506C1.14462 13.286 0.531826 11.8369 0.519651 10.3211ZM1.01322 10.3211C0.999845 11.3653 1.29726 12.3898 1.86767 13.2645C2.43807 14.1391 3.25569 14.8244 4.21657 15.2332C5.17745 15.642 6.23819 15.7558 7.26392 15.5601C8.28965 15.3645 9.23404 14.8683 9.97701 14.1345C10.72 13.4008 11.228 12.4627 11.4364 11.4395C11.6448 10.4163 11.5443 9.35417 11.1475 8.38826C10.7508 7.42235 10.0758 6.59623 9.20831 6.01495C8.34085 5.43366 7.32011 5.12347 6.27589 5.1238C4.88919 5.11654 3.55624 5.65969 2.56953 6.63406C1.58282 7.60843 1.02294 8.93444 1.01275 10.3211H1.01322ZM7.25646 4.72119V3.90843H5.29768V4.72119C5.94634 4.6157 6.60779 4.6157 7.25646 4.72119ZM6.91025 2.47496L7.50841 3.41862H8.2013L11.2102 0.481861H7.45436L6.91025 2.47496ZM4.35284 3.41862H6.91025L4.98249 0.481861H1.34392L4.35284 3.41862ZM4.44168 12.8409C4.40547 12.8146 4.37744 12.7785 4.36081 12.737C4.34418 12.6954 4.33962 12.65 4.34766 12.6059L4.6471 10.8749L3.3725 9.64893C3.3398 9.61733 3.3167 9.57712 3.30589 9.53295C3.29508 9.48878 3.29698 9.44245 3.3114 9.39932C3.32601 9.35683 3.35187 9.31909 3.38622 9.29012C3.42057 9.26116 3.46213 9.24203 3.50647 9.2348L5.26783 8.97837L6.05872 7.40364C6.08141 7.36602 6.11344 7.33491 6.1517 7.31331C6.18995 7.29172 6.23314 7.28037 6.27707 7.28037C6.321 7.28037 6.36418 7.29172 6.40244 7.31331C6.44069 7.33491 6.47272 7.36602 6.49541 7.40364L7.28302 8.97837L9.04437 9.23691C9.08953 9.24263 9.13215 9.261 9.16732 9.28991C9.20249 9.31882 9.22876 9.35708 9.24311 9.40028C9.25747 9.44348 9.25931 9.48986 9.24843 9.53407C9.23755 9.57827 9.21439 9.6185 9.18163 9.6501L7.90351 10.8756L8.2067 12.6066C8.21403 12.651 8.20878 12.6965 8.19154 12.7381C8.1743 12.7796 8.14576 12.8155 8.10916 12.8416C8.0716 12.8666 8.02808 12.8812 7.98304 12.884C7.938 12.8867 7.89304 12.8774 7.85274 12.8572L6.27519 12.0442L4.69787 12.8564C4.66372 12.876 4.62483 12.8857 4.58552 12.8844C4.53433 12.8845 4.48426 12.8694 4.44168 12.8409ZM6.39106 11.5588L7.64497 12.207L7.40664 10.8319C7.39841 10.7933 7.40046 10.7533 7.41259 10.7158C7.42472 10.6783 7.4465 10.6446 7.47574 10.6182L8.48945 9.64188L7.08888 9.43575C7.04973 9.43167 7.01225 9.41775 6.97995 9.39526C6.94764 9.37278 6.92156 9.34248 6.90414 9.30719L6.27636 8.05328L5.65117 9.30742C5.63383 9.34259 5.60789 9.37281 5.57576 9.39528C5.54363 9.41776 5.50635 9.43176 5.46737 9.43599L4.06586 9.64211L5.08027 10.6184C5.10941 10.6449 5.13106 10.6786 5.14307 10.7161C5.15508 10.7536 5.157 10.7936 5.14866 10.8321L4.91104 12.2073L6.16425 11.5588C6.19854 11.5379 6.23795 11.5268 6.27812 11.5268C6.3183 11.5268 6.3577 11.5379 6.392 11.5588H6.39106Z" fill="black"/>
                        </svg>
                        <span class="ms-3">{{ $user->therapist?->registered ? 'Registered / Accredited' : '' }}</span>
                    </div> --}}

                    <div class="mt-4">
                        @if ($user->therapist?->sessions->count())
                            <div>
                                <p class="fs-22 fw-bold text-primary-500 line-h-33 mb-2">Type of session</p>
                                <ul class="fs-16 line-h-20 text-gray-700 list-unstyled">
                                    @foreach ($user->therapist?->sessions as $session)
                                        <li class="mb-1">{{ $session->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($user->therapist?->fees !== null)
                            <div>
                                <p class="fs-22 fw-bold text-primary-500 line-h-33 mb-2">Fees</p>
                                <ul class="fs-16 line-h-20 text-gray-700 list-unstyled">
                                    <li class="mb-1">{{ convertAmount(amount: $user->therapist?->fees, from: $user->currency?->code) }}</li>
                                </ul>
                            </div>
                        @endif
                        @if ($user->therapist?->key_details !== null)
                            <div class="mt-4">
                                <p class="fs-22 fw-bold text-primary-500 line-h-33 mb-2">Key details</p>
                                <ul class="fs-16 line-h-20 text-gray-700 list-unstyled">
                                    <li>{{ $user->therapist?->key_details }}</li>
                                </ul>
                            </div>
                        @endif
                        @if ($user->therapist?->professions->count())
                            <div class="mt-4">
                                <p class="fs-22 fw-bold text-primary-500 line-h-33 mb-2">Specialities</p>
                                <ul class="fs-16 line-h-20 text-gray-700 list-unstyled">
                                    @foreach ($user->therapist->professions as $profession)
                                        <li class="mb-1">{{ $profession?->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($user->therapist?->languages->count())
                            <div class="mt-4">
                                <p class="fs-22 fw-bold text-primary-500 line-h-33 mb-2">Additional languages</p>
                                <ul class="fs-16 line-h-20 text-gray-700 list-unstyled">
                                    @foreach ($user->therapist?->languages as $language)
                                        <li class="mb-1">{{ $language?->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($user->therapist?->online_platforms != null && gettype($user->therapist?->online_platforms) != 'string')
                            <div class="mt-4">
                                <p class="fs-22 fw-bold text-primary-500 line-h-33 mb-2">Online platforms</p>
                                <div class="fs-16 line-h-20 text-gray-700">
                                    @foreach ($user->therapist?->online_platforms as $online_platform)
                                        @php
                                            $platform = DB::table('online_platforms')->where('id', $online_platform->id)->first();
                                        @endphp
                                        @if ($platform)
                                            <a href="{{ $online_platform->url }}" target="_blank">
                                                <img src="{{ uploadedFile($platform->image) }}" alt="{{ $online_platform->name }}" srcset="{{ uploadedFile($platform->image) }}" width="20px" />
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend.section>
<!-- Neurologist Profile Section End -->


@auth
    <x-frontend.video-modal name="emailModal" title="Send mail to {{ $user?->full_name }}" size="md">
        <form id="submit" action="{{ route('neurologist.contact') }}" method="post">
            @csrf
            <input type="hidden" name="therapist" value="{{ $user->username }}">
            <x-frontend.input-group label="subject" placeholder="Enter subject" />

            <x-frontend.input-group label="message" :isInput="false">
                <textarea name="message" id="message" cols="5" class="form-control border-primary-300" placeholder="Write message"></textarea>
            </x-frontend.input-group>

            <div class="text-end">
                <button type="submit" class="btn bg-primary-500 text-white rounded-10 px-5">Send</button>
            </div>
        </form>
    </x-frontend.video-modal>
@else
    <x-frontend.video-modal name="emailModal" title="Login To Your Account" size="md" data-redirect="{{ route('neurologist.details', $user->username) }}">
        <form id="submit" action="{{ route('login') }}" method="POST" data-redirect="{{ route('neurologist.details', $user->username) }}">
            @csrf
            @php
                session()->forget('previous_url');
                session()->put('previous_url', route('neurologist.details', $user->username));
            @endphp
            <div class="card-body">
                <x-frontend.input-group label="email" type="email" placeholder="Enter your valid email" />
                <x-frontend.input-group label="password" type="password" placeholder="Enter your valid password" />

                <div class="d-flex justify-content-between align-items-center my-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me">
                        <label class="form-check-label text-gray-600 fs-16" for="remember_me">
                            Remember Me
                        </label>
                    </div>
                    <div>
                        <a href="{{ route('password.request') }}" class="text-primary-500 fs-14">Forget Password</a>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn bg-primary-500 rounded-10 text-white fw-bold fs-14" style="padding: 12px 80px">Login</button>
                </div>
                <p class="mb-0 fs-16 text-gray-700 mt-4 text-center">
                    Not a member yet ?
                    <a href="{{ route('register') }}" class="text-primary-500">Register now</a>
                </p>

                <div class="text-center my-3">
                    <a href="{{ route('social.login', 'google') }}" class="btn px-5 py-2 rounded-10 text-white fw-bold fs-14 w-100" style="background-color: #0F9D58">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.0039 0C5.37491 0 0 5.373 0 12C0 18.627 5.37491 24 12.0039 24C22.0139 24 24.2691 14.707 23.3301 10H22H19.7324H12V14H19.7383C18.8487 17.4483 15.726 20 12 20C7.582 20 4 16.418 4 12C4 7.582 7.582 4 12 4C14.009 4 15.8391 4.74575 17.2441 5.96875L20.0859 3.12891C17.9519 1.18491 15.1169 0 12.0039 0Z" fill="#fff"/>
                        </svg>
                        Connect with Google
                    </a>
                </div>
            </div>
        </form>
    </x-frontend.video-modal>
@endauth

@endsection
