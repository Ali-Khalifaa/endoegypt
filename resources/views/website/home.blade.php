@extends('website.layouts.layoutPage')
@section('pageTitle', __('messages.HomePage'))
@section('body')

    <!-- Slider Section Start Here -->
    <div class="slider-section4 slider-main" style="max-height: 700px">
        <div id="slider-five" class="owl-carousel">

            @foreach ($banners as $banner)
                <div class="item active">
                    <img src="{{ $banner->image }}" alt="Slider image" style="max-height: 700px">
                    <div class="dsc">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="slider-text text-center">
                                        <h1 data-animation-in="slideInDown" data-animation-out="animate-out slideOutUp">
                                            {{ $banner->current_translation?->title }}
                                            @if ($banner->current_translation?->description)
                                                <span>VS</span>{{ $banner->current_translation?->description }}
                                            @endif
                                        </h1>
                                        <div data-animation-in="slideInLeft" data-animation-out="animate-out fadeOut"
                                            class="CountDownTimer" data-date="{{ $banner->date }}"></div>
                                        {{-- <div class="btn-slider">
                                            <a href="#" class="btn1" data-animation-in="slideInUp" data-animation-out="animate-out slideOutDown">Read More</a>
                                            <a href="#" class="btn2" data-animation-in="slideInDown" data-animation-out="animate-out slideOutUp">Book a Ticket</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    <!-- Slider Section end Here -->

    <div class="clicent-logo-section sec-spacer" style="background:none">
        {{-- <div class="overly-bg"></div> --}}
        <div class="container">
            <h3 class="title-bg text-dark">@lang('messages.Clubs')</h3>

            <div id="clubs" class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="20"
                data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false"
                data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
                data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2"
                data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4" data-md-device-nav="false"
                data-md-device-dots="false">
                @foreach ($clubs as $club)
                    <div class="item bg-dark">
                        <div class="single-logo">
                            <a href="javascript::void()">
                                <img src="{{ $club->image }}" alt="club-image" style="width:150px">
                                <h5 class="mt-4 text-white">{{ $club->current_translation->title }}</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Upcoming Match Section Start Here-->
    <div class="upcoming-section">
        <div class="container">
            <h2>@lang('messages.Upcoming Matchs')</h2>
            <div id="upcoming" class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="30"
                data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false"
                data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
                data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1"
                data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="1" data-md-device-nav="false"
                data-md-device-dots="false">
                @foreach ($upcomingMatches as $match)
                    <div class="item row">
                        <div class="col-lg-4 col-md-4 col-sm-12 first">
                            <img src="{{ $match->club1->image }}" alt="{{ $match->club1->current_translation?->title }}">
                            <h4>{{ $match->club1->current_translation?->title }} ({{ $match->club1->abbreviation }})</h4>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <span class="date">{{ $match->match_date->format('Y-m-d H:i') }}</span>
                            <span class="vs">VS</span>
                            <span>{{ $match->current_translation?->title }}</span>
                            <a href="{{ $match->match_link }}" style="color:#fbc02d" class="btn1 popup-youtube"
                                data-animation-in="slideInUp" data-animation-out="animate-out slideOutDown"
                                target="_blank">@lang('messages.Channel Link')</a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 last">
                            <img src="{{ $match->club2->image }}" alt="{{ $match->club2->current_translation?->title }}">
                            <h4>{{ $match->club2->current_translation?->title }} ({{ $match->club2->abbreviation }})</h4>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Upcoming Match Section end Here-->

    <!-- All news area Start Here-->
    <div class="all-news-area sec-spacer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="title-bg">@lang('messages.Latest News')</h3>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="latest-news-slider">
                                @foreach ($latestNews as $latestNew)
                                    <div>
                                        <div class="news-normal-block">
                                            <div class="news-img">
                                                <a href="#">
                                                    <img src="{{ $latestNew->image }}"
                                                        alt="{{ $latestNew->current_translation?->title }}" />
                                                </a>
                                            </div>
                                            <h4 class="news-title"><a
                                                    href="blog-single.html">{{ $latestNew->current_translation?->title }}</a>
                                            </h4>
                                            <div class="news-desc">
                                                <p>
                                                    {{ $latestNew->current_translation?->description }}
                                                </p>
                                            </div>
                                            <div class="news-btn">
                                                <a class="primary-btn"
                                                    href="/news-details/{{ $latestNew->id }}-{{ $latestNew->slug }}">@lang('messages.Read More')</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="latest-news-nav">
                                @foreach ($latestNews as $latestNew)
                                    <div><img src="{{ $latestNew->image }}"
                                            alt="{{ $latestNew->current_translation?->title }}" /></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area right-side-area">
                        <h3 class="title-bg">@lang('messages.Recent Results')</h3>
                        <div class="today-match-teams text-center"
                            style="background: url(/upload/general/download.jpg);background-size:cover!important">
                            <div class="overly-bg"></div>
                            <div class="title-head">
                                <h4>@lang('messages.Last Match Result')</h4>
                                <span class="date">{{ $lastResult->created_at->format('l, F jS, Y') }}</span>
                            </div>
                            <div class="today-score px-0">
                                <div class="today-match-team">
                                    @php
                                        $club1 = $lastResult->clubMatch->club1;
                                        $club2 = $lastResult->clubMatch->club2;
                                    @endphp
                                    <img src="{{ $club1->image }}" alt="{{ $club1->current_translation->title }}"
                                        style="width:60px" />
                                    <h4>{{ $club1->current_translation->title }}</h4>
                                    <span>{{ $club1->abbreviation }}</span>
                                </div>
                                <div class="today-final-score">
                                    {{ $lastResult->club1_result }} <span>-</span> {{ $lastResult->club2_result }}
                                    <h4>@lang('messages.final score')</h4>
                                </div>
                                <div class="today-match-team">
                                    <img src="{{ $club2->image }}" alt="{{ $club2->current_translation->title }}"
                                        style="width:60px" />
                                    <h4>{{ $club2->current_translation->title }}</h4>
                                    <span>{{ $club2->abbreviation }}</span>
                                </div>
                            </div>
                            <div class="title-head">
                                <h4>@lang('messages.Previous Results')</h4>
                            </div>
                            <div class="recent-match-results">
                                @foreach ($recentResults as $result)
                                    @php
                                        $club1 = $result->clubMatch->club1;
                                        $club2 = $result->clubMatch->club2;
                                    @endphp
                                    <div class="single-result">
                                        <div class="team-result clearfix">
                                            <div class="text-left match-result-list single-part">
                                                <img class="result-img" src="{{ $club1->image }}"
                                                    alt="{{ $club1->current_translation->title }}">
                                                {{ $club1->current_translation->title }}
                                            </div>
                                            <div class="text-center match-score single-part">
                                                <span class="score">{{ $result->club1_result }}</span> - <span
                                                    class="score">{{ $result->club2_result }}</span>
                                            </div>
                                            <div class="text-left match-result-list single-part">
                                                <img class="result-img" src="{{ $club2->image }}"
                                                    alt="{{ $club2->current_translation->title }}">
                                                {{ $club2->current_translation->title }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="view-all-result">
                                    <a href="/results">@lang('messages.View All') <i
                                            class="fa fa-angle-double-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator-100"></div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-8 match-view-tite">
                            <h3 class="title-bg">@lang('messages.Match fixture')</h3>
                        </div>
                        <div class="col-4 text-right match-view-more">
                            <a class="view-more" href="/upcoming-matches">@lang('messages.View More') <i
                                    class="fa fa-angle-double-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="match-list mmb-45"
                                style="background-image: url(/upload/general/download2.jpg);background-size:cover!important">
                                <div class="overly-bg"></div>
                                <table class="match-table">
                                    <tbody>

                                        @foreach ($upcomingMatches as $match)
                                            <tr>
                                                <td class="medium-font">{{ $match->club1->current_translation->title }}
                                                </td>
                                                <td class="big-font">@lang('messages.VS')</td>
                                                <td class="medium-font">{{ $match->club2->current_translation->title }}
                                                </td>
                                                <td>{{ $match->match_date->format('Y-m-d H:i') }}</td>
                                                <td>{{ $match->current_translation->title }}</td>
                                                <td><img src="{{ $match->champion->image }}" style="height: 50px"
                                                        class="mx-1"
                                                        alt="{{ $match->champion->current_translation->title }}">{{ $match->champion->current_translation->title }}
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex flex-wrap justify-content-between">
                        <h3 class="title-bg">@lang('messages.Points table')</h3>
                        <div>
                            <img src="{{ $champion->image }}" style="height:40px" class="mx-1"
                                alt="{{ $champion->current_translation->title }}">
                            {{ $champion->current_translation->title }}
                        </div>
                    </div>
                    <div class="point-list text-center">
                        <table class="point-table">
                            <tbody>
                                <tr>
                                    <td>#</td>
                                    <td class="country-name">@lang('messages.Team')</td>
                                    <td>@lang('messages.PL')</td>
                                    <td>@lang('messages.W')</td>
                                    <td>@lang('messages.D')</td>
                                    <td>@lang('messages.L')</td>
                                    <td>@lang('messages.P')</td>
                                </tr>
                                @foreach ($clubsPoints as $key => $clubPoint)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $clubPoint->current_translation->title }}</td>
                                        <td>{{ $clubPoint->results($champion->id)->count() }}</td>
                                        <td>{{ $clubPoint->winingMatches($champion->id)->count() }}</td>
                                        <td>{{ $clubPoint->drawMatches($champion->id)->count() }}</td>
                                        <td>{{ $clubPoint->loosingMatches($champion->id)->count() }}</td>
                                        <td>{{ $clubPoint->getPoints($champion->id) }}</td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                        <a class="view-more" href="/points-table">@lang('messages.View More') <i class="fa fa-angle-double-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All news area end Here-->

    <!-- Latest Video Start Here-->
    <div class="latest-video-section sec-spacer mb5 pb-5"
        style="background:url(/website/images/latest-video/video-bg.jpg);background-size:cover!important">
        <div class="overly-bg"></div>
        <div class="container">
            <h3 class="title-bg">@lang('messages.Latest Videos')</h3>
            <div class="row rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="20"
                data-autoplay="true" data-autoplay-timeout="6000" data-smart-speed="2000" data-dots="true"
                data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false"
                data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false"
                data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false"
                data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false"
                data-md-device-dots="false">

                @foreach ($latestVideos as $latestVideo)
                    <div class="col-md-12  mb-5">
                        <div class="video-area mmb-40">
                            <img src="{{ $latestVideo->image }}" alt="Video" style="width: 100%;height:240px" />
                            <div class="videos-icon">
                                <a class="popup-youtube" href="{{ $latestVideo->video_url }}">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Latest Video end Here-->


    <!-- Gallery Section Start Here-->
    <div class="gallery-section-area pb-70 pt-5">
        <div class="container" id="grid">
            <h3 class="title-bg">@lang('messages.Team gallery')</h3>
            <div id="gallery-items">
                <div class="row">
                    @foreach ($teamGallery as $photo)
                        <div class="col-lg-4 col-md-6">
                            <a class="image-popup" href="{{ $photo->image }}">
                                <div class="single-gallery">
                                    <img src="{{ $photo->image }}" alt="team-gallery"
                                        style="height: 262px;width:360px" />
                                    <div class="heading-conent">

                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Section End Here-->

    @include('website.components.champion-awards', ['championAwards' => $championAwards])


    <!-- Testimonials Sections Start Here-->
    <div class="testimonial-section pb-100 my-5">
        <div class="container">
            <h3 class="title-bg">@lang('messages.Testimonials')</h3>
            <div class="row">
                <div class="col-md-12">
                    <div id="testimonial-slider" class="rs-carousel owl-carousel" data-loop="true" data-items="1"
                        data-margin="0" data-autoplay="true" data-autoplay-timeout="6000" data-smart-speed="2000"
                        data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1"
                        data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1"
                        data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1"
                        data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="1"
                        data-md-device-nav="false" data-md-device-dots="false">
                        @foreach ($testmonials as $testmonial)
                            <div class="testimonial">
                                <div class="testimonial-profile">
                                    <a href="#">
                                        <img src="{{ $testmonial->image }}" style="width:171px ; height:171px"
                                            alt="{{ $testmonial->current_translation?->title }}"></a>
                                </div>
                                <div class="testimonial-content">
                                    <h3 class="testimonial-title">{{ $testmonial->current_translation?->title }}</h3>
                                    <span class="testimonial-post">{{ $testmonial->job }}</span>
                                    <div class="client-rating">
                                        @for ($i = 0; $i < $testmonial->rate; $i++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor

                                    </div>
                                    <p class="testimonial-description">
                                        {{ $testmonial->current_translation?->description }}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials Sections End Here-->

    @include('website.components.brand', ['brands' => $brands])

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
    @endif

@endsection
