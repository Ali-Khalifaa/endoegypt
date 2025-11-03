<section>
    <div class="Theme-Inner-Banner inner-banner-bg-img-one">
        {{-- @if (isset($image))
            <img src="{{ $image }}" alt="Banner image">
        @else
            <img src="/website/images/breadcrumbs/blog-left.jpg" alt="Banner image">
        @endif --}}
        <div class="banner-opacity">
            <div class="container">
                <div class="banner-content">
                    <h1>{{ $currentPage }}</h1>
                    <p>@lang('messages.banner_subtitle')</p>
                    <ul>
                        <li><a href="/">@lang('messages.homePage')</a></li>
                        <li><span>-</span></li>

                        @if (isset($parentPage))
                        <li><a href="/{{ $parentPageUri }}">{{ $parentPage }}</a></li>
                        <li><span>-</span></li>
                        @endif

                        <li><a href="#">{{ $currentPage }}</a></li>
                    </ul>
                    {{-- <a href="#" class="hvr-bounce-to-right">@lang('messages.need_help')</a> --}}
                </div>
            </div>
        </div>
    </div>
</section>
