@extends('website.layouts.layoutPage')
@section('pageTitle',__('messages.News'))
@section('body')
@include('website.layouts.breadcrump', ['currentPage' => __('messages.News')])
<div id="rs-blog" class="rs-blog sec-spacer">
    <div class="container">
        <div class="row">
            @foreach ($news as $blog)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-blog-slide">
                        <div class="images">
                            <a href="/news-details/{{$blog->id}}-{{$blog->slug}}"><img src="{{$blog->image}}" alt="Blog Image"></a>
                        </div>
                        <div class="blog-details">
                            <span class="date"><i class="fa fa-calendar-check-o"></i> {{$blog->created_at->format('Y-m-d H:i')}}</span>
                            <h3><a href="/news-details/{{$blog->id}}-{{$blog->slug}}">{{$blog->current_translation?->title}} </a></h3>
                            <p>{{$blog->current_translation?->description}}</p>
                            <div class="read-more">
                                <a href="/news-details/{{$blog->id}}-{{$blog->slug}}">@lang('messages.Read More')</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        @include('website.layouts.pagination',['model' => $news])

    </div>
</div>
@endsection
