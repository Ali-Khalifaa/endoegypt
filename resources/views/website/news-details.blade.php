@extends('website.layouts.layoutPage')
@section('pageTitle', __('messages.News Details'))

@section('body')
    @include('website.layouts.breadcrump', [
        'currentPage' => __('messages.News Details'),
        'image' => '/upload/general/point-table.jpg',
        'parentPage' => __('messages.News'),
        'parentPageUri' => 'news',
    ])



    <!-- Blog Details ____________________________ -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12 mt-1" style="margin-top: 5px;">
                    <div class="Blog-Details-Wrapper">

                        <div class="blog-details-img-one"><img src="{{ $news->image }}"
                                alt="{{ $news->current_translation->title }}" style="width:770px;height:490px"></div>
                        <!-- /.blog-details-img-one -->
                        <span class="date" style="color:#dd7207;font-weight:bold"><i class="fa fa-calendar-check-o"></i>
                            {{ $news->created_at->format('Y-m-d H:i') }}</span>
                        <h1>{{ $news->current_translation->title }}</h1>

                        <div class="share-section2 " style="margin: 30px 0 ;">
                            {!! $news->current_translation->description !!}
                        </div>

                        <div class="share-section2 " style="margin: 30px 0 ;">
                            {!! $news->details?->current_translation?->description !!}
                        </div>



                    </div> <!-- /.Blog-Details-Wrapper -->
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
                                            <h6><a href="/event-details/{{ $event->id }}-{{ $event->slug }}">{{ $event->current_translation->title }}</a></h6>
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
