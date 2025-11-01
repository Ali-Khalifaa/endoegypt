	<!--Preloader start here-->
    <div id="preloader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!--Preloader area end here-->

    <!--Header area start here-->
    <header>
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="header-top-left">
                            <ul>
                                <li><a href="mailto:innovation@mail.com">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i> innovation@mail.com</a></li>
                                <li>
                                    <img src="{{app()->getLocale() == 'ar' ? '/assets/images/flags/uae_flag.jpg' :'/website/images/logo/flag.jpg'}}" alt="Logo">
                                    <a href="#">
                                        {{app()->getLocale() == 'ar' ? __('messages.Arabic') :__('messages.English')}}
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <img src="{{app()->getLocale() == 'en' ? '/assets/images/flags/uae_flag.jpg' :'/website/images/logo/flag.jpg'}}" alt="Logo">
                                            <a href="/change-language/{{app()->getLocale() == 'ar' ? 'en' : 'ar'}}">
                                                 {{app()->getLocale() == 'en' ? __('messages.Arabic') :__('messages.English')}}
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="social-media-area">
                            <nav>
                                <ul>
                                    @if ($joinUs->facebook)
                                        <li><a href="{{$joinUs->facebook}}" target="_blank"><i class="fa fa-facebook"></i> </a></li>
                                    @endif
                                    @if ($joinUs->twitter)
                                        <li><a href="{{$joinUs->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if ($joinUs->instagram)
                                    <li><a href="{{$joinUs->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    @endif
                                    @if ($joinUs->linkedin)
                                        <li><a href="{{$joinUs->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i> </a></li>
                                    @endif
                                    @if ($joinUs->youtube)
                                        <li><a href="{{$joinUs->youtube}}" target="_blank"><i class="fa fa-youtube"></i> </a></li>
                                    @endif
                                    @if (!auth('user')->check())
                                        <li class="log"><a href="/login"><i class="fa fa-sign-in mx-1" aria-hidden="true"></i> @lang("messages.Login")</a></li>
                                        <li class="sign"><a href="/register"><span>/</span> @lang("messages.Register for the Qualification Discovery Tournament")</a></li>
                                    @else
                                        @if (auth('user')->user()->is_approved)
                                            @if(!auth('user')->user()->age_category_id)
                                                <li class="sign"><a href="/complete-register " style="border-radius: 2rem;padding: 5px 10px; border: 1px solid #000000;"> @lang("messages.Complete the registration")</a></li>
                                            @else
                                                <li class="log"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> {{auth('user')->user()->name}}</a></li>
                                            @endif
                                        @else
                                            <li class="log">
                                                <a href="#" style="border-radius: 2rem;padding: 5px 10px; border: 1px solid #000000;background-color:{{auth('user')->user()->is_approved === null ? '#ffee0a' : '#f9450d'}};">
                                                    <i  class="{{auth('user')->user()->is_approved === null ? 'fa fa-clock-o' : 'fa fa-times-circle'}}" aria-hidden="true"></i>
                                                    {{auth('user')->user()->is_approved === null ? __('messages.Waiting for approval') : __('messages.Rejected')}}
                                                </a>
                                            </li>
                                        @endif
                                        <li class="log">
                                            <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i> @lang("messages.Logout")
                                            </a>
                                            <form id="logout-form" action="{{ route('web.logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @endif

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle-area menu-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-12 col-sm-12 logo">
                        <a href="/"><img src="/assets/images/brand-logos/desktop-dark.png" alt="logo" style="height:65px"></a>
                    </div>
                    <div class="col-lg-10 col-md-12 col-sm-12 mobile-menu">
                        <div class="main-menu">
                            <a class="rs-menu-toggle"><i class="fa fa-bars"></i>@lang('messages.Menu')</a>
                            <nav class="rs-menu">
                                <ul class="nav-menu">
                                    <!-- Home -->
                                    <li class="">
                                        <a href="/">@lang("messages.homePage")</a>
                                    </li>
                                    <!-- End Home -->

                                    <li class="menu-item-has-children">
                                        <a href="#">@lang('messages.Gallery')</a>
                                        <ul class="sub-menu">
                                           <li><a href="/team-gallery">@lang('messages.Team Gallery')</a></li>
                                           <li><a href="/champion-gallery">@lang('messages.Champions Awards Gallery')</a></li>
                                        </ul>
                                    </li>



                                    <li class="menu-item-has-children">
                                        <a href="#">@lang('messages.About Us')</a>
                                        <ul class="sub-menu">
                                           <li><a href="/about-the-club">@lang('messages.About the club')</a></li>
                                           <li><a href="/about-the-championship">@lang('messages.About the championship')</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">@lang('messages.Matches & Results')</a>
                                        <ul class="sub-menu">
                                            <li> <a href="/upcoming-matches">@lang('messages.Upcoming Matches')</a></li>
                                            <li><a href="/points-table">@lang('messages.Point Table')</a></li>
                                            <li><a href="/results">@lang('messages.Matches Results')</a></li>
                                        </ul>
                                    </li>



                                    <li >
                                        <a href="/news">@lang('messages.News')</a>
                                    </li>

                                    <li><a href="/contact">@lang('messages.Contact')</a></li>
                                </ul>
                           </nav>
                          {{-- <!--Header Search Start  here-->
                            <div class="search">
                                <a class="rs-search" data-target=".search-modal" data-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                            </div>
                           <!--Header Search End  here--> --}}
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </header>
    <!--Header area end here-->
