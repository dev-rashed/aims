@extends('layouts.user.app')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-6">
        <div
            class="bg-[#E1F7FF] rounded-2xl p-6 bg-[url('/resources/images/welcome-small.png')] xl:bg-[url('/resources/images/welcome-large.png')] bg-center bg-no-repeat bg-cover h-80"
        >
            <h1 class="text-black mb-3 text-base xl:text-4xl">Welcome {{ auth()->user()->full_name }}!</h1>

            @if(auth()->user()->isPractitioner())
                <div>
                    <p>Membership: {{ auth()->user()->therapist?->membershipPlan?->name }}</p>
                    <p>Payment: {{ ucfirst(auth()->user()->therapist?->membership_type) }}</p>
                    @if (auth()->user()->expireDateDiff() && !empty(auth()->user()->therapist?->membership_expire))
                        <p>Expire at: {{ date('jS F Y', strtotime(auth()->user()->therapist?->membership_expire)) }}</p>
                    @endif
                    @php($payment = nextPayment())
                    @if (gettype($payment) == 'string')
                        <p>{!! $payment !!}</p>
                    @endif
                </div>
            @endif
        </div>

        @if(auth()->user()->isPractitioner())
            <div class="grid grid-cols-1 2xl:grid-cols-3 gap-4">

                <div class="bg-light rounded-2xl p-6 col-span-1 order-2">
                    @if ($data->totalVisitors > 0)
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h5>Profile Visitors From Various Countries</h5>
                                <div>

                                </div>
                            </div>
                            <div class="content-body pb0">
                                <div class="row">
                                    <div class="col-xs-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 mb-20">
                                        <canvas id="donut-chartjs" width="400" height="400"></canvas>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                        @foreach ($data->countryWiseVisitors as $key => $country)
                                            <div class="bg-white shadow p-4 border-l-4" style="border-color: {{ $country->color }}">
                                                <div class="token-info">
                                                    <div class="info-wrapper one">
                                                        <div class="token-descr">
                                                            <h3 class="bold mt-0 mb-0">{{ $country->visitor }}%</h3>
                                                            {{ $country->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="bg-light rounded-2xl p-6 col-span-2 order-1">
                    @if (array_sum($data->monthData) > 0)
                        <div>
                            <div class="flex items-center justify-between">
                                <h5>Monthly Profile Visitor Rate</h5>
                                {{-- <div>
                                    <form action="{{ route('dashboard') }}" method="get">
                                        <div class="flex items-center">
                                            <input type="month" class="form-control rounded-none mt-0 bg-white" name="month" value="{{ request()->get('month') }}">
                                            <button class="bg-primary py-3 px-5 text-white">Submit</button>
                                        </div>
                                    </form>
                                </div> --}}
                            </div>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div><canvas id="line-chartjs"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        @endif

    </div>
@endsection

@push('script')
    <script src="{{ asset('build/assets/user/plugins/chartjs-chart/Chart.min.js') }}"></script>
    <script src="{{ asset('build/assets/user/js/chart-chartjs.js') }}"></script>

    @if (auth()->user()->isPractitioner())
        <script>
            window.countryWiseVisitors = @json($data->countryWiseVisitors);
            window.daysData = @json($data->days);
            window.monthData = @json($data->monthData);
        </script>
    @endif

@endpush




































{{-- @extends('layouts.frontend.auth.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body text-center">
                    <h4 class="mb-0 text-info">Welcome {{ auth()->user()->full_name }}</h4>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@endsection --}}
