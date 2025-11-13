@extends('website.layouts.layoutPage')
@section('pageTitle', __('messages.HomePage'))
@section('body')



    <!-- Theme Main Banner ____________________________ -->
    <section>
        <div id="theme-main-banner" style="height:800px">
            <div data-src="{{ $bannerVideo->image ?? '' }}" style="height:800px;position: relative;">
                <div class="camera_caption">
                    <div class="container text-center">
                        <video autoplay muted loop playsinline preload="auto"
                            style="width:100%;height:800px;object-fit:cover;box-shadow:26px 12px 20px rgb(50 44 44 / 28%)">
                            <source src="{{ $bannerVideo->image }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>

            {{-- @foreach ($banners ?? [] as $banner)
                @php
                    $title = $banner->current_translation?->title ?? '';
                    $description = $banner->current_translation?->description ?? '';
                    $image = $banner->image ?? '';
                @endphp

                <div data-src="{{ $image ? asset($image) : '' }}">
                    <div class="camera_caption">
                        <div class="container text-center">
                            <h1 class="wow fadeInUp animated" data-wow-delay="0.1s">{{ $title }}</h1>
                            @if ($description)
                                <h6 class="wow fadeInUp animated" data-wow-delay="0.4s">{{ $description }}</h6>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach --}}
        </div> <!-- /#theme-main-banner -->
    </section>


    <!-- Children Care List  _________________________________ -->
    <section class="Children-Care-list-margin" style="margin-top:70px">
        <div class="container">
              <div class="Theme-title text-center" style="margin-bottom:40px">
                <h2>@lang('messages.Our Values')</h2>
            </div> <!-- /.Theme-title -->
            <div class="Children-Care-list">
                <div id="Children-Care-List-Slider" class="owl-carousel owl-theme">
                    @foreach ($features as $feature)
                        <div class="item">
                            <div class="text-center list-item">
                                <img src="{{$feature->image}}" alt="feature" style="width: 76px;height: 76px;margin: 20px auto;">
                                {{-- <i class="flaticon-handshake"></i> --}}
                                <h6 style="margin-top:25px"><a href="#">{{ $feature->current_translation?->title }}</a></h6>
                            </div> <!-- /.list-item -->
                        </div> <!-- /.item -->
                    @endforeach


                </div> <!-- / #Children-Care-List-Slider -->
            </div> <!-- /.Children-Care-list -->
        </div> <!-- /.container -->
    </section> <!-- /.Children-Care-list-margin -->

    <!-- Banner Bottom Section _________________________________ -->
    <section class="banner-bottom-section">
        <div class="opact-div">
            <div class="container">
                <div class="row">
                    <div class="we-are-innovators">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="innovators-text">
                                    <h3 style="color:#fff">{{ $aboutUs->current_translation?->title }}</h3>
                                    <div style="color:#fff!important" class="about-description">
                                        {!! $aboutUs->current_translation?->description !!}
                                    </div>
                                </div> <!-- /.innovators-text -->
                            </div> <!-- /.col -->
                            <div class="col-md-6 col-xs-12">
                                <div class="innovators-img" style="padding:0 20px"><img src="{{ $aboutUs->image }}"
                                        style="width: 100%;height:510px;border-radius: 20px;" alt="image"></div>
                                <!-- /.innovators-img -->
                            </div> <!-- /.col -->
                        </div> <!-- /.row -->
                    </div> <!-- /.we-are-innovators -->

                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.opact-div -->
    </section> <!-- /.banner-bottom-section -->

    <section class="Team-Pages">
        <div class="container">
            <div class="Theme-title text-center">
                <h2>@lang('messages.Organizing Committees')</h2>
                <h6>@lang('messages.Our Team')</h6>
            </div> <!-- /.Theme-title -->
            <div class="row" style="display: flex;flex-wrap:wrap">

                @foreach ($organizingCommittees as $member)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Our-Team-Item">
                            <div class="Team-Img"><img src="{{ $member->image }}" style="height:360px;width:400px"
                                    alt="{{ $member->current_translation?->title }}"></div>
                            <!-- /.Team-Img -->
                            <div class="Team-Text">
                                <h5>
                                    {{ $member->current_translation?->title }}
                                </h5>
                                <h6>
                                    ({{ $member->job }})
                                </h6>
                                @php
                                    $full = $member->current_translation?->description ?? '';
                                    $plain = strip_tags($full);
                                    $truncated = \Illuminate\Support\Str::words($plain, 15, '...');
                                    $mid = $member->id ?? uniqid();
                                @endphp

                                <div>
                                    <span id="preview-{{ $mid }}">
                                        {{ $truncated }}
                                        @if ($truncated !== $plain)
                                            <a href="javascript:void(0)" id="toggle-{{ $mid }}"
                                                onclick="toggleRead('{{ $mid }}')"> ... @lang('messages.Read more')</a>
                                        @endif
                                    </span>

                                    <span id="full-{{ $mid }}" style="display:none;">
                                        {!! $full !!}
                                        <a href="javascript:void(0)" onclick="toggleRead('{{ $mid }}')">
                                            @lang('messages.Read less')</a>
                                    </span>
                                </div>

                                <script>
                                    function toggleRead(id) {
                                        var p = document.getElementById('preview-' + id);
                                        var f = document.getElementById('full-' + id);
                                        if (!p || !f) return;
                                        if (f.style.display === 'none') {
                                            f.style.display = 'inline';
                                            p.style.display = 'none';
                                        } else {
                                            f.style.display = 'none';
                                            p.style.display = 'inline';
                                        }
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

    <!-- Company History _________________________________ -->
    <section class="company-history-section">
        <div class="company-history-shape-img-top"><img src="/images/shape/shape-1.png" alt="shape-img"></div>
        <!-- /.company-history-shape-img-top -->
        <div class="company-history-containt-opact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-xs-6 history-item-weight">
                        <div class="clear-fix">
                            <div class="history-item item-one">
                                <div>
                                    {{-- <i class="flaticon-donate"></i> --}}
                                    <p>{{ $counters[0]?->current_translation?->title }}</p>
                                    <h2><span class="timer" data-from="0" data-to="{{ $counters[0]?->counter }}"
                                            data-speed="2000" data-refresh-interval="5">{{ $counters[0]?->counter }}</span>
                                    </h2>
                                </div>
                            </div> <!-- /.history-item -->
                        </div> <!-- /.clear-fix -->
                    </div> <!-- /.col -->
                    <div class="col-lg-3 col-xs-6 history-item-weight">
                        <div class="clear-fix">
                            <div class="history-item item-two">
                                <div>
                                    {{-- <i class="flaticon-group"></i> --}}
                                    <p>@lang('messages.Volunteer')</p>
                                    <h2><span class="timer" data-from="0" data-to="{{ $counters[1]?->counter }}"
                                            data-speed="2000"
                                            data-refresh-interval="5">{{ $counters[1]?->current_translation?->title }}</span>
                                    </h2>
                                </div>
                            </div> <!-- /.history-item -->
                        </div> <!-- /.clear-fix -->
                    </div> <!-- /.col -->
                    <div class="col-lg-3 col-xs-6 history-item-weight">
                        <div class="clear-fix">
                            <div class="history-item item-three">
                                <div>
                                    {{-- <i class="flaticon-donation-3"></i> --}}
                                    <p>@lang('messages.Donator')</p>
                                    <h2><span class="timer" data-from="0" data-to="{{ $counters[2]?->counter }}"
                                            data-speed="2000"
                                            data-refresh-interval="5">{{ $counters[2]?->current_translation?->title }}</span>
                                    </h2>
                                </div>
                            </div> <!-- /.history-item -->
                        </div> <!-- /.clear-fix -->
                    </div> <!-- /.col -->
                    <div class="col-lg-3 col-xs-6 history-item-weight">
                        <div class="clear-fix">
                            <div class="history-item item-four">
                                <div>
                                    {{-- <i class="flaticon-donation-1"></i> --}}
                                    <p>@lang('messages.Raised Funds')</p>
                                    <h2><span class="timer" data-from="0" data-to="{{ $counters[3]?->counter }}"
                                            data-speed="2000"
                                            data-refresh-interval="5">{{ $counters[3]?->current_translation?->title }}</span>M
                                    </h2>
                                </div>
                            </div> <!-- /.history-item -->
                        </div> <!-- /.clear-fix -->
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.company-history-containt-opact -->
        <div class="company-history-shape-img-bottom"><img src="images/shape/shape-2.png" alt="shape-img"></div>
        <!-- /.company-history-shape-img-bottom -->
    </section> <!-- /.company-history-section -->

    <!-- Upcoming Events ____________________________ -->
    <section class="Upcoming-Events">
        <div class="container">
            <div class="Theme-title text-center">
                <h2>@lang('messages.Upcoming & Recent Events')</h2>
                <h6>@lang('messages.Events')</h6>
            </div> <!-- /.Theme-title -->

            <ul class="Events-Item-Wrapper">
                @foreach ($latestEvents as $event)
                    @php
                        $title = $event->current_translation?->title ?? '';
                        $description = $event->current_translation?->description ?? '';
                        $details = $event->details?->current_translation?->description ?? '';
                        $image = $event->image ? asset($event->image) : asset('images/home/img-4.jpg');
                        $dt = \Carbon\Carbon::parse($event->created_at);
                        $day = $dt->format('d');
                        $month = strtoupper($dt->format('F'));
                        $weekday = $dt->format('l');
                        $created_display = $dt->format('Y-m-d  (H:i)');
                    @endphp

                    <li class="clear-fix">
                        <div class="events-img"><img src="{{ $image }}" alt="{{ $title }}"></div>
                        <!-- /.events-img -->
                        <div class="day">
                            <h2>{{ $day }}</h2>
                            <h6>{{ $month }} <br> {{ $weekday }}</h6>
                        </div> <!-- /.day -->
                        <div class="events-text">
                            <h4>{{ $title }}</h4>
                            {{-- <p><i>{{ $created_display }}</i> </p> --}}
                            <div class="Causes-Details-Wrapper">
                                <div class="Causes-Details-Item">
                                    <div class="Causes-Text">
                                        <ul class="count-down" id="count-down" data-date="{{ $event->event_date }}">
                                            <li>
                                                <span id="days">0</span>
                                                <p>@lang('messages.Day')</p>
                                            </li>
                                            <li>
                                                <span id="hours">00</span>
                                                <p>@lang('messages.Hours')</p>
                                            </li>
                                            <li>
                                                <span id="minutes">00</span>
                                                <p>@lang('messages.Minutes')</p>
                                            </li>
                                            <li>
                                                <span id="seconds">00</span>
                                                <p>@lang('messages.Seconds')</p>
                                            </li>


                                        </ul>
                                        {{-- <ul class="Wacker-Drive">
                                                <li><i class="fa fa-clock-o"
                                                        aria-hidden="true"></i>{{ $event->created_at->format('Y-m-d H:i') }}
                                                </li>
                                            </ul> --}}

                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.events-text -->
                        <a href="/event-details/{{ $event->id }}-{{ $event->slug ?? '' }}"><i
                                class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </li> <!-- /.clear-fix -->
                @endforeach
            </ul> <!-- /.Events-Item-Wrapper -->

        </div> <!-- /.container -->
    </section> <!-- /.Upcoming-Events -->

    <!-- testimonial section _________________________________ -->
    <section class="testimonial-section">
        <div class="testimonial-shape-img"><img src="/images/shape/shape-3.png" alt="shape-img"></div>
        <!-- /.shape-img -->
        <div class="testimonial-opact">
            <div class="testimonial-containt">
                <div class="container">
                    <div class="testimonial-shape-border"><i class="flaticon-right-quotation-sign"></i></div>

                    <div id="client-carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach ($testmonials as $key => $member)
                                <li data-target="#client-carousel" data-slide-to="{{ $key }}"
                                    class="{{ $key == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @foreach ($testmonials as $key => $member)
                                <div class="item {{ $key == 0 ? 'active' : '' }}">
                                    <p>{{ $member->current_translation?->description }}</p>
                                    <span>{{ $member->current_translation?->title }} </span>
                                    <img src="{{ asset($member->image) }}" alt="Testimonal">
                                </div>
                            @endforeach
                        </div> <!-- /.carousel-inner -->
                    </div> <!-- Wrapper for bootstrap slides -->
                </div> <!-- /.container -->
            </div> <!-- /.testimonial-containt -->
        </div> <!-- /.testimonial-opact -->
    </section> <!-- /.testimonial-section -->

    <!-- News Update _________________________________ -->
    <section class="news-update-section">
        <div class="container">
            <div class="Theme-title text-center">
                <h2>@lang('messages.NewsUpdate')</h2>
                <h6>@lang('messages.LatestNews')</h6>
            </div> <!-- /.Theme-title -->

            <div class="row home-news-update-wrapper">
                @foreach ($latestNews as $news)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="home-news-update-item">
                            <div class="news-update-img">
                                <img src="{{ asset($news['image']) }}" alt="{{ $news['title'] }}"
                                    style="width:370px;height:340px">
                            </div>
                            <div class="news-update-text">
                                <span>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    {{ $news['created_at'] }}
                                </span>
                                <p>{{ Str::limit($news->current_translation?->title, 100) }}</p>
                                <a href="/news-details/{{ $news->id }}-{{ $news->slug }}">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    @lang('messages.LearnMore')
                                </a>
                            </div> <!-- /.news-update-text -->
                        </div> <!-- /.home-news-update-item -->
                    </div> <!-- /.col -->
                @endforeach
            </div> <!-- /.home-news-update-wrapper -->
        </div> <!-- /.container -->
    </section> <!-- /.news-update-section -->



    {{-- @include('website.components.champion-awards', ['championAwards' => $championAwards]) --}}

    {{-- @include('website.components.brand', ['brands' => $brands]) --}}
    {{--
    @if ($popUp && $popUp->status && $popUp->image)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="autoClickLink" style="display: none"></button>
        <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-1">
                    <img src="{{$popUp->image}}" alt="pop up for registeration" style="height: 450px;width:100%">
                </div>
                <div class="modal-footer p-0 justify-content-center">
                    <a href="/register" class="btn btn-dark btn-sm my-3" >@lang('messages.Register for the Qualification Discovery Tournament')</a>
                </div>
            </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('autoClickLink').click();
            });
        </script>
    @endif --}}

@endsection
