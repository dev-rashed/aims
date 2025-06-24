<aside
    class="fixed -left-full xl:left-0 top-0 bottom-0 bg-light w-[302px] z-[9] p-6"
    :class="navIsOpen && 'left-0'"
    x-transition:enter.duration.500ms x-transition:leave.duration.400ms
>
    <div class="h-full relative">
        <div class="mb-[36px]">
            <a href="/" class="block">
                <img src="{{ uploadedFile(setting('dark_logo')) }}" class="w-64" alt="Logo" />
            </a>
        </div>

        <div>
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('dashboard') }}" @class(['aside-link', 'active' => request()->is('auth/dashboard')])>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M2 6.4C2 4.32582 2 3.28873 2.65901 2.64437C3.31802 2 4.37868 2 6.5 2C8.62132 2 9.68198 2 10.341 2.64437C11 3.28873 11 4.32582 11 6.4V8.6C11 10.6742 11 11.7112 10.341 12.3556C9.68198 13 8.62132 13 6.5 13C4.37868 13 3.31802 13 2.65901 12.3556C2 11.7112 2 10.6742 2 8.6V6.4Z" fill="currentColor"/>
                            <path d="M2 18.5C2 17.4128 2 16.8692 2.17127 16.4404C2.39963 15.8687 2.83765 15.4144 3.38896 15.1776C3.80245 15 4.32663 15 5.375 15H7.625C8.67337 15 9.19755 15 9.61104 15.1776C10.1623 15.4144 10.6004 15.8687 10.8287 16.4404C11 16.8692 11 17.4128 11 18.5C11 19.5872 11 20.1308 10.8287 20.5596C10.6004 21.1313 10.1623 21.5856 9.61104 21.8224C9.19755 22 8.67337 22 7.625 22H5.375C4.32663 22 3.80245 22 3.38896 21.8224C2.83765 21.5856 2.39963 21.1313 2.17127 20.5596C2 20.1308 2 19.5872 2 18.5Z" fill="currentColor"/>
                            <path d="M13 15.4C13 13.3258 13 12.2888 13.659 11.6444C14.3181 11 15.3787 11 17.5 11C19.6213 11 20.6819 11 21.341 11.6444C22 12.2888 22 13.3258 22 15.4V17.6C22 19.6742 22 20.7112 21.341 21.3556C20.6819 22 19.6213 22 17.5 22C15.3787 22 14.3181 22 13.659 21.3556C13 20.7112 13 19.6742 13 17.6V15.4Z" fill="currentColor"/>
                            <path d="M13 5.5C13 4.41281 13 3.86921 13.1712 3.4404C13.3996 2.86868 13.8377 2.41444 14.3889 2.17761C14.8025 2 15.3266 2 16.375 2H18.625C19.6734 2 20.1975 2 20.6111 2.17761C21.1623 2.41444 21.6004 2.86868 21.8288 3.4404C22 3.86921 22 4.41281 22 5.5C22 6.58719 22 7.13079 21.8288 7.5596C21.6004 8.13132 21.1623 8.58557 20.6111 8.82239C20.1975 9 19.6734 9 18.625 9H16.375C15.3266 9 14.8025 9 14.3889 8.82239C13.8377 8.58557 13.3996 8.13132 13.1712 7.5596C13 7.13079 13 6.58719 13 5.5Z" fill="currentColor"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.index') }}" @class(['aside-link', 'active' => request()->is('auth/profile')])>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
                            <path d="M7.5 17C9.8317 14.5578 14.1432 14.4428 16.5 17M14.4951 9.5C14.4951 10.8807 13.3742 12 11.9915 12C10.6089 12 9.48797 10.8807 9.48797 9.5C9.48797 8.11929 10.6089 7 11.9915 7C13.3742 7 14.4951 8.11929 14.4951 9.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <span>Account Details</span>
                    </a>
                </li>
                @if(auth()->user()->isPractitioner())
                    <li>
                        <a href="{{ route('directory.profile.index') }}" @class(['aside-link', 'active' => request()->is('auth/directory-profile')])>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 6.5H16.75C18.8567 6.5 19.91 6.5 20.6667 7.00559C20.9943 7.22447 21.2755 7.50572 21.4944 7.83329C21.9361 8.4943 21.9919 9.38172 21.999 11M12 6.5L11.3666 5.23313C10.8418 4.18358 10.3622 3.12712 9.19926 2.69101C8.6899 2.5 8.10802 2.5 6.94427 2.5C5.1278 2.5 4.21956 2.5 3.53806 2.88032C3.05227 3.15142 2.65142 3.55227 2.38032 4.03806C2 4.71956 2 5.6278 2 7.44427V10.5C2 15.214 2 17.5711 3.46447 19.0355C4.7646 20.3357 6.7682 20.4816 10.5 20.4979H11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M18 20.2143V21.5M18 20.2143C16.8432 20.2143 15.8241 19.6461 15.2263 18.7833M18 20.2143C19.1568 20.2143 20.1759 19.6461 20.7737 18.7833M18 13.7857C19.1569 13.7857 20.1761 14.354 20.7738 15.2169M18 13.7857C16.8431 13.7857 15.8239 14.354 15.2262 15.2169M18 13.7857V12.5M22 14.4286L20.7738 15.2169M14.0004 19.5714L15.2263 18.7833M14 14.4286L15.2262 15.2169M21.9996 19.5714L20.7737 18.7833M20.7738 15.2169C21.1273 15.7271 21.3333 16.3403 21.3333 17C21.3333 17.6597 21.1272 18.273 20.7737 18.7833M15.2262 15.2169C14.8727 15.7271 14.6667 16.3403 14.6667 17C14.6667 17.6597 14.8728 18.273 15.2263 18.7833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            <span>Directory</span>
                        </a>
                    </li>
                    @if (auth()->user()->therapist?->status == 'approved')
                        <li>
                            <a href="{{ route('members.index') }}" @class(['aside-link', 'active' => request()->is('auth/members*')])>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 9H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M14 12.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    <rect x="2" y="3" width="20" height="18" rx="5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                    <path d="M5 16C6.20831 13.4189 10.7122 13.2491 12 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.5 9C10.5 10.1046 9.60457 11 8.5 11C7.39543 11 6.5 10.1046 6.5 9C6.5 7.89543 7.39543 7 8.5 7C9.60457 7 10.5 7.89543 10.5 9Z" stroke="currentColor" stroke-width="1.5"/>
                                </svg>
                                <span>Membership</span>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->payment !== null)
                        <li>
                            <a href="{{ route('payment.index') }}" @class(['aside-link', 'active' => request()->is('auth/payment*')])>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                <span>Payments</span>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->therapist?->status == 'approved')
                        <li>
                            <a href="{{ route('certificate.index') }}" @class(['aside-link', 'active' => request()->is('auth/certificate*')])>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.5 22C7.49306 22 5.48959 22 4.2448 20.5355C3 19.0711 3 16.714 3 12C3 7.28596 3 4.92893 4.2448 3.46447C5.48959 2 7.49306 2 11.5 2C15.5069 2 17.5104 2 18.7552 3.46447C19.7572 4.64332 19.9527 6.40054 19.9908 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 8H15M8 13H11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M19.6092 18.1054C20.4521 17.4918 21 16.4974 21 15.375C21 13.511 19.489 12 17.625 12H17.375C15.511 12 14 13.511 14 15.375C14 16.4974 14.5479 17.4918 15.3908 18.1054M19.6092 18.1054C19.0523 18.5108 18.3666 18.75 17.625 18.75H17.375C16.6334 18.75 15.9477 18.5108 15.3908 18.1054M19.6092 18.1054L20.192 19.9404C20.4143 20.6403 20.5255 20.9903 20.4951 21.2082C20.4318 21.6617 20.0619 21.9984 19.6252 22C19.4154 22.0008 19.101 21.8358 18.4723 21.5059C18.2027 21.3644 18.0679 21.2936 17.93 21.252C17.649 21.1673 17.351 21.1673 17.07 21.252C16.9321 21.2936 16.7973 21.3644 16.5277 21.5059C15.899 21.8358 15.5846 22.0008 15.3748 22C14.9381 21.9984 14.5682 21.6617 14.5049 21.2082C14.4745 20.9903 14.5857 20.6403 14.808 19.9404L15.3908 18.1054" stroke="currentColor" stroke-width="1.5"/>
                                </svg>
                                <span>Certificate and Badge</span>
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>

        <div class="absolute bottom-0 py-3 px-4 w-full">
            <a href="{{ route('logout') }}" id="logout" class="bg-primary text-white py-3 px-6 flex items-center gap-x-[10px] justify-center rounded-xl font-medium text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M15 17.625C14.9264 19.4769 13.3831 21.0494 11.3156 20.9988C10.8346 20.987 10.2401 20.8194 9.05112 20.484C6.18961 19.6768 3.70555 18.3203 3.10956 15.2815C3 14.723 3 14.0944 3 12.8373V11.1627C3 9.90561 3 9.27705 3.10956 8.71846C3.70555 5.67965 6.18961 4.32316 9.05112 3.51603C10.2401 3.18064 10.8346 3.01295 11.3156 3.00119C13.3831 2.95061 14.9264 4.52307 15 6.37501" stroke="#FAFAFC" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M21 12H10M21 12C21 11.2998 19.0057 9.99153 18.5 9.5M21 12C21 12.7002 19.0057 14.0085 18.5 14.5" stroke="#FAFAFC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Logout</span>
            </a>
        </div>
    </div>
</aside>

<div
    @click="navIsOpen = false; rightbarOpen = false"
    class="fixed w-full h-full left-0 top-0 right-0 bottom-0 bg-black/50 overscroll-none z-[8]"
    x-show="navIsOpen || rightbarOpen"
    x-transition:enter.duration.500ms x-transition:leave.duration.400ms
></div>
