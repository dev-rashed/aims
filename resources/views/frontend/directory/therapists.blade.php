<div>
    @if (!empty(request()->get('location')))
        <h3 class="fs-3 fw-bold">Islamic Health Specialists in and near {{ request()->get('location') }}</h3>
        @if (!empty(request()->get('distance')))
            <p class="fs-14">
                <span class="fw-bold">{{ $therapists->total() }}</span>
                results within {{ request()->get('distance') }} miles
            </p>
        @endif
    @endif

</div>

@forelse ($therapists as $therapist)
    <x-frontend.therapist-card :therapist="$therapist" />
@empty
    <div class="card border-0 shadow-sm rounded-10 py-3 px-2 mb-3">
        <div class="card-body text-center">
            <h5 class="fs-5">Counsellors and Therapists in and near</h5>
        </div>
    </div>
@endforelse

{{ $therapists->withQueryString()->links() }}
