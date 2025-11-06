@extends('website.layouts.layoutPage')
@section('pageTitle', __('messages.Events'))
@section('body')
    @include('website.layouts.breadcrump', ['currentPage' => __('messages.Events')])


    <section class="">
        <div class="container">
            <div class="Rcent-Causes-Item-Wrapper Causes-Sidebar-Wrapper">
                <div class="row" style="margin-bottom:50px ">



                    <div class="col-md-8 col-xs-12 margin-top ">
                        @foreach ($events as $event)
                            <div class="Causes-Item Causes-Sidebar-Item Item-Events-List-Wrapper clear-fix">
                                <div class="Causes-Img Causes-Img-Date">
                                    <img src="{{ $event->image }}" alt="{{ $event->current_translation->title }}">
                                    <div class="Date">
                                        <span>{{ $event->event_date->format('d') }}</span>
                                        <p>{{ $event->event_date->format('M') }}</p>
                                    </div> <!-- /.Date -->
                                </div> <!-- /.Causes-Img -->
                                <div class="Causes-Text">
                                    <h3>{{ $event->current_translation->title }}</h3>
                                    <p>{{ Str::limit($event->current_translation->description, 150) }}</p>
                                    <div class="Causes-Details-Wrapper">
                                        <div class="Causes-Details-Item">
                                            <div class="Causes-Text" style="padding:0;border-bottom:none">
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
                                    <a href="/event-details/{{ $event->id }}-{{ $event->slug }}">@lang('messages.Join Now')
                                        !</a>
                                </div> <!-- /.Causes-Text -->
                            </div> <!-- /.Causes-Item -->
                        @endforeach
                        @include('website.layouts.pagination', ['model' => $events])

                    </div> <!-- /.col -->

                    <!-- ================ Right Side Bar ================== -->
                    <div class="col-md-4 col-xs-12">
                        <div class="Right-Side-Bar">

                            <div class="Side-Upcoming-Events">
                                <h5>@lang('messages.Upcoming Events')</h5>
                                <ul>
                                    @foreach ($upcomingEvents as $event)
                                        <li>
                                            <img src="{{ $event->image }}" alt="{{ $event->current_translation->title }}">
                                            <div class="text">
                                                <h6><a
                                                        href="/event-details/{{ $event->id }}-{{ $event->slug }}">{{ $event->current_translation->title }}</a>
                                                </h6>
                                                <span>{{ $event->created_at->format('F d, Y') }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div> <!-- /.Side-Upcoming-Events -->
                            <div class="Side-Recent-News-Post">
                                <h5>@lang('messages.Recent News Post')</h5>
                                <ul>
                                    @foreach ($latestNews as $blog)
                                        <li>
                                            <img src="{{ $blog->image }}" alt="{{ $blog->current_translation->title }}">
                                            <div class="text">
                                                <h6><a
                                                        href="/news-details/{{ $blog->id }}-{{ $blog->slug }}">{{ $blog->current_translation->title }}</a>
                                                </h6>
                                                <span>{{ $blog->created_at->format('F d, Y') }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div> <!-- /.Side-Recent-News-Post -->
                        </div> <!-- /.Right-Side-Bar -->
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div> <!-- /. -->
        </div> <!-- /.container -->
    </section> <!-- /.Rcent-Causes-Section -->
@endsection
