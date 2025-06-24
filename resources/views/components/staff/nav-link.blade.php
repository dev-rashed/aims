@props([
    'name',
    'url' => null,
    'icon' => null,
    'startUrl',
    'items' => []
])

<li @class(['mm-active' => Request::is($startUrl)])>
    <a href="{{ $url != null ? $url : 'javascript:;'}}" @class(['has-arrow' => $url == null])>
        <div class="parent-icon">
            <i class="bx {{ $icon }}"></i>
        </div>
        <div class="menu-title text-capitalize">{{ $name }}</div>
    </a>
    @if (count($items) > 0)
        <ul>
            @foreach ($items as $item)
                @isset($item['permission'])
                    @can($item['permission'])
                        <li @class(['mm-active' => Request::is($item['startUrl'])])>
                            <a href="{{ $item['url'] }}" class="text-capitalize">
                                <i class="bx bx-right-arrow-alt"></i>
                                {{ $item['name'] }}
                            </a>
                        </li>
                    @endcan
                @else
                    <li @class(['mm-active' => Request::is($item['startUrl'])])>
                        <a href="{{ $item['url'] }}" class="text-capitalize">
                            <i class="bx bx-right-arrow-alt"></i>
                            {{ $item['name'] }}
                        </a>
                    </li>
                @endisset
                
            @endforeach
            
        </ul>
    @endif
</li>
