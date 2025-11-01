@extends('website.layouts.layoutPage')
@section('pageTitle',__('messages.About the club'))

@section('body')
    @include('website.layouts.breadcrump', ['currentPage' => __('messages.About the club'),'image' => '/upload/general/about.jpg'])

	<!-- Club Section Start -->
    <div class="rs-club sec-spacer">
        <div class="container">
            <h3 class="title-bg">@lang('messages.About the club')</h3>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="rs-club-text">
                        {!! $aboutTheClub->current_translation?->description !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="rs-club-image">
                        <img src="{{$aboutTheClub->image}}" alt="about-the-club-image" style="border-radius:15px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Club Section End -->

    <!--RS History Section Start Here-->
    <div class="rs-history-area pt-5">
        <div class="container">
            <div class="row rs-vertical-bottom">
                <div class="col-lg-3 col-md-12">
                    <div class="rs-mission-image">
                        <img src="/upload/general/mission.png" alt="mission-image">
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="history-innner">
                        <ul class="nav nav-tabs tabs-menu">
                            <li class="nav-item">
                                <a  class="nav-link active" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="true">
                                    <i class="fa fa-history"></i>
                                    <span>@lang('messages.History')</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" id="mission-tab" data-toggle="tab" href="#mission" role="tab" aria-controls="mission" aria-selected="false">
                                    <i class="fa fa-futbol-o"></i>
                                    <span>@lang('messages.Mission')</span>
                                </a>
                            </li>
                            <li>
                               <a class="nav-link" id="vision-tab" data-toggle="tab" href="#vision" role="tab" aria-controls="vision" aria-selected="false">
                                    <i class="fa fa-eye-slash"></i>
                                    <span>@lang('messages.Vision')</span>
                               </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="history" class="tab-pane fade show active" role="tabpanel" aria-labelledby="history-tab">
                                <div>
                                    {!! $history->current_translation?->description !!}
                                </div>
                            </div>
                            <div id="mission" class="tab-pane fade" role="tabpanel" aria-labelledby="mission-tab">
                                {!! $mission->current_translation?->description !!}
                            </div>
                            <div id="vision" class="tab-pane fade" role="tabpanel" aria-labelledby="mission-tab">
                                {!! $vision->current_translation?->description !!}
                            </div>
                        </div>
                        {{-- <div class="president-info">
                            <div class="position">
                                <h4>Meachel N.Jonshon <span>Club President</span></h4>
                            </div>
                            <div class="signature">
                                <img src="images/sign.png" alt="" />
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('website.components.champion-awards',['championAwards' => $championAwards,'background'=>'bg-light'])


    <div class="testimonil-section-page sec-spacer" style="background: url(upload/general/video-bg.jpg);background-size: cover!important;">
        <div class="overly-bg"></div>
        <div class="container">
            <h3 class="title-bg">@lang('messages.Our Testimonils')</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="tesitmonial-inner">

                        @foreach ($testmonials as $testmonial)
                            <div class="single-testimonil text-center">
                                <div class="author-info">
                                    <img src="{{$testmonial->image}}" alt="Author" style="width:100px;height:100px" />
                                    <h4>{{$testmonial->current_translation?->title}} <span>{{$testmonial->job}}</span></h4>
                                    <div class="client-rating">
                                        @for ($i = 0 ; $i < $testmonial->rate; $i++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor

                                    </div>
                                    <p style="height:125px">{{$testmonial->current_translation?->description}}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('website.components.brand',['brands' => $brands])


@endsection
