<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Desktops.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- google fonts -->
		<!-- Css link -->
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/owl.transitions.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/lightbox.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/preloader.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/image.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/icon.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
		<link rel="icon" href="{{ asset('front/img/logo.svg') }}">


	</head>
	<body id="top">


        <header id="navigation" class="navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Desktops.</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
                    </button>
					<!-- /responsive nav button -->

					<!-- logo -->
					<h1 class="navbar-brand">
						<a href="#body">
                            <img src="{{ asset('front/img/nvnLogo.svg') }}" height="50" width="164" alt="">
                        </a>
					</h1>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav menu">
                        <li>
                            <a href="#top">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#features">
                                Service
                            </a>
                        </li>
                        <li>
                            <a href="#blog">
                                Rental Type
                            </a>
                        </li>
                        <li>
                            <a href="#about">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#contact-form">
                                Contact
                            </a>
                        </li>
                    </ul>
                </nav>
				<!-- /main nav -->

            </div>
        </header>


	<div class="wrapper">
		<section id="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="block">
							<h1>Desktops Rental Website</h1>
							<h2>Whatever your business,Whateveryour budget
                                <br> We'll help you to find the right workspace.</h2>
							<div class="buttons">
								<a href="{{ route('login', ['type' => 'customer']) }}" class="btn btn-learn">Login</a>
								<a href="#" class="btn btn-learn">Register</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="scrolldown">
	            <a id="scroll" href="#features" class="scroll"></a>
	        </div>
		</section>
		<section id="features">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title">
							<h2>OUR BEST SERVICES</h2>
							<p>The services we provide in Desktops</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-xs-6 col-sm-6">
						<div class="feature-block text-center">
							<div class="icon-box">
								<i class="ion-cash"></i>
							</div>
							<h4 class="wow fadeInUp" data-wow-delay=".3s">All-inclusive pricing</h4>
							<p class="wow fadeInUp" data-wow-delay=".5s">Anything you would like to write about this topic<br> here</p>
						</div>
					</div>
					<div class="col-md-4 col-xs-6 col-sm-6">
						<div class="feature-block text-center">
							<div class="icon-box">
								<i class="ion-cube"></i>
							</div>
							<h4 class="wow fadeInUp" data-wow-delay=".3s">Furnished offices</h4>
							<p class="wow fadeInUp" data-wow-delay=".5s">Anything you would like to write about this topic<br> here</p>
						</div>
					</div>
					<div class="col-md-4 col-xs-6 col-sm-6">
						<div class="feature-block text-center">
							<div class="icon-box">
								<i class="ion-clock"></i>
							</div>
							<h4 class="wow fadeInUp" data-wow-delay=".3s">Temporary offices</h4>
							<p class="wow fadeInUp" data-wow-delay=".5s">Anything you would like to write about this topic<br> here</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="blog">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title">
							<h2>Rental Type</h2>
						</div>
						<div id="blog-post" class="owl-carousel">
							<div>
								<div class="block">
									<img src="{{ asset('front/img/blog/blog-4.jpg') }}" alt="" class="img-responsive">
									<div class="content">
										<h4><a href="blog.html">Dedicated Desk</a></h4>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ex itaque repudiandae nihil qui debitis atque necessitatibus aliquam, consequuntur autem!
										</p>
										<a href="blog.html" class="btn btn-read">Show more</a>

									</div>
								</div>
							</div>
							<div>
								<div class="block">
									<img src="{{ asset('front/img/blog/blog-2.jpg') }}" alt="" class="img-responsive">
									<div class="content">
										<h4><a href="blog.html">Standard office</a></h4>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ex itaque repudiandae nihil qui debitis atque necessitatibus aliquam, consequuntur autem!
										</p>
										<a href="blog.html" class="btn btn-read">Show more</a>

									</div>
								</div>
							</div>
							<div>
								<div class="block">
									<img src="{{ asset('front/img/blog/blog-3.jpg') }}" alt="" class="img-responsive">
									<div class="content">
										<h4><a href="blog.html">Whole building office</a></h4>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ex itaque repudiandae nihil qui debitis atque necessitatibus aliquam, consequuntur autem!
										</p>
										<a href="blog.html" class="btn btn-read">Show more</a>

									</div>
								</div>
							</div>
							<div>
								<div class="block">
									<img src="{{ asset('front/img/blog/blog-1.jpg') }}" alt="" class="img-responsive">
									<div class="content">
										<h4><a href="blog.html">meeting rooms</a></h4>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ex itaque repudiandae nihil qui debitis atque necessitatibus aliquam, consequuntur autem!
										</p>
										<a href="blog.html" class="btn btn-read">Show more</a>

									</div>
								</div>
							</div>
							<div>
								<div class="block">
									<img src="{{ asset('front/img/blog/blog-5.jpg') }}" alt="" class="img-responsive">
									<div class="content">
										<h4><a href="blog.html">Training rooms</a></h4>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ex itaque repudiandae nihil qui debitis atque necessitatibus aliquam, consequuntur autem!
										</p>
										<a href="blog.html" class="btn btn-read">Show more</a>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>


		<section id="about">
			<div class="container">
				<div class="row">
					<div class="title">
						<h2>About Us</h2>
						<p>Anything that explanation our project desktops idea <br>Anything Anything</p>
					</div>
					<div class="container">
						<p>
							From the graduation research report, Show what the idea is, and explain it here 👇<br> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text.
						</p>
					</div>
				</div>
			</div>
		</section>

		<section id="contact-form">
			<div class="container">
				<div class="row">
					<div class="title">
						<h2>CONTACT US</h2>
						<p>We are ready to hear what you want to tell us. 😁

							<br> From Here 👇</p>
					</div>

					<div class="col-md-6" style="margin-left:300px">
						<form >
                            <input type="text" class="form-control" placeholder="Name">
                            <input type="text" class="form-control" placeholder="Email">
                            <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                            <button class="btn btn-default" type="submit">SEND</button>
                        </form>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="block">
							<a href="#">
                                <img src="{{ asset('front/img/logo.png') }}" alt="">
                            </a>
							<p>All rights reserved ©</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

		<!-- load Js -->
		<script src="{{ asset('front/js/jquery-1.11.3.min.js') }}"></script>
		<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI14J_PNWVd-m0gnUBkjmhoQyNyd7nllA"></script>
		<script src="{{ asset('front/js/waypoints.min.js') }}"></script>
		<script src="{{ asset('front/js/lightbox.js') }}"></script>
		<script src="{{ asset('front/js/jquery.counterup.min.js') }}"></script>
		<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('front/js/html5lightbox.js') }}"></script>
		<script src="{{ asset('front/js/jquery.mixitup.js') }}"></script>
		<script src="{{ asset('front/js/wow.min.js') }}"></script>
		<script src="{{ asset('front/js/jquery.scrollUp.js') }}"></script>
		<script src="{{ asset('front/js/jquery.sticky.js') }}"></script>
		<script src="{{ asset('front/js/jquery.nav.js') }}"></script>
		<script src="{{ asset('front/js/main.js') }}"></script>
	</body>
</html>
