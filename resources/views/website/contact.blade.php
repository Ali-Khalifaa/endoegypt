@extends('website.layouts.layoutPage')
@section('pageTitle', __('messages.contactPage'))
@push('headStyle')
    @vite(['resources/js/single-components.js'])
@endpush
@section('body')

    @include('website.layouts.breadcrump', ['currentPage' => __('messages.contactPage')])


    <section class="Contact-Us-Pages">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12"
                    style="display: flex;flex-wrap: wrap;justify-content: space-between;">
                    <div class="Client-Care">
                        <h5><i class="fa fa-phone"></i>
                            @lang('messages.Phone Numbers')</h5>
                        <ul class="Text">
                            <li>: <a
                                    href="tel:{{ preg_replace('/\s+/', '', $contactUs->phone_one) }}">{{ $contactUs->phone_one }}</a>
                            </li>
                            <li>: <a
                                    href="tel:{{ preg_replace('/\s+/', '', $contactUs->phone_two) }}">{{ $contactUs->phone_two }}</a>
                            </li>
                            <li>@lang('messages.Connect With Us')</li>
                        </ul> <!-- /.Text -->
                        <ul class="Icon">
                            @if ($joinUs->facebook)
                                <li><a href="{{ $joinUs->facebook }}" target="_blank"><i aria-hidden="true"
                                            class="fa fa-facebook"></i> </a></li>
                            @endif
                            @if ($joinUs->twitter)
                                <li><a href="{{ $joinUs->twitter }}" target="_blank"><i aria-hidden="true"
                                            class="fa fa-twitter"></i></a></li>
                            @endif
                            @if ($joinUs->instagram)
                                <li><a href="{{ $joinUs->instagram }}" target="_blank"><i aria-hidden="true"
                                            class="fa fa-instagram"></i></a></li>
                            @endif
                            @if ($joinUs->linkedin)
                                <li><a href="{{ $joinUs->linkedin }}" target="_blank"><i aria-hidden="true"
                                            class="fa fa-linkedin"></i> </a></li>
                            @endif
                            @if ($joinUs->youtube)
                                <li><a href="{{ $joinUs->youtube }}" target="_blank"><i aria-hidden="true"
                                            class="fa fa-youtube"></i> </a></li>
                            @endif
                        </ul> <!-- /.Icon -->
                    </div> <!-- /.Client-Care -->
                    <div class="Headquarters-One">
                        <h5>
                            <i class="fa fa-map-marker"></i>
                            @lang('messages.Address')
                        </h5>
                        <ul>
                            <li>
                                <p>{{ $contactUs->current_translation?->title }}</p>
                                </p>
                            </li>
                            <li>
                                <p>{{ $contactUs->current_translation?->description }}
                            </li>
                        </ul>
                    </div> <!-- /.Headquarters-One -->

                    <div class="Headquarters-Two">
                        <h5><i class="fa fa-envelope"></i> @lang('messages.Email Address')</h5>
                        <ul>
                            <li><a href="mailto:{{ $contactUs->email_one }}">
                                    <p>{{ $contactUs->email_one }}</p>
                                </a>
                            </li>
                            <li><a href="mailto:{{ $contactUs->email_two }}">
                                    <p>{{ $contactUs->email_two }}</p>
                                </a></li>
                        </ul>

                    </div> <!-- /.Headquarters-Two -->
                </div> <!-- /.col -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

    <section class="Join-Volunteer-Pages margin-bottom" id="app">
        <div class="container">
            <div class="Theme-title text-center">
                <h2>@lang("messages.Never Hesitate to Reach Out")</h2>
                <h6>@lang("messages.Contact us")</h6>
            </div>
            <contact-form></contact-form>

        </div>

    </section>


@endsection
