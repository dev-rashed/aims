@props(['plan', 'package'])
<style>
    .membership-section .membership-plan .card-header div {
        position: relative;
        top: 0px;
    }
</style>
<div class="card border-0 rounded-5 h-100">
    <div class="card-header border-0 p-4 rounded-5" style="background-color: {{ $plan->color }}">
        <div class="text-center">
            <img src="{{ asset($plan->icon) }}" alt="">
        </div>
        <div class="mb-3 text-center">
            <p class="card-title text-capitalize text-white mt-4" style="font-size: 22px;">{{ $plan->name }}</p>
            <p class="fs-14 text-white">{{ $plan->title }}</p>
        </div>
        {{-- <p class="fs-22 fw-bold text-black mb-0">{{ $plan->name }}</p> --}}

        {{-- <h1 class="fs-1 fw-bold text-primary-900 mb-0">
            <del>{{ convertAmount($package == 'monthly' ? $plan->monthly_price : $plan->yearly_price) }}</del>
        </h1>
        <h3 class="fs-3 fw-bold text-primary-900 mb-0">{{ convertAmount(0) }}</h3> --}}
    </div>
    <div class="card-body text-gray-500 p-4">
        <div class="mt-3">
            <p class="fw-medium">{{ $plan->description }}</p>
            {{-- <div>{{ $plan->description }}</div> --}}

            <div class="des__area">
                <h1 class="fs-1 text-primary-500">
                    <del>{{ convertAmount($package == 'monthly' ? $plan->monthly_price : $plan->yearly_price) }}</del>
                </h1>
                <p>Free Now</p>
                <h5 class="fs-5 text-uppercase my-4">Per {{ $package == 'monthly' ? 'Month' : 'Year' }}</h5>
                <a href="{{ route('membership.show', ['slug' => $plan->slug, 'type' => $package]) }}"
                    class="btn">Join</a>
            </div>

        </div>
    </div>
    {{-- <div class="card-footer bg-transparent border-0 text-center mb-3">
        <a href="{{ route('membership.show', ['slug' => $plan->slug, 'type' => $package]) }}" class="btn bg-primary-500 rounded-10 px-5 text-white">Sign Up</a>
    </div> --}}
</div>
