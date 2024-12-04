<div class="row justify-content-center">
    <div class="col-md-11 col-11">
        <div class="row justify-content-between">
            @if (Auth::user()->roles()->where('name', 'admin')->exists())
                <div class="col-md-2 col-2">
                    <a href="">
                        <img src="{{ asset('web_image/logo_2.png') }}" alt="" style="height:150px !important; width:150px !important;">
                    </a>
                </div>
                <div class="col-md-9 col-9 d-flex align-items-center justify-content-end p-2">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn_menu {{ Request::is('admin/dashboard') ? 'btn_active' : '' }}">HOME</a>
                    <a href="{{ route('admin.request_list') }}" class="btn btn_menu {{ Request::is('admin/request_list') || Request::is('admin/view_request_details/*') ? 'btn_active' : '' }}">REQUEST</a>
                    <a href="{{ route('admin.offer_list') }}" class="btn btn_menu {{ Request::is('admin/offer_list') ? 'btn_active' : '' }}">OFFER</a>
                    <a href="{{ route('admin.donation_list') }}" class="btn btn_menu {{ Request::is('admin/donation_list') || Request::is('admin/view_collab_details/*') ? 'btn_active' : '' }}">DONATION</a>
                    <a href="{{ route('admin.registered_user_list') }}" class="btn btn_menu {{ Request::is('admin/registered_user_list') ? 'btn_active' : '' }}">USER</a>
                </div>
            @else
                <div class="col-md-2 col-2">
                    <a href="{{ route('user.dashboard') }}">
                        <img src="{{ asset('web_image/logo_2.png') }}" alt="" style="height:150px !important; width:150px !important;">
                    </a>
                </div>
                <div class="col-md-9 col-9 d-flex align-items-center justify-content-end p-2">
                    <a href="{{ route('user.dashboard') }}" class="btn btn_menu {{ Request::is('user/dashboard') ? 'btn_active' : '' }} {{ Request::is('user/request_help') || Request::is('user/request_help_category/*') || Request::is('user/request_submitted') || Request::is('user/offer_help/*') || Request::is('user/offer_help_type/*/*') || Request::is('user/offer_submitted') ? 'btn_menu_white' : '' }}">HOME</a>
                    <a href="{{ route('user.about_us') }}" class="btn btn_menu {{ Request::is('user/about-us') ? 'btn_active' : '' }} {{ Request::is('user/request_help') || Request::is('user/request_help_category/*') || Request::is('user/request_submitted') || Request::is('user/offer_help/*') || Request::is('user/offer_help_type/*/*') || Request::is('user/offer_submitted') ? 'btn_menu_white' : '' }}">ABOUT US</a>
                    <a href="{{ route('user.map') }}" class="btn btn_menu {{ Request::is('user/map') || Request::is('user/request_help') || Request::is('user/request_help_category/*') || Request::is('user/request_submitted') || Request::is('user/offer_help/*') || Request::is('user/offer_help_type/*/*') || Request::is('user/offer_submitted') ? 'btn_active' : '' }} {{ Request::is('user/request_help') || Request::is('user/request_help_category/*') || Request::is('user/request_submitted') || Request::is('user/offer_help/*') || Request::is('user/offer_help_type/*/*') || Request::is('user/offer_submitted') ? 'btn_menu_white' : '' }}">MAP</a>
                    <a href="{{ route('user.browse_request') }}" class="btn btn_menu {{ Request::is('user/browse-request') ? 'btn_active' : '' }} {{ Request::is('user/request_help') || Request::is('user/request_help_category/*') || Request::is('user/request_submitted') || Request::is('user/offer_help/*') || Request::is('user/offer_help_type/*/*') || Request::is('user/offer_submitted') ? 'btn_menu_white' : '' }}">BROWSE REQUEST</a>
                    <a href="{{ route('user.donation') }}" class="btn btn_menu {{ Request::is('user/donation') || Request::is('user/collaboration_form') || Request::is('user/collab_donation_details/*') ? 'btn_active' : '' }} {{ Request::is('user/request_help') || Request::is('user/request_help_category/*') || Request::is('user/request_submitted') || Request::is('user/offer_help/*') || Request::is('user/offer_help_type/*/*') || Request::is('user/offer_submitted') ? 'btn_menu_white' : '' }}">DONATION</a>
                </div>
            @endif
            <div class="col-md-1 col-1 p-2 d-flex align-items-center justify-content-end">
                @auth
                    <div class="dropdown">
                        <button class="btn dropdown-toggle no-toggle-icon" type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user fa-2xl {{ Request::is('user/request_help') || Request::is('user/request_help_category/*') || Request::is('user/request_submitted') || Request::is('user/offer_help/*') || Request::is('user/offer_help_type/*/*') || Request::is('user/offer_submitted') ? 'icon-white' : 'icon-default' }} {{ Request::is('profile_view') || Request::is('profile') || Request::is('change_password') || Request::is('user/main_listing') ? 'btn-icon-active' : '' }}"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->roles()->where('name', 'user')->exists())
                                <a class="dropdown-item" href="{{ route('profile.view') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('user.main_listing') }}">Request/Offer/Collab</a>
                            @else
                                <a class="dropdown-item" href="{{ route('profile.user_change_password') }}">Change Password</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="dropdown">
                        <button class="btn dropdown-toggle no-toggle-icon" type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user fa-2xl {{ Request::is('user/request_help') || Request::is('user/request_help_category/*') || Request::is('user/request_submitted') || Request::is('user/offer_help/*') || Request::is('user/offer_help_type/*/*') || Request::is('user/offer_submitted') ? 'icon-white' : 'icon-default' }}"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>

