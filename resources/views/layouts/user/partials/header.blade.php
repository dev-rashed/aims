<header class="xl:mx-[302px] p-6 bg-light xl:bg-white">
    <div class="flex xl:hidden items-center justify-between">
        <button class="border p-3 rounded-full border-[#999]" @click="navIsOpen = !navIsOpen">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path d="M2.66675 3.33334H13.3334" stroke="#131313" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2.66675 8H13.3334" stroke="#131313" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2.66675 12.6667H13.3334" stroke="#131313" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <h3 class="text-black">@yield('title')</h3>
        <div @click="rightbarOpen = !rightbarOpen">
            <img src="{{ uploadedFile(auth()->user()->avatar) }}" class="w-10 h-10 rounded-full border border-white object-cover shadow-[0px_6px_20px_0px_rgba(48,124,150,0.24)]" alt="" srcset="">
        </div>
    </div>
    <div class="hidden xl:flex justify-between items-center">
        <div>
            <h3 class="text-black">@yield('title')</h3>
            <p class="text-dark">{{ date('D, d F Y ') }}</p>
        </div>
        @if(auth()->user()->isPractitioner())
            <div>
                <a href="{{ route('neurologist.details', auth()->user()->username) }}" target="_blank" class="bg-primary rounded-xl py-3 px-5 text-white font-semibold">View Profile</a>
            </div>
        @endif
    </div>
</header>
