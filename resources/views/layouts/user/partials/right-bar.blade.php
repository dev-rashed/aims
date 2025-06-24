<aside
    class="fixed top-0 bottom-0 -right-full xl:right-0 bg-light w-[302px] p-6 z-[9] overflow-auto"
    :class="rightbarOpen && 'right-0'"
    x-transition:enter.duration.500ms x-transition:leave.duration.400ms
>
    <div class="h-full relative">
        <div class="mb-10">
            <h3>My Profile</h3>
            {{-- <p class="text-orange">70% Progress</p> --}}
        </div>
        <div>
            <div class="relative mb-20">
                <img src="{{ Vite::image('cover.png') }}" class="w-full h-24 rounded-xl object-cover" alt="" srcset="">
                <div class="w-28 h-28 absolute translate left-[50%] bottom-[-110px]">
                    @if (empty(auth()->user()->avatar))
                        <div class="w-full h-full bg-light rounded-full border flex items-center justify-center text-4xl text-primary">{{ avatarText(auth()->user()->full_name) }}</div>
                    @else
                        <img src="{{ uploadedFile(auth()->user()->avatar) }}" class="w-full h-full rounded-full border-4 border-white bg-contain shadow-[0px_6px_20px_0px_rgba(48,124,150,0.24)]" alt="" srcset="">
                    @endif
                </div>
            </div>
            <div class="space-y-4">
                <div class="text-center space-y-2">
                    <h4>{{ auth()->user()->full_name }}</h4>
                    <p class="text-dark">{{ auth()->user()->therapist?->degree }}</p>
                    <p class="text-dark">{{ auth()->user()->email }}</p>
                </div>
                <div class="flex items-center justify-center gap-x-4">
                    @if (in_array(gettype(auth()->user()->therapist?->online_platforms), ['array','object']))
                        @foreach (auth()->user()->therapist?->online_platforms as $online_platform)
                            @php
                                $platform = DB::table('online_platforms')->where('id', $online_platform->id)->first();
                            @endphp
                            @if ($platform)
                                <a href="{{ $online_platform->url }}" target="_blank">
                                    <img src="{{ uploadedFile($platform->image) }}" alt="{{ $online_platform->name }}" srcset="{{ uploadedFile($platform->image) }}" width="20px" />
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        @if (auth()->user()->therapist?->status == 'approved')
            <div class="mt-12">
                <h5>Status</h3>
                <div class="flex mt-2 gap-x-[10px]">
                    <div class="bg-primary p-[10px] rounded-xl w-12 h-12 flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M14 9H18" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M14 12.5H17" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M17 3H7C4.23858 3 2 5.23858 2 8V16C2 18.7614 4.23858 21 7 21H17C19.7614 21 22 18.7614 22 16V8C22 5.23858 19.7614 3 17 3Z" stroke="white" stroke-width="1.5" stroke-linejoin="round"/>
                            <path d="M5 16C6.20831 13.4189 10.7122 13.2491 12 16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.5 9C10.5 10.1046 9.60457 11 8.5 11C7.39543 11 6.5 10.1046 6.5 9C6.5 7.89543 7.39543 7 8.5 7C9.60457 7 10.5 7.89543 10.5 9Z" stroke="white" stroke-width="1.5"/>
                        </svg>
                    </div>

                    <div>
                        <p class="font-medium">{{ auth()->user()->therapist?->membershipPlan?->name }}</p>
                        <p class="text-orange">Active</p>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h5>Membership Type</h5>
                <div class="mt-2">
                    <label class="inline-flex items-center cursor-pointer">
                        <span class="me-2 text-sm font-medium" :class="!$refs.renew.checked && 'text-primary'" id="manual">Manual</span>
                        <input type="checkbox" name="auto_renew" id="auto_renew" class="sr-only peer" x-ref="renew" data-url="{{ route('profile.renew.type') }}" @checked(auth()->user()->therapist->auto_renew)>
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-0 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                        <span class="ms-2 text-sm font-medium" :class="$refs.renew.checked && 'text-primary'" id="auto">Auto Renew</span>
                    </label>
                </div>
            </div>
        @endif

    </div>
</aside>
