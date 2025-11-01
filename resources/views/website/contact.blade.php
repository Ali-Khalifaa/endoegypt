@extends('website.layouts.layoutPage')
@section('pageTitle',__('messages.contactPage'))
@push("headStyle")
    @vite(['resources/js/single-components.js'])
@endpush
@section('body')

@include('website.layouts.breadcrump', ['currentPage' => __('messages.contactPage')])

<div class="contact-page-section sec-spacer">
    <div class="container">

        <div class="row contact-address-section">
            <div class="col-md-4 contact-pd">
                <div class="contact-address">
                    <i class="fa fa-map-marker"></i>
                    <h4>@lang('messages.Address')</h4>
                    <p>{{$contactUs->current_translation?->title}}</p>
                    <p>{{$contactUs->current_translation?->description}}</p>
                </div>
            </div>
            <div class="col-md-4 contact-pd">
                <div class="contact-phone">
                    <i class="fa fa-phone"></i>
                    <h4>@lang('messages.Phone Numbers')</h4>
                    <a href="tel:{{$contactUs->phone_one}}">{{$contactUs->phone_one}}</a>
                    <a href="tel:{{$contactUs->phone_two}}">{{$contactUs->phone_two}}</a>
                </div>
            </div>
            <div class="col-md-4 contact-pd">
                <div class="contact-email">
                    <i class="fa fa-envelope"></i>
                    <h4>@lang('messages.Email Address')</h4>
                    <a href="mailto:{{$contactUs->email_one}}"><p>{{$contactUs->email_one}}</p></a>
                    <a href="mailto:{{$contactUs->email_two}}"><p>{{$contactUs->email_two}}</p></a>
                </div>
            </div>
        </div>
        <contact-form></contact-form>

    </div>
</div>
@endsection
