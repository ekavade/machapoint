@extends("front.layout.master")
@section('meta_tags')
<link rel="canonical" href="{{ url()->current() }}"/>
<meta name="keywords" content="{{ isset($seoset) ? $seoset->metadata_key : '' }}">
<meta property="og:title" content="{{ isset($seoset) ? $seoset->project_name : config('app.name') }}" />
<meta property="og:description" content="{{ isset($seoset) ? $seoset->metadata_des : '' }}" />
<meta property="og:type" content="WebPage"/>
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ url('images/genral/'.$front_logo) }}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:image" content="{{ url('images/genral/'.$front_logo) }}" />
<meta name="twitter:description" content="{{ isset($seoset) ? $seoset->metadata_des : '' }}" />
<meta name="twitter:site" content="{{ url()->current() }}" />
<script type="application/ld+json">{"@context":"https:\/\/schema.org","@type":"WebPage","description":"{{ isset($seoset) ? $seoset->metadata_des : '' }}","image":"{{ url('images/genral/'.$front_logo) }}"}</script>

@endsection
@section('stylesheet')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ url('template/css/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ url('template/animate/animate.compat.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('css/profile.css') }}">
<link rel="stylesheet" href="{{ url('template/circle-flip-slideshow/css/component.css') }}">
<link id="skinCSS" rel="stylesheet" href="{{ url('template/css/skins/default.css') }}">
<link rel="stylesheet" href="{{ url('template/css/simple-line-icons/css/simple-line-icons.min.css') }}">
<link rel="stylesheet" href="{{ url('template/css/magnific-popup/magnific-popup.min.css') }}">

<script src="{{ url('template/js/template_vendor/modernizr/modernizr.min.js') }}"></script>
@endsection

@section("body")
<section id="profile-nav" class="sticky-top">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<a href="profile/home/12">
					<img src="{{ url('images/dummy/company_logo02.png') }}" class="img-fluid company-logo" />
				</a>
			</div>
			<div class="col-md-10">
				<ul class="profile-nav">
					<li>
						<a href="{{ url('profile/home/12') }}">Home</a>
					</li>
					<li>
						<a href="{{ url('profile/story/12') }}">About</a>
					</li>
					<li>
						<a href="{{ url('store/96361833-9ee7-4e1c-8cce-c81b3f9c1099/Abhay%20store') }}" class="active">Products & Services</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="section bg-color-light-scale-2 position-relative border-0 m-0 profile-page" style="margin-bottom: 60px !important;">
	<div class="position-absolute top-0 left-0 w-50pct w-lg-auto d-none d-xl-block">
		<img src="{{ url('images/dummy/slides/slide-corporate-8-1-1.jpg') }}" class="w-100 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1000" data-appear-animation-duration="1s" alt="">
	</div>
	<div class="position-absolute top-0 right-0 w-50pct w-lg-auto d-none d-xl-block">
		<img src="{{ url('images/dummy/slides/slide-corporate-8-1-2.jpg') }}" class="w-100 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1000" data-appear-animation-duration="1s" alt="">
	</div>
	<div class="container py-5 my-5">
		<div class="row justify-content-center py-3">
			<div class="col-lg-7 text-center">
				<div class="d-flex flex-column align-items-center justify-content-center h-100">
					<h3 class="position-relative text-color-dark text-5 line-height-5 font-weight-semibold ls-0 px-4 mb-2 appear-animation" data-appear-animation="fadeInDownShorterPlus" data-plugin-options="{'minWindowWidth': 0}">
						<span class="position-absolute right-100pct top-50pct transform3dy-n50 opacity-7">
							<img src="{{ url('images/dummy/slides/slide-title-border-light.png') }}" class="w-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
						</span>
						PORTO TEMPLATE
						<span class="position-absolute left-100pct top-50pct transform3dy-n50 opacity-7">
							<img src="{{ url('images/dummy/slides/slide-title-border-light.png') }}" class="w-auto appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
						</span>
					</h3>
					<h1 class="text-color-dark font-weight-extra-bold text-10 text-md-12-13 line-height-1 mb-2 appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">INCREDIBLE DESIGNS</h1>
					<p class="text-4-5 text-color-dark font-weight-light opacity-7 text-center mb-4" data-plugin-animated-letters data-plugin-options="{'startDelay': 1000, 'minWindowWidth': 0, 'animationSpeed': 30}">Porto is a huge success in the one of world's largest MarketPlace.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container py-4">

		<div class="row">
			<div class="col" style="min-height: 250px;">

				<div class="row portfolio-list lightbox" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
					<div class="col-12 col-sm-6 col-lg-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="200">
						<div class="portfolio-item">
							<span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
								<span class="thumb-info-wrapper border-radius-0">
									<img src="{{ url('images/dummy/projects/project-1.jpg') }}" class="img-fluid border-radius-0" alt="">
									<span class="thumb-info-action">
										<a href="{{ url('images/dummy/projects/project-1.jpg') }}" class="lightbox-portfolio">
											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
										</a>
									</span>
								</span>
							</span>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="600">
						<div class="portfolio-item">
							<span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
								<span class="thumb-info-wrapper border-radius-0">
									<img src="{{ url('images/dummy/projects/project-25.jpg') }}" class="img-fluid border-radius-0" alt="">
									<span class="thumb-info-action">
										<a href="{{ url('images/dummy/projects/project-25.jpg') }}" class="lightbox-portfolio">
											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
										</a>
									</span>
								</span>
							</span>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 appear-animation" data-appear-animation="expandIn">
						<div class="portfolio-item">
							<span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
								<span class="thumb-info-wrapper border-radius-0">
									<img src="{{ url('images/dummy/projects/project-3.jpg') }}" class="img-fluid border-radius-0" alt="">
									<span class="thumb-info-action">
										<a href="{{ url('images/dummy/projects/project-3.jpg') }}" class="lightbox-portfolio">
											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
										</a>
									</span>
								</span>
							</span>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="400">
						<div class="portfolio-item">
							<span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
								<span class="thumb-info-wrapper border-radius-0">
									<img src="{{ url('images/dummy/projects/project-1-2') }}.jpg" class="img-fluid border-radius-0" alt="">
									<span class="thumb-info-action">
										<a href="{{ url('images/dummy/projects/project-1-2') }}.jpg" class="lightbox-portfolio">
											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
										</a>
									</span>
								</span>
							</span>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="200">
						<div class="portfolio-item">
							<span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
								<span class="thumb-info-wrapper border-radius-0">
									<img src="{{ url('images/dummy/projects/project-1.jpg') }}" class="img-fluid border-radius-0" alt="">
									<span class="thumb-info-action">
										<a href="{{ url('images/dummy/projects/project-1.jpg') }}" class="lightbox-portfolio">
											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
										</a>
									</span>
								</span>
							</span>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="600">
						<div class="portfolio-item">
							<span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
								<span class="thumb-info-wrapper border-radius-0">
									<img src="{{ url('images/dummy/projects/project-25.jpg') }}" class="img-fluid border-radius-0" alt="">
									<span class="thumb-info-action">
										<a href="{{ url('images/dummy/projects/project-25.jpg') }}" class="lightbox-portfolio">
											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
										</a>
									</span>
								</span>
							</span>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 appear-animation" data-appear-animation="expandIn">
						<div class="portfolio-item">
							<span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
								<span class="thumb-info-wrapper border-radius-0">
									<img src="{{ url('images/dummy/projects/project-3.jpg') }}" class="img-fluid border-radius-0" alt="">
									<span class="thumb-info-action">
										<a href="{{ url('images/dummy/projects/project-3.jpg') }}" class="lightbox-portfolio">
											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
										</a>
									</span>
								</span>
							</span>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="400">
						<div class="portfolio-item">
							<span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
								<span class="thumb-info-wrapper border-radius-0">
									<img src="{{ url('images/dummy/projects/project-1-2') }}.jpg" class="img-fluid border-radius-0" alt="">
									<span class="thumb-info-action">
										<a href="{{ url('images/dummy/projects/project-1-2') }}.jpg" class="lightbox-portfolio">
											<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
										</a>
									</span>
								</span>
							</span>
						</div>
					</div>
					<div class="col-12 text-center">
						<a href="">View All Products</a>
					</div>
				</div>

			</div>
		</div>

	</div>
</section>
<section>
	<div class="home-intro" id="home-intro">
		<div class="container">

			<div class="row align-items-center">
				<div class="col text-center">
					<p class="mb-0">
						The fastest way to grow your business with the leader in <span class="highlighted-word highlighted-word-animation-1 text-color-primary font-weight-semibold text-5">Technology</span>
						<span>Check out our options and features included.</span>
					</p>
				</div>
			</div>

		</div>
	</div>
</section>
<section>
	<div class="container my-5 py-3">
		<div class="row pt-4">
			<div class="col-12 text-center">
				<h2 class="font-weight-normal text-6" style="margin-bottom: 60px;">Our <strong class="font-weight-extra-bold">Services</strong></h2>
			</div>
			<div class="col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
				<div class="feature-box feature-box-style-2">
					<div class="feature-box-icon">
						<i class="icon-user-following icons"></i>
					</div>
					<div class="feature-box-info">
						<h4 class="font-weight-bold mb-2">Customer Support</h4>
						<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 appear-animation" data-appear-animation="fadeIn">
				<div class="feature-box feature-box-style-2">
					<div class="feature-box-icon">
						<i class="icon-layers icons"></i>
					</div>
					<div class="feature-box-info">
						<h4 class="font-weight-bold mb-2">Sliders</h4>
						<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
				<div class="feature-box feature-box-style-2">
					<div class="feature-box-icon">
						<i class="icon-calculator icons"></i>
					</div>
					<div class="feature-box-info">
						<h4 class="font-weight-bold mb-2">HTML5</h4>
						<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-lg-3">
			<div class="col-lg-4">
				<div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="300">
					<div class="feature-box-icon">
						<i class="icon-star icons"></i>
					</div>
					<div class="feature-box-info">
						<h4 class="font-weight-bold mb-2">Icons</h4>
						<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="100">
					<div class="feature-box-icon">
						<i class="icon-drop icons"></i>
					</div>
					<div class="feature-box-info">
						<h4 class="font-weight-bold mb-2">Colors</h4>
						<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300">
				<div class="feature-box feature-box-style-2">
					<div class="feature-box-icon">
						<i class="icon-mouse icons"></i>
					</div>
					<div class="feature-box-info">
						<h4 class="font-weight-bold mb-2">Buttons</h4>
						<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-lg-3">
			<div class="col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="400">
				<div class="feature-box feature-box-style-2">
					<div class="feature-box-icon">
						<i class="icon-screen-desktop icons"></i>
					</div>
					<div class="feature-box-info">
						<h4 class="font-weight-bold mb-2">Lightboxes</h4>
						<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="200">
				<div class="feature-box feature-box-style-2">
					<div class="feature-box-icon">
						<i class="icon-energy icons"></i>
					</div>
					<div class="feature-box-info">
						<h4 class="font-weight-bold mb-2">Elements</h4>
						<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
				<div class="feature-box feature-box-style-2">
					<div class="feature-box-icon">
						<i class="icon-social-youtube icons"></i>
					</div>
					<div class="feature-box-info">
						<h4 class="font-weight-bold mb-2">Videos</h4>
						<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section section-height-3 bg-color-grey-scale-1 border-0 m-0 appear-animation" data-appear-animation="fadeIn" id="testimonial-section">
	<div class="container">
		<div class="row">
			<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">

				<div class="owl-carousel owl-theme nav-bottom rounded-nav mb-0" data-plugin-options="{'items': 1, 'loop': false, 'autoHeight': true, 'dots': true}">
					<div>
						<div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark mb-0">
							<div class="testimonial-author">
								<img src="{{ url('images/dummy/clients/client-1.jpg') }}" class="img-fluid rounded-circle" alt="">
							</div>
							<blockquote>
								<p class="text-color-dark text-5 line-height-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget risus porta, tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ante tellus, convallis non consectetur sed, pharetra nec ex.</p>
							</blockquote>
							<div class="testimonial-author">
								<p><strong class="font-weight-extra-bold text-2">- John Smith. Okler</strong></p>
							</div>
						</div>
					</div>
					<div>
						<div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark mb-0">
							<div class="testimonial-author">
								<img src="{{ url('images/dummy/clients/client-1.jpg') }}" class="img-fluid rounded-circle" alt="">
							</div>
							<blockquote>
								<p class="text-color-dark text-5 line-height-5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget risus porta, tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</blockquote>
							<div class="testimonial-author">
								<p><strong class="font-weight-extra-bold text-2">- John Smith. Okler</strong></p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<!-- Vendor -->
<script src="{{ url('template/js/template_vendor/jquery.appear/jquery.appear.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/jquery.validation/jquery.validate.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/lazysizes/lazysizes.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/isotope/jquery.isotope.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/vide/jquery.vide.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/vivus/vivus.min.js') }}"></script>

<script type="text/javascript" src="{{ url('template/js/theme.js') }}"></script>
<script type="text/javascript" src="{{ url('template/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ url('template/js/theme.init.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.our-features-box').css('display', 'none');
		$('.cnt-home').css('background-color', 'white');
		$('.scroll-to-top').css('display', 'none');
	});
</script>
@endsection