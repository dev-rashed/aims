<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu">
                <i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
                {{-- <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search...">
                    <span class="position-absolute top-50 search-show translate-middle-y">
                        <i class='bx bx-search'></i>
                    </span>
                    <span class="position-absolute top-50 search-close translate-middle-y">
                        <i class='bx bx-x'></i>
                    </span>
                </div> --}}
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    {{-- <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#">
                            <i class='bx bx-search'></i>
                        </a>
                    </li> --}}
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-category'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="row row-cols-3 g-3 p-3">
                                <div class="col text-center">
                                    <a href="/" target="_blank" rel="noopener noreferrer">
                                        <div class="app-box mx-auto bg-gradient-cosmic text-white">
                                            <i class='bx bx-world'></i>
                                        </div>
                                        <div class="app-title text-dark">Website</div>
                                    </a>
                                </div>
                                <div class="col text-center">
                                    <a href="{{ route('staff.application.index') }}">
                                        <div class="app-box mx-auto bg-gradient-burning text-white">
                                            <i class='bx bxs-file-plus'></i>
                                        </div>
                                        <div class="app-title text-dark">Application</div>
                                    </a>
                                </div>
                                <div class="col text-center">
                                    <a href="{{ route('staff.course.index') }}">
                                        <div class="app-box mx-auto bg-gradient-lush text-white">
                                            <i class='bx bx-book-alt'></i>
                                        </div>
                                        <div class="app-title text-dark">Courses</div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </li>
                    @php
                        $applications = \App\Models\Therapist::with('user:id,first_name,last_name,avatar,email')->where('status', 'review')->where('is_seen', false)->latest('id')->get(['id', 'practitioner_id', 'created_at']);
                        $enrolls = \App\Models\Enroll::with('user:id,first_name,last_name,avatar,email')->whereDate('created_at', date('Y-m-d'))->where('is_seen', false)->latest('id')->get(['id', 'user_id', 'invoice', 'created_at']);
                        $renews = \App\Models\Renew::with('user:id,first_name,last_name,avatar,email')->where('is_seen', false)->latest('id')->get();
                    @endphp
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="alert-count">{{ $applications->count() > 9 ? '9+' : $applications->count() }}</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">New Application</p>
                                    <p class="msg-header-clear ms-auto text-danger">{{ $applications->count() }}</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                @forelse ($applications as $application)
                                    <a class="dropdown-item" href="{{ route('staff.application.update', $application->id) }}">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="{{ uploadedFile($application->user?->avatar) }}" class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">
                                                    {{ $application->user?->full_name }}
                                                    <span class="msg-time float-end">
                                                        {{ $application->created_at->diffForHumans() }}
                                                    </span>
                                                </h6>
                                                <p class="msg-info">{{ $application->user?->email }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @empty

                                @endforelse
                            </div>
                            <a href="{{ route('staff.application.index') }}">
                                <div class="text-center msg-footer">View All New Application</div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="alert-count">{{ $enrolls->count() > 9 ? '9+' : $enrolls->count() }}</span>
                            <i class='bx bx-notification'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Today Enrolls</p>
                                    <p class="msg-header-clear ms-auto text-danger">{{ $enrolls->count() }}</p>
                                </div>
                            </a>
                            <div class="header-message-list">
                                @forelse ($enrolls as $enroll)
                                    <a class="dropdown-item" href="{{ route('staff.enroll.show', $enroll->id) }}">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="{{ uploadedFile($enroll->user->avatar) }}" class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">
                                                    {{ $enroll->user?->full_name }}
                                                    <span class="msg-time float-end">
                                                        {{ $enroll->created_at->diffForHumans() }}
                                                    </span>
                                                </h6>
                                                <p class="msg-info">{{ $enroll->user->email }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @empty

                                @endforelse

                            </div>
                            <a href="{{ route('staff.enroll.index') }}">
                                <div class="text-center msg-footer">View All Enroll</div>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="alert-count">{{ $renews->count() > 9 ? '9+' : $renews->count() }}</span>
                            <i class='bx bx-line-chart'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Pending Renews</p>
                                    <p class="msg-header-clear ms-auto text-danger">{{ $renews->count() }}</p>
                                </div>
                            </a>
                            <div class="header-message-list header-renews-list">
                                @forelse ($renews as $renew)
                                    <a class="dropdown-item" href="{{ route('staff.renew.show', $renew->id) }}">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="{{ uploadedFile($renew->user?->avatar) }}" class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">
                                                    {{ $renew->user?->full_name }}
                                                    <span class="msg-time float-end">
                                                        {{ $renew->created_at->diffForHumans() }}
                                                    </span>
                                                </h6>
                                                <p class="msg-info">{{ $renew->user?->email }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @empty

                                @endforelse

                            </div>
                            <a href="{{ route('staff.renew.index') }}">
                                <div class="text-center msg-footer">View All Renews</div>
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ uploadedFile(auth('staff')->user()->image) }}" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{ auth('staff')->user()->name }}</p>
                        <p class="designattion mb-0">{{ auth('staff')->user()->email }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('staff.profile.index') }}">
                            <i class="bx bx-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('staff.profile.password.index') }}">
                            <i class="bx bx-key"></i>
                            <span>Update Password</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('staff.setting.index') }}">
                            <i class="bx bx-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('staff.dashboard') }}">
                            <i class='bx bx-home-circle'></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('staff.logout') }}" id="logout">
                            <i class='bx bx-log-out-circle'></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
