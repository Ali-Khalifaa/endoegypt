@extends('website.layouts.layoutPage')
@section('pageTitle',__('messages.News Details'))

@section('body')
    @include('website.layouts.breadcrump', ['currentPage' => __('messages.News Details'),'image' => '/upload/general/point-table.jpg','parentPage'=>__('messages.News'),'parentPageUri' => 'news'])




    <div class="single-blog-details sec-spacer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 md-mb-30">
                    <div class="single-image">
                        <img src="{{$news->image}}" alt="{{$news->current_translation->title}}" style="width:100%">
                    </div>
                    <h1>{{$news->current_translation->title}}</h1>

                    <div class="share-section2">
                        {!!$news->current_translation->description!!}
                    </div>

                    <div class="like-section">
                        <h3 class="title-bg">@lang('messages.YOU MIGHT ALSO LIKE')</h3>
                        <div class="row">
                            @foreach ($mightLikeThis as $blog)
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                <div class="popular-post-img">
                                    <a href="/news-details/{{$blog->id}}-{{$blog->slug}}"><img src="{{$blog->image}}" alt="{{$blog->current_translation->title}}"></a>
                                </div>
                                <h3>
                                    <a href="/news-details/{{$blog->id}}-{{$blog->slug}}">{{$blog->current_translation->title}}</a>
                                </h3>
                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> {{$blog->created_at->format('F d, Y')}}</span>

                            </div>
                            @endforeach


                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-12">
                    <!-- Blog Single Sidebar Start Here -->
                    <div class="sidebar-area">

                        <div class="recent-post-area">
                            <span class="title"> @lang('messages.Latest News')</span>
                            <ul class="news-post">
                                @foreach ($latestNews as $blog)
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                                <div class="item-post">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 paddimg-right-none">
                                                            <img src="{{$blog->image}}" alt="blog-image" title="News image" />
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <h4><a href="/news-details/{{$blog->id}}-{{$blog->slug}}">{{$blog->current_translation->title}}</a></h4>
                                                            <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> {{$blog->created_at->format('F d, Y')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('website.components.brand',['brands' => $brands])


@endsection
