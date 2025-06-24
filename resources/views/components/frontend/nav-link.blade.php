@props(['name', 'submenu' => false])
<li class="nav-item">
    <a {{ $attributes->merge(['class' => 'nav-link']) }}>
        {{ $name }}
        @if ($submenu)
        <svg width="10" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 1L8 8L1 1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        @endif
    </a>
    {{ $slot }}
</li>