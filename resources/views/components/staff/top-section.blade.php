@props([
    'page_name' => null,
])

<!-- START CONTAINER -->
<div class="page-container row-fluid container-fluid">

    <!-- START CONTENT -->
    <section id="main-content" class=" ">
        <div class="wrapper main-wrapper row" style=''>

            <div class="col-xs-12">
                <!-- START TOPBAR -->
                <div class='page-topbar gradient-blue1'>
                    <div class='quick-area'>
                        <div class="pull-left hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="/" class="text-decoration-none">
                                        <i class="fa fa-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard') }}" class="text-decoration-none">
                                        Dashboard
                                    </a>
                                </li>
                                @if ($page_name !== null)
                                    <li class="active">
                                        <span>{{ $page_name }}</span>
                                    </li>
                                @endif
                            </ol>
                        </div>


                        <div class='pull-right'>
                            <ul class="info-menu right-links list-inline list-unstyled">

                                <li class="profile">
                                    <a href="#" data-toggle="dropdown" class="toggle">
                                        <img src="{{ uploadedFile(auth()->user()->avatar) }}"
                                            alt="{{ auth()->user()->full_name }}" class="img-circle img-inline">
                                        <span>{{ auth()->user()->name }}<i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu profile animated fadeIn">
                                        <li>
                                            <a href="{{ route('profile.index') }}">
                                                <i class="fa fa-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('profile.password.index') }}">
                                                <i class="fa fa-wrench"></i> Update Password
                                            </a>
                                        </li>
                                        <li class="last">
                                            <a href="{{ route('logout') }}" id="logout">
                                                <i class="fa fa-lock"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- END TOPBAR -->
            </div>

            <div class="clearfix"></div>
