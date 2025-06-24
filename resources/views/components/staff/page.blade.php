@props(['title' => null, 'column' => 'col-12'])

<div class="row">
    <div @class([$column])>

        <div {{ $attributes->merge(['class' => 'card']) }}>

            @if ($title != null || !isset($header))
                <div class="card-header p-4 d-flex flex-column flex-sm-row justify-content-between gap-2">
                    <h3 class="card-title mb-0 fs-3 text-capitalize">{{ $title ?? '' }}</h3>
                    <div>
                        {{ $header ?? '' }}
                    </div>
                </div>
            @endif

            <div class="card-body">
                {{ $slot }}
            </div>

        </div>

    </div>
</div>
