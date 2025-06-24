@props(['data', 'name', 'title'])

<div class="filter-area">
    <h5 class="fs-5 text-gray-900 fw-bold">{{ $title }}</h5>
    <div class="mt-3">
        <ul class="list-unstyled">
            @foreach ($data as $key => $item)
                <li class="mb-2">
                    <div class="form-check">
                        @php $for = $name.'['.$item->slug.']'.rand(); @endphp
                        <input
                            name="{{ $name }}[]"
                            id="{{ $for }}"
                            value="{{ $item->slug }}"
                            type="checkbox"
                            class="form-check-input"
                            @checked(request()->has($name) && in_array($item->slug, request()->get($name)) ? true : false)
                        />
                        <label
                            class="form-check-label text-gray-600 fw-medium fs-14"
                            for="{{ $for }}"
                        >
                            {{ $item->name }}
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
