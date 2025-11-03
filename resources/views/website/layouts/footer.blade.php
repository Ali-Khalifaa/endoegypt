<footer class="them-main-footer-section">
    <div class="main-footer-top-section">
        <div class="container">
            <div class="footer-top-item">

                <div class="Subscribe-footer-form">
                    <p>@lang('messages.Latest news delivered right to your inbox!')</p>
                    <form method="post" action="/newsletter">
                        @csrf

                        <input type="text" class="form-input" style="margin-bottom:5px" name="name" placeholder="{{ __('messages.Name') }}"
                            required>
                        <input type="email" class="form-input"  name="email" placeholder="{{ __('messages.Email') }}"
                            required>
                        <button class="tran3s hvr-bounce-to-right" >{{ __('messages.Send') }}</button>
                    </form>
                </div> <!-- /.Subscribe-footer-form -->
            </div> <!-- /.footer-top-item -->
        </div> <!-- /.container -->
    </div> <!-- /.main-footer-top-section -->

    <div class="them-main-footer-containt-item">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <div class="footer-containt-item-text-and-logo">
                        <div class="footer-logo"><a href="/"><img src="/assets/images/authentication/logo.png"
                                    alt="logo"></a></div>
                        <p>@lang("messages.To provide humanitarian and social support to individuals and families in need through sustainable development projects that promote self-reliance and contribute to building a more cohesive and just society.")</p>
                    </div> <!-- /.footer-containt-item-text-and-logo -->
                </div> <!-- /.col -->
                <div class="col-md-7 col-xs-12">
                    <div class="row">
                        <div class="col-xs-6 footer-containt-width">
                            <div class="footer-containt-item">
                                <ul>
                                     <li><a href="/">@lang("messages.HomePage")</a></li>
                                    <li><a href="/events">@lang("messages.Events")</a></li>

                                </ul>
                            </div> <!-- /.footer-containt-item -->
                        </div> <!-- /.col -->
                        <div class="col-xs-6 footer-containt-width">
                            <div class="footer-containt-item">
                                <ul>
                                    <li><a href="/news">@lang("messages.News")</a></li>
                                    <li><a href="/contact">@lang("messages.Contact us")</a></li>
                                </ul>
                            </div> <!-- /.footer-containt-item -->
                        </div> <!-- /.col -->

                    </div> <!-- /.row -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.them-main-footer-containt-item -->

    <div class="main-footer-bottom-section">
        <div class="container">
            <div class="clear-fix">
                <ul class="footer-bottom-left-said">
                    <li><span><a href="#">{{ now()->year . ' - ' . env('APP_NAME') }}</a> All Rights
                            Reserved</span></li>
                </ul> <!-- /.footer-bottom-left-said -->
                <ul class="footer-bottom-right-said">

                    @if ($joinUs->facebook)
                        <li><a href="{{ $joinUs->facebook }}" target="_blank"><i aria-hidden="true"
                                    class="fa fa-facebook"></i><span class="mx-2">@lang('messages.Facebook')</span> </a></li>
                    @endif
                    @if ($joinUs->twitter)
                        <li><a href="{{ $joinUs->twitter }}" target="_blank"><i aria-hidden="true"
                                    class="fa fa-twitter"></i><span class="mx-2">@lang('messages.Twitter')</span></a></li>
                    @endif
                    @if ($joinUs->instagram)
                        <li><a href="{{ $joinUs->instagram }}" target="_blank"><i aria-hidden="true"
                                    class="fa fa-instagram"></i><span class="mx-2">@lang('messages.Instagram')</span></a></li>
                    @endif
                    @if ($joinUs->linkedin)
                        <li><a href="{{ $joinUs->linkedin }}" target="_blank"><i aria-hidden="true"
                                    class="fa fa-linkedin"></i><span class="mx-2">@lang('messages.Linkedin')</span> </a></li>
                    @endif
                    @if ($joinUs->youtube)
                        <li><a href="{{ $joinUs->youtube }}" target="_blank"><i aria-hidden="true"
                                    class="fa fa-youtube"></i><span class="mx-2">@lang('messages.Youtube')</span> </a></li>
                    @endif
                </ul> <!-- /.footer-bottom-right-said -->
            </div> <!-- /.clear-fix -->
        </div> <!-- /.container -->
    </div> <!-- /.main-footer-bottom-section -->
</footer>
















{{--
<footer id="footer-section" class="footer-section">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h4 class="footer-title">@lang('messages.Quick Links')</h4>
                    <ul class="sitemap-widget">
                        <li ><a href="/">@lang('messages.homePage')</a></li>
                        <li><a href="/about-the-club">@lang('messages.About the club')</a></li>
                        <li><a href="/upcoming-matches">@lang('messages.Upcoming Matches')</a></li>
                        <li><a href="/points-table">@lang('messages.Points Table')</a></li>
                        <li><a href="/news">@lang('messages.News')</a></li>
                        <li><a href="/contact">@lang('messages.Contact')</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4 class="footer-title">@lang('messages.Latest News')</h4>
                    <div class="recent-post-widget">
                        @foreach (\App\Models\News::latest()->take(2)->get() as $news)
                        <div class="post-item">
                            <div class="post-date">
                                <img src="{{$news->image}}" alt="News image" style="width: 70px;height:65px" title="News image">
                            </div>
                            <div class="post-desc">
                                <h5 class="post-title">
                                    <a href="/news-details/{{$news->id}}-{{$news->slug}}">{{$news->current_translation->title}}</a></h5>
                                    <span class="post-category" style="color:#fbc02d">{{$news->created_at->format('F d, Y')}}</span>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-lg-3">

                    <h4 class="footer-title">@lang('messages.Social Links')</h4>
                    <ul class="sitemap-widget">
                        @if ($joinUs->facebook)
                            <li><a href="{{$joinUs->facebook}}" target="_blank"><i class="fa fa-facebook"></i><span class="mx-2">@lang('messages.Facebook')</span> </a></li>
                        @endif
                        @if ($joinUs->twitter)
                            <li><a href="{{$joinUs->twitter}}" target="_blank"><i class="fa fa-twitter"></i><span class="mx-2">@lang('messages.Twitter')</span></a></li>
                        @endif
                        @if ($joinUs->instagram)
                        <li><a href="{{$joinUs->instagram}}" target="_blank"><i class="fa fa-instagram"></i><span class="mx-2">@lang('messages.Instagram')</span></a></li>
                        @endif
                        @if ($joinUs->linkedin)
                            <li><a href="{{$joinUs->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i><span class="mx-2">@lang('messages.Linkedin')</span> </a></li>
                        @endif
                        @if ($joinUs->youtube)
                            <li><a href="{{$joinUs->youtube}}" target="_blank"><i class="fa fa-youtube"></i><span class="mx-2">@lang('messages.Youtube')</span> </a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4 class="footer-title">@lang('messages.newsletter')</h4>
                    <form class="footer-subscribe" method="post" action="/newsletter">
                        @csrf
                        <input type="text" class="form-input" name="name" placeholder="{{__('messages.Name')}}" required>
                        <input type="email" class="form-input" name="email" placeholder="{{__('messages.Email')}}" required>
                        <input type="submit" class="form-input" value="{{__('messages.Send')}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 text-center">
                    <div class="copyright">
                        <p>&copy; {{now()->year}} All Rights Reserved | Made with <i class="fa fa-heart-o"></i> by <a target="_blank" href="https://innovations-eg.com/" >Innovation Agency.</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>


<!-- Search Modal Start -->
<div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" class="fa fa-close"></span>
    </button>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="search-block clearfix">
                <form>
                    <div class="form-group">
                        <input class="form-control" placeholder="eg: Soccer News" type="text">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Start scrollUp  -->
<div id="return-to-top">
    <span>@lang('messages.Top')</span>
</div> --}}
<!-- End scrollUp  -->
<script src="/website/MinifiedJs.js"></script>


@if (session()->has('success'))
    <script>
        window.Swal.fire({
            icon: 'success',
            title: '{{ session()->get('success') }}',
            showConfirmButton: false,
            timer: 8000
        });
    </script>
@endif
@if (session()->has('error'))
    <script>
        window.Swal.fire({
            icon: 'error',
            title: '{{ session()->get('error') }}',
            showConfirmButton: false,
            timer: 8000
        });
    </script>
@endif



@stack('scripts')
