		<section class="header-section">
				<div class="top-header">
					<div class="container">
						<div class="clear-fix" >
							<ul class="float-left top-header-left ">
                                <li class="">
                                    <a href="javascript:void()" id="change-language" data-lang="{{ app()->getLocale() == 'ar' ? 'en' : 'ar' }}">
                                        <img style="display: inline-block;width: 30px;border-radius: 50%;height: 30px;margin: 0 5px;"
                                             src="{{ asset(app()->getLocale() != 'ar' ? 'assets/images/flags/eg.webp' : 'assets/images/flags/us_flag.jpg') }}"
                                             alt="Current Language Flag"
                                             class="flag-icon">
                                        <span>{{ app()->getLocale() != 'ar' ? "العربية" : 'English' }}</span>
                                    </a>


                                </li>
                            	</ul> <!-- /.top-header-left -->
							<ul class="float-right top-header-right">
								    @if ($joinUs->facebook)
                                        <li><a href="{{$joinUs->facebook}}" target="_blank"><i class="fa fa-facebook"></i> </a></li>
                                    @endif
                                    @if ($joinUs->twitter)
                                        <li><a href="{{$joinUs->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if ($joinUs->instagram)
                                    <li><a href="{{$joinUs->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    @endif
                                    @if ($joinUs->linkedin)
                                        <li><a href="{{$joinUs->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i> </a></li>
                                    @endif
                                    @if ($joinUs->youtube)
                                        <li><a href="{{$joinUs->youtube}}" target="_blank"><i class="fa fa-youtube"></i> </a></li>
                                    @endif
							</ul>
						</div>
					</div>
				</div>
				{{-- <div class="middle-header">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-xs-12">
								<div class="them-logo"><a href="/"><img src="/assets/images/authentication/logo.png" alt="logo"></a></div><!-- /.them-logo -->
							</div> <!-- /.col -->
                            <div class="col-md-8 col-xs-12">

                            </div> <!-- /.col -->		</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.middle-header --> --}}

				<!-- Theme Main Menu ____________________________ -->
				<div class="theme-main-menu">
					<div class="container">
						<div class="main-menu menu-skew-div clear-fix">
							<!-- Menu -->
							<nav class="navbar">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed tran3s" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
										<span class="sr-only tran3s">Toggle navigation</span>
										<span class="icon-bar tran3s"></span>
										<span class="icon-bar tran3s"></span>
										<span class="icon-bar tran3s"></span>
									</button>
								</div>

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="navbar-collapse-1">
									<ul class="nav navbar-nav">
                                        <li class="dropdown-holder {{ request()->is('/') ? 'active current-page-item Active-manu' : '' }}">
                                            <a href="/">@lang("messages.HomePage")</a>
                                        </li>

                                        <li class="dropdown-holder {{ request()->is('events*') || request()->is('event-details*') ? 'active current-page-item Active-manu' : '' }}">
                                            <a href="/events">@lang("messages.Events")</a>
                                        </li>

                                        <li class="dropdown-holder {{ request()->is('news*')  || request()->is('news-details*')? 'active current-page-item Active-manu' : '' }}">
                                            <a href="/news">@lang("messages.News")</a>
                                        </li>

                                        <li class="{{ request()->is('contact') ? 'active current-page-item Active-manu' : '' }}">
                                            <a href="/contact">@lang("messages.Contact")</a>
                                        </li>		</ul>
								</div><!-- /.navbar-collapse -->
							</nav>

							<div class="float-right">
								<div class="search-button-content clear-fix">

						   			<a href="/" class="a-comon main-menu-button">
                                        								<div class="them-logo">
                                                                            <img src="/assets/images/authentication/logo.png" alt="logo" style="height:80px"></div><!-- /.them-logo -->


                                    </a>
						   		</div> <!-- /.right-content -->
							</div> <!-- /.float-right -->
						</div> <!-- / menu-skew-div -->
					</div> <!-- /.container main-menu -->
				</div> <!-- /.main-menu -->
			</section>





