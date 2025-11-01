@extends('website.layouts.layoutPage')
@section('pageTitle',__('messages.championGallery'))
@section('body')

@include('website.layouts.breadcrump', ['currentPage' => __('messages.championGallery')])

<div class="gallery-section-page2 sec-spacer">
    <div class="gallery-section-area">
        <div class="container">
            <div class="row">
                @foreach ($championAwards as $photo)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-gallery">
                        <img src="{{$photo->image}}" alt="team-gallery" style="width:263px;height:311px">
                        <div class="popup-icon">
                            <a class="image-popup" href="{{$photo->image}}"><i class="fa fa-arrows-alt"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                

            </div>
        </div>
    </div> 
</div>  

@include('website.layouts.pagination',['model' => $championAwards])
@endsection