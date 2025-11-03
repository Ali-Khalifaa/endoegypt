@extends('website.layouts.layoutPage')
@section('pageTitle', __('messages.HomePage'))
@section('body')



    <!-- Theme Main Banner ____________________________ -->
    <section>
        <div id="theme-main-banner">
            @foreach ($banners ?? [] as $banner)
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
                            {{-- <a href="#" class="tran3s banner-button wow fadeInUp animated hvr-bounce-to-right"
                               data-wow-delay="0.7s">Donation Now</a> --}}
                        </div> <!-- /.container -->
                    </div> <!-- /.camera_caption -->
                </div>
            @endforeach
        </div> <!-- /#theme-main-banner -->
    </section>


    <!-- Children Care List  _________________________________ -->
    <section class="Children-Care-list-margin">
        <div class="container">
            <div class="Children-Care-list">
                <div id="Children-Care-List-Slider" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="text-center list-item">
                            <i class="flaticon-handshake"></i>
                            <h6><a href="#">Children’s Care</a></h6>
                        </div> <!-- /.list-item -->
                    </div> <!-- /.item -->
                    <div class="item">
                        <div class="text-center list-item">
                            <i class="flaticon-donation-1"></i>
                            <h6><a href="#">Donate</a></h6>
                        </div> <!-- /.list-item -->
                    </div> <!-- /.item -->
                    <div class="item">
                        <div class="text-center list-item">
                            <i class="flaticon-donation"></i>
                            <h6><a href="#">Volunteer</a></h6>
                        </div> <!-- /.list-item -->
                    </div> <!-- /.item -->
                    <div class="item">
                        <div class="text-center list-item">
                            <i class="flaticon-donation-2"></i>
                            <h6><a href="#">Protect Planet</a></h6>
                        </div> <!-- /.list-item -->
                    </div> <!-- /.item -->
                </div> <!-- / #Children-Care-List-Slider -->
            </div> <!-- /.Children-Care-list -->
        </div> <!-- /.container -->
    </section> <!-- /.Children-Care-list-margin -->

    <!-- Banner Bottom Section _________________________________ -->
    <section class="banner-bottom-section">
        <div class="opact-div">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="banner-bottom-section-text About-Us-Section" style="margin: 20px 0 ;">
                            <div class="Watch-Case-video" style="color:#fff">
                                <h3 style="color:#fff">@lang("messages.Watch Case video")</h3>
                                <p style="color:#fff">@lang("messages.We take pride in being responsive, making a difference at a critical point in peoples’ lives. We have been doing this since 1944, working with veterans of every conflict, and we envisage continuing doing so for the ‘long haul’ – supporting all future generations of our soldiers and their dependants.")</p>
                                <div class="Case-video">
                                    <img src="images/about/img-3.jpg" alt="image">
                                    {{-- /assets/images/authentication/logo.png --}}
                                    <div class="video-play">
                                        <a data-fancybox="iframe" href="{{$bannerVideo->image}}"><i
                                                class="flaticon-play-button"></i></a>
                                    </div> <!-- /.video-play -->
                                </div> <!-- /.Case-video -->
                            </div>
                        </div> <!-- /.banner-bottom-section-text -->
                    </div> <!-- /.col -->

                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.opact-div -->
    </section> <!-- /.banner-bottom-section -->

    <section class="About-Us-Section" style="margin: 120px 0 0;">
        <div class="container">
            <div class="we-are-innovators">
                <div class="row">
                    <div class="col-md-7 col-xs-12">
                        <div class="innovators-text">
                            <h3>{{ $aboutUs->current_translation?->title }}</h3>
                            <div>
                                {!! $aboutUs->current_translation?->description !!}
                            </div>
                        </div> <!-- /.innovators-text -->
                    </div> <!-- /.col -->
                    <div class="col-md-5 col-xs-12">
                        <div class="innovators-img"><img src="{{ $aboutUs->image }}" style="width: 420px;height:510px"
                                alt="image"></div>
                        <!-- /.innovators-img -->
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div> <!-- /.we-are-innovators -->

        </div> <!-- /.container -->
    </section> <!-- /.About-Us-Section -->


    <!-- Company History _________________________________ -->
    <section class="company-history-section">
        <div class="company-history-shape-img-top"><img src="images/shape/shape-1.png" alt="shape-img"></div>
        <!-- /.company-history-shape-img-top -->
        <div class="company-history-containt-opact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-xs-6 history-item-weight">
                        <div class="clear-fix">
                            <div class="history-item item-one">
                                <div>
                                    <i class="flaticon-donate"></i>
                                    <p>Fundrising</p>
                                    <h2><span class="timer" data-from="0" data-to="1425" data-speed="2000"
                                            data-refresh-interval="5">0</span></h2>
                                </div>
                            </div> <!-- /.history-item -->
                        </div> <!-- /.clear-fix -->
                    </div> <!-- /.col -->
                    <div class="col-lg-3 col-xs-6 history-item-weight">
                        <div class="clear-fix">
                            <div class="history-item item-two">
                                <div>
                                    <i class="flaticon-group"></i>
                                    <p>Volunteer</p>
                                    <h2><span class="timer" data-from="0" data-to="1200" data-speed="2000"
                                            data-refresh-interval="5">0</span></h2>
                                </div>
                            </div> <!-- /.history-item -->
                        </div> <!-- /.clear-fix -->
                    </div> <!-- /.col -->
                    <div class="col-lg-3 col-xs-6 history-item-weight">
                        <div class="clear-fix">
                            <div class="history-item item-three">
                                <div>
                                    <i class="flaticon-donation-3"></i>
                                    <p>Donator</p>
                                    <h2><span class="timer" data-from="0" data-to="201" data-speed="2000"
                                            data-refresh-interval="5">0</span></h2>
                                </div>
                            </div> <!-- /.history-item -->
                        </div> <!-- /.clear-fix -->
                    </div> <!-- /.col -->
                    <div class="col-lg-3 col-xs-6 history-item-weight">
                        <div class="clear-fix">
                            <div class="history-item item-four">
                                <div>
                                    <i class="flaticon-donation-1"></i>
                                    <p>Raised Funds</p>
                                    <h2><span class="timer" data-from="0" data-to="20" data-speed="2000"
                                            data-refresh-interval="5">0</span>M</h2>
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
                            <p><i>{{ $created_display }}</i> {{ $description ?: $details }}</p>
                        </div> <!-- /.events-text -->
                        <a href="/events-details/{{ $event->id }}-{{ $event->slug ?? '' }}"><i
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
                            @foreach ($organizingCommittees as $key => $member)
                                <li data-target="#client-carousel" data-slide-to="{{ $key }}"
                                    class="{{ $key == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @foreach ($organizingCommittees as $key => $member)
                                <div class="item {{ $key == 0 ? 'active' : '' }}">
                                    <p>{{ $member->current_translation?->description }}</p>
                                    <span>{{ $member->current_translation?->title }} ({{ $member->job }})</span>
                                    <img src="{{ asset($member->image) }}" alt="committee member">
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
