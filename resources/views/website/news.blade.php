@extends('website.layouts.layoutPage')
@section('pageTitle', __('messages.News'))
@section('body')
    @include('website.layouts.breadcrump', ['currentPage' => __('messages.News')])









    <section class="">
        <div class="container">
            <div>
                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-md-8 col-xs-12 ">
                        <ul class="Blog-List-Wrapper">
                            @foreach ($news as $blog)
                                <li>


                                    @if ($blog->image)
                                        <a style="width:100%" href="/news-details/{{ $blog->id }}-{{ $blog->slug }}">
                                            <img src="{{ $blog->image }}" alt="{{ $blog->current_translation?->title }}"
                                                style="margin-bottom:10px;width:770px;height:490px">
                                        </a>
                                    @endif
                                    <span class="date" style="color:#dd7207;font-weight:bold"><i
                                            class="fa fa-calendar-check-o"></i>
                                        {{ $blog->created_at->format('Y-m-d H:i') }}</span>

                                    <h1>
                                        <a href="/news-details/{{ $blog->id }}-{{ $blog->slug }}">
                                            {{ $blog->current_translation?->title }}
                                        </a>
                                    </h1>
                                    <p>{{ $blog->current_translation?->description }}</p>
                                    <ul>
                                        <li>
                                            <a href="/news-details/{{ $blog->id }}-{{ $blog->slug }}"
                                                class="hvr-float-shadow">
                                                @lang('messages.Continue reading')
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            @endforeach
                        </ul> <!-- /.Blog-List-Wrapper -->

                        {{-- pagination --}}
                        @include('website.layouts.pagination', ['model' => $news])
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
            </div> <!-- /. -->
        </div> <!-- /.container -->
    </section> <!-- /.Rcent-Causes-Section -->
@endsection
