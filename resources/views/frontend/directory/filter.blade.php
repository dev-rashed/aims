<form id="filterTherapist" action="{{ route('directory.filter') }}" method="get">

    <div class="filter-area border-0">
        <label for="location" class="fs-5 text-gray-900 fw-bold">Currency</label>
        <select id="currencySwitch" class="form-select select2-select">
            @php($sCurrency = session()->get('currency'))
            @foreach (DB::table('currencies')->get() as $currency)
                <option value="{{ $currency->id }}" @selected($sCurrency->id == $currency->id)>{{ $currency->name }} {{ $currency->symbol }}</option>
            @endforeach
        </select>

        {{-- <div class="dropdown me-2">
            <button class="btn btn-primary dropdown-toggle" type="button" id="currencyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                @php($currency = session()->get('currency'))
                {{ $currency->code }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="currencyDropdown">
                @foreach (DB::table('currencies')->get() as $currency)
                    <li><a class="dropdown-item" href="{{ route('currency.index', $currency->id) }}">{{ $currency->name }}</a></li>
                @endforeach
            </ul>
        </div> --}}
    </div>

    <div class="filter-area border-0">
        <label for="location" class="fs-5 text-gray-900 fw-bold">Location</label>
        <div class="form-group">
            <img src="{{ asset('build/assets/frontend/images/icons/search.png') }}" class="input-icon" alt="search" />
            <input type="text" name="location" id="location" class="form-control" placeholder="Enter your postcode, location or county" value="{{ request()->has('location') ? request()->get('location') : '' }}" autocomplete="off" />
            <button type="submit" class="btn btn-search">
                <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 2C4.68629 2 2 4.68629 2 8C2 11.3137 4.68629 14 8 14C11.3137 14 14 11.3137 14 8C14 4.68629 11.3137 2 8 2ZM0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8C16 9.84871 15.3729 11.551 14.3199 12.9056L19.7071 18.2929C20.0976 18.6834 20.0976 19.3166 19.7071 19.7071C19.3166 20.0976 18.6834 20.0976 18.2929 19.7071L12.9056 14.3199C11.551 15.3729 9.84871 16 8 16C3.58172 16 0 12.4183 0 8Z" fill="#0D0D0D"/>
                </svg>
            </button>
            <div class="post-codes"></div>
        </div>
    </div>

    <div class="filter-area border-0">
        <div class="d-flex mb-3">
            <label for="distance" class="distance-label">Within</label>
            <input type="number" name="distance" id="distance" class="distance" value="{{ request()->has('distance') ? request()->get('distance') : 5 }}" />
            <label for="distance" class="distance-label">miles</label>
        </div>
        <div id="distance-slider" class="mx-1"></div>
    </div>

    <x-frontend.filter-area :data="$data['professions']" name="professions" title="Profession or type of group" />
    <x-frontend.filter-area :data="$data['sessions']" name="sessions" title="Type of session" />
    <x-frontend.filter-area :data="$data['languages']" name="languages" title="Languages" />
    <x-frontend.filter-area :data="$data['accessibilities']" name="accessibilities" title="Accessibility" />
    <x-frontend.filter-area :data="$data['concessions']" name="concessions" title="Concession" />
    <x-frontend.filter-area :data="$data['formats']" name="formats" title="Format" />

    @php($currency = session()->get('currency'))

    <div class="filter-area border-0">
        <h5 class="fs-5 text-gray-900 fw-bold">Price Range</h5>

        <div class="price-input text-dark">

            <div class="field">
                <span>Min</span>
                <div class="currency">{{ $currency->symbol }}</div>
                <input type="number" id="min_price" name="min_price" class="input-min" value="1" placeholder="{{ $currency->symbol }}" />
            </div>

            <div class="separator">-</div>

            <div class="field">
                <span>Max</span>
                <div class="currency currency-max">{{ $currency->symbol }}</div>
                <input type="number" id="max_price" name="max_price" class="input-max" value="500" placeholder="{{ $currency->symbol }}" />
            </div>

        </div>

        <div id="price-slider" class="ms-1 me-2"></div>

        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-primary bg-primary-500 border-primary-500">Apply</button>
        </div>
    </div>
</form>
