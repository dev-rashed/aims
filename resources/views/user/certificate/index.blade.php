@extends('layouts.user.app')

@section('title', 'Certificate & Badge')

@php($membershipPlan = auth()->user()->therapist?->membershipPlan?->slug)

@section('content')
    <div class="flex flex-col 2xl:flex-row 2xl:space-x-6 space-y-6 2xl:space-y-0">
        <div class="w-3/3">
            <h4 class="mb-4">Certificate</h4>
            <div class="bg-light p-6 rounded-xl space-y-6">
                <img src="{{ Vite::image($membershipPlan.'.jpg') }}" class="w-80" alt="" srcset="">
                <div class="mt-6 text-center">
                    <a href="{{ route('certificate.index', ['pdf' => true]) }}" class="text-primary hover:underline" target="_blank">Download</a>
                </div>
            </div>
        </div>
        <div class="">
            <h4 class="mb-4">Badge</h4>
            <div class="bg-light p-6 rounded-xl space-y-6 max-w-[400px]">
                @if ($membershipPlan != 'student-member')
                    <div class="flex w-full p-4 text-white rounded-r-full gap-x-3 items-center justify-between" style="background-color: {{ $color }}" id="badge">
                        <div class="space-y-10">
                            <h3 class="uppercase tracking-wider">{!! str_replace(' ', '<br/>', auth()->user()->therapist?->membershipPlan?->name) !!}</h3>
                            <div class="{{ $membershipPlan == 'registered-member' ? 'bg-orange' : 'bg-primary' }} h-8 flex items-center px-3 relative">
                                {{ auth()->user()->therapist?->member_id }}
                                <div class="absolute w-12 h-full -top-3 -right-5 transform rotate-45" style="background-color: {{ $color }}"></div>
                            </div>
                        </div>
                        <div>
                            <img src="{{ Vite::image($membershipPlan.'.svg') }}" class="w-40 h-40" />
                        </div>
                    </div>
                @else
                    <div class="flex w-full bg-white p-4 text-[#075C89] gap-x-4 items-center" id="badge">
                        <div class="w-1/3">
                            <img src="{{ Vite::image($membershipPlan.'.svg') }}" class="w-40 h-40" />
                        </div>
                        <div class="space-y-4 w-[50%]">
                            <h2 class="uppercase tracking-widest sm:text-4xl">{!! str_replace(' ', '<br/>', auth()->user()->therapist?->membershipPlan?->name) !!}</h2>
                            <div class="bg-primary text-white h-8 flex items-center px-3 relative ">
                                {{ auth()->user()->therapist?->member_id }}
                                <div class="absolute w-12 h-full -top-3 -right-5 transform rotate-45 bg-white"></div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="mt-6 text-center">
                    <a href="javascript:void(0)" class="text-primary hover:underline" id="button">Download</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/html-to-image/1.9.0/html-to-image.js'></script>
    <script>
        window.onload = function() {
            const button = document.querySelector("#button");
            const div = document.querySelector("#badge");
            button.addEventListener("click", function () {
                    htmlToImage.toPng(div)
                    .then(function (dataUrl) {
                        const a = document.createElement("a");
                        a.href = dataUrl;
                        a.download = "badge.png";
                        a.click();
                    })
                    .catch(function (error) {
                        console.error('oops, something went wrong!', error);
                    });

            });
        }

    </script>
@endpush


