<div class="rs-breadcrumbs sec-color">
    @if (isset($image))
        <img src="{{$image}}" alt="Breadcrubs-image">

        @else

        <img src="/website/images/breadcrumbs/blog-left.jpg" alt="Breadcrubs-image">

    @endif
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">{{$currentPage}}</h1>
                    <ul>
                        <li>
                            <a class="active" href="/">@lang('messages.homePage')</a>
                        </li>

                        @if (isset($parentPage))
                        <li>
                            <a  href="/{{$parentPageUri}}">{{$parentPage}}</a>
                        </li>
                        @endif

                        <li>
                            {{$currentPage}}
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
