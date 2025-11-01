		<section class="header-section">
				<div class="top-header">
					<div class="container">
						<div class="clear-fix" >
							<ul class="float-left top-header-left ">
                                <li class="">
                                    <a href="/change-language/{{app()->getLocale() == 'ar' ? 'en' : 'ar'}}" >
                                        <img style="display: inline-block;width: 30px;border-radius: 50%;height: 30px;margin: 0 5px;" src="{{asset(app()->getLocale() != 'ar' ? 'assets/images/flags/uae_flag.jpg' : 'assets/images/flags/us_flag.jpg')}}"
                                             alt="Current Language Flag"
                                             class="flag-icon">
                                        <span>{{ app()->getLocale() != 'ar' ? "العربية" : 'English' }}</span>

                                    </a>

                                </li>		</ul> <!-- /.top-header-left -->
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
							</ul> <!-- /.top-header-right -->
						</div> <!-- /.clear-fix -->
					</div> <!-- /.container -->
				</div> <!-- /.top-header -->
				<div class="middle-header">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-xs-12">
								<div class="them-logo"><a href="/"><img src="/assets/images/authentication/logo.png" alt="logo"></a></div><!-- /.them-logo -->
							</div> <!-- /.col -->
							<div class="col-md-8 col-xs-12">
								<div class="middle-header-contant">
									<ul class="clear-fix">
										<li>
											<i class="flaticon-clock"></i>
											<p>Monday - Saturday</p>
											<span>10 am to 06 pm</span>
										</li>
										<li>
											<i class="flaticon-smartphone"></i>
											<p>Want to talk with us</p>
											<span>+88 01912704287</span>
										</li>
										<li>
											<i class="flaticon-envelope"></i>
											<p>Send me Emial</p>
											<a href="#"><span class="__cf_email__" data-cfemail="fd94939b92a29ebd9a909c9491d39e9290">[email&#160;protected]</span></a>
										</li>
									</ul> <!-- /.clear-fix -->
								</div> <!-- /.middle-header-contant -->
							</div> <!-- /.col -->
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.middle-header -->

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
										<li class="dropdown-holder active current-page-item Active-manu"><a href="index.html">Home</a>
											<ul class="sub-menu">
												<li><a href="index.html" class="tran3s">Home Version one</a></li>
											</ul>
										</li>

										<li class="dropdown-holder"><a href="#">Events</a>
											<ul class="sub-menu">
												<li><a href="events-v1.html" class="tran3s">Events Version one</a></li>
												<li><a href="events-v2.html" class="tran3s">Events Version two</a></li>
												<li><a href="events-details.html" class="tran3s">Events Details</a></li>
											</ul>
										</li>




										<li class="dropdown-holder"><a href="#">Blog</a>
											<ul class="sub-menu">
												<li><a href="blog-v1.html" class="tran3s">Blog Version one</a></li>
												<li><a href="blog-v2.html" class="tran3s">Blog Version Two</a></li>
												<li><a href="blog-details.html" class="tran3s">Blog Details</a></li>
											</ul>
										</li>

										<li class="dropdown-holder"><a href="#">Shop</a>
											<ul class="sub-menu">
												<li><a href="shop.html" class="tran3s">Shop</a></li>
												<li><a href="shop-details.html" class="tran3s">Shop Details</a></li>
											</ul>
										</li>

										<li><a href="contact-us.html">Contact</a></li>
									</ul>
								</div><!-- /.navbar-collapse -->
							</nav>

							<div class="float-right">
								<div class="search-button-content clear-fix">

						   			<a href="#" class="a-comon main-menu-button">Donation <i class="flaticon-hand"></i></a>
						   		</div> <!-- /.right-content -->
							</div> <!-- /.float-right -->
						</div> <!-- / menu-skew-div -->
					</div> <!-- /.container main-menu -->
				</div> <!-- /.main-menu -->
			</section>





