@extends('website.layouts.layoutPage')
@section('pageTitle',__('messages.About the championship'))

@section('body')
    @include('website.layouts.breadcrump', ['currentPage' => __('messages.About the championship'),'image' => '/upload/general/about.jpg'])

	<!-- Club Section Start -->
    <div class="rs-club sec-spacer">
        <div class="container">
            <h3 class="title-bg">@lang('messages.About the championship')</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="rs-club-image">
                        <img src="{{$aboutChampion->image}}" alt="about-the-championship-image" style="border-radius:15px;width:100%;max-height:500px">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 mt-4">
                    <div class="rs-club-text">
                        {!! $aboutChampion->current_translation?->description !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Club Section End -->



    @include('website.components.champion-awards',['championAwards' => $championAwards,'background'=>'bg-light'])


    @include('website.components.brand',['brands' => $brands])


@endsection
