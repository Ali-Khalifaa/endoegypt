@extends('website.layouts.layoutPage')
@section('pageTitle', __('messages.Event Details'))
@push('headStyle')
    @vite(['resources/js/single-components.js'])
@endpush
@section('body')
    @include('website.layouts.breadcrump', [
        'currentPage' => __('messages.Event Details'),
        'image' => '/upload/general/point-table.jpg',
        'parentPage' => __('messages.Events'),
        'parentPageUri' => 'events',
    ])

    <section class="Event-Details-Pages">
        <div class="container">
            <div class="Rcent-Causes-Item-Wrapper Causes-Details-Wrapper">
                <div class="row">
                    <div class="col-md-8 col-xs-12 ">
                        <div class="Causes-Item Causes-Details-Item clear-fix">
                            <div class="Causes-Img">
                                <img src="{{ $event->image }}" alt="{{ $event->current_translation->title }}"
                                    style="width:850px;height:450px">
                            </div>
                            <!-- /.Causes-Img -->
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

                            </div> <!-- /.Causes-Text -->
                        </div> <!-- /.Causes-Item -->
                        <div class="Details-Info">
                            <h1>{{ $event->current_translation->title }}</h1>
                            <div class="share-section2 " style="margin: 30px 0 ;">
                                {!! $event->current_translation->description !!}
                            </div>

                            <div class="share-section2 " style="margin: 30px 0 ;">
                                {!! $event->details?->current_translation?->description !!}
                            </div>
                        </div> <!-- /.Details-Info -->

                        <div class="Leave-A-Comment" id="app" style="margin:30px 0 100px">
                            <event-form :event_id="@json($event->id)"></event-form>

                        </div>
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
            </div> <!-- /.container -->
    </section> <!-- /.Rcent-Causes-Section -->


    {{-- @include('website.components.brand',['brands' => $brands]) --}}


@endsection
