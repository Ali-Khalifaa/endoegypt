@extends('website.layouts.layoutPage')
@section('pageTitle',__('messages.completeRegisteration'))
@push("headStyle")
    @vite(['resources/js/single-components.js'])
@endpush
@section('body')

    @include('website.layouts.breadcrump', ['currentPage' => __('messages.completeRegisteration')])

    <complete-register ></complete-register>

@endsection
