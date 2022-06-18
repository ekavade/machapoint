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
<link rel="stylesheet" href="{{ url('template/animate/animate.compat.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('css/profile.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('css/mediaquery/mediaprofile.css') }}">
<link rel="stylesheet" href="{{ url('template/circle-flip-slideshow/css/component.css') }}">
<link id="skinCSS" rel="stylesheet" href="{{ url('template/css/skins/default.css') }}">
<link rel="stylesheet" href="{{ url('template/css/simple-line-icons/css/simple-line-icons.min.css') }}">

<script src="{{ url('template/js/template_vendor/modernizr/modernizr.min.js') }}"></script>
@endsection

@section("body")
<section id="profile-nav" class="sticky-top">
	<div class="container-fluid hide-xs">
		<div class="row">
			<div class="col-md-2">
				<a href="profile/home/{{$id}}">
					<img src="{{ url('images/store/'.$store[0]->store_logo) }}" class="img-fluid company-logo" />
				</a>
			</div>
			<div class="col-md-10">
				<ul class="profile-nav">
					<li>
						<a href="{{ url('profile/home/'.$id) }}">Home</a>
					</li>
					<li>
						<a href="{{ url('profile/story/'.$id) }}" class="active">About</a>
					</li>
					<li>
						<a href="{{ route('store.view',['uuid' => $store[0]->uuid ?? 0, 'title' => $store[0]->name]) }}">Products & Services </a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container-fluid hide-sm">
		<div class="row">
			<div class="col-md-12">
				<a href="profile/home/{{$id}}">
					<img src="{{url('images/store/'.$store[0]->store_logo) }}" class="img-fluid company-logo" />
				</a>
			</div>
			<div class="col-md-12">
				<hr />
				<ul class="nav nav-pills nav-fill mt-2">
				  <li class="nav-item">
				    <a class="nav-link" href="{{ url('profile/home/'.$id) }}">Home</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link active" href="{{ url('profile/story/'.$id) }}">About</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="{{ route('store.view',['uuid' => $store[0]->uuid ?? 0, 'title' => $store[0]->name]) }}">Products & Services</a>
				  </li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="section section-angled overlay overlay-show overlay-op-9 border-0 position-relative z-index-0 vh-100 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'fadeIn': true, 'parallaxHeight': '107%'}" data-image-src="{{ url('images/dummy/parallax/parallax-corporate-21-1.jpg') }}">
	<div class="section-angled-layer-bottom section-angled-layer-increase-angle-2 bg-light"></div>
	<div class="section-angled-content h-100 our-stories">
		<div class="container h-100">
			<div class="row align-items-center pb-3 h-100">
				<div class="col text-center pb-5 mb-5">
					<div class="appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="600">
						<h1 class="word-rotator letters type type-clean-light text-color-light font-weight-bold line-height-1 text-9 text-sm-12 text-md-14 text-lg-19 mb-5-5">
							<span>{!! $story_table[0]->quote !!} </span> 
							<span class="word-rotator-words waiting pe-3">
								<b class="is-visible">{!! $story_table[0]->w1 !!}</b>
								<b>{!! $story_table[0]->w2 !!}</b>
								<b>{!! $story_table[0]->w3 !!}</b>
							</span>
						</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="float-up">
	<div class="container">
		<div class="row align-items-center pt-4 appear-animation" data-appear-animation="fadeInLeftShorter">
		@isset($story_table[0]->img1)
			<div class="col-md-4 mb-4 mb-md-0">
				<img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ url('../storage/app/public/'.$story_table[0]->img1) }}" alt="" />
			</div>
		@endisset
		@isset($story_table[0]->content1)
			<div class="col-md-8 ps-md-5">
				
				<p>{!! $story_table[0]->content1 !!}</p>
			</div>
		@endisset
		</div>
	</div>
	<hr class="solid my-5">
	<div class="row align-items-center py-5 appear-animation" data-appear-animation="fadeInRightShorter">
	@isset($story_table[0]->content2)
		<div class="col-md-8 pe-md-5 mb-5 mb-md-0">
			
			<p>{!! $story_table[0]->content2 !!}</p>
		</div>
	@endisset
	@isset($story_table[0]->img2)
		<div class="col-md-4 px-5 px-md-3">
			<img class="img-fluid scale-2 my-4" src="{{ url('../storage/app/public/'.$story_table[0]->img2) }}" alt="style switcher" />
		</div>
	@endisset
	</div>
</section>

<section>
	<div class="container">
		<div class="row justify-content-center pt-5 my-5">
			@isset($story_table[0]->content3)
			<div class="col-lg-8 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">
				<p class="lead">{!! $story_table[0]->content3 !!}</p>
			</div>
			@endisset
		</div>
		<div class="row justify-content-center">

			<div class="col-md-7 col-lg-4 mb-5 mb-lg-0">
				<div class="circular-bar mb-lg-5 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="400">
					<div class="circular-bar-chart" data-percent="25" data-plugin-options="{'barColor': '#444796'}">
						<strong class="mt-2 text-color-primary">25%</strong>
					</div>
				</div>
				<div class="col text-center appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="900">
					<h4 class="font-weight-bold">Meeting</h4>
					<p class="px-3">{!! $story_table[0]->meeting !!}</p>
				</div>
			</div>

			<div class="col-md-7 col-lg-4 mb-5 mb-lg-0">
				<div class="circular-bar mb-lg-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="400">
					<div class="circular-bar-chart" data-percent="50" data-plugin-options="{'barColor': '#444796'}">
						<strong class="mt-2 text-color-primary">50%</strong>
					</div>
				</div>
				<div class="col text-center appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="900">
					<h4 class="font-weight-bold">Execute</h4>
					<p class="px-3">{!! $story_table[0]->execute !!}</p>
				</div>
			</div>

			<div class="col-md-7 col-lg-4">
				<div class="circular-bar mb-lg-5 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
					<div class="circular-bar-chart" data-percent="100" data-plugin-options="{'barColor': '#444796'}">
						<strong class="mt-2 text-color-primary">100%</strong>
					</div>
				</div>
				<div class="col text-center appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="900">
					<h4 class="font-weight-bold">Delivery</h4>
					<p class="px-3">{!! $story_table[0]->delivery !!}</p>
				</div>
			</div>

		</div>

	</div>
</section>

<section id="our-team">
	<div class="container">
		<div class="row py-5 my-5">
			<div class="col-md-6 order-2 order-md-1 text-center text-md-start appear-animation mt-2 pt-1" data-appear-animation="fadeInRightShorter">
				<div class="owl-carousel owl-theme nav-style-1 mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 2}}, 'margin': 25, 'loop': true, 'nav': false, 'dots': false, 'autoplay': true, 'autoplayTimeout': 3000}">
					@for ($i = 0; $i < count($team_table); $i++)
					<div>
						<img class="img-fluid rounded-0 mb-4" src="{{ url('../storage/app/public/'.$team_table[$i]->image) }}" alt="" />
						<h3 class="font-weight-bold text-color-dark text-4 mb-0">{{$team_table[$i]->name}}</h3>
						<p class="text-2 mb-0">{{$team_table[$i]->position}}</p>
					</div>
					@endfor
				</div>
			</div>
			@isset($story_table[0]->meet)
			<div class="col-md-6 order-1 order-md-2 text-md-start mb-5 mb-md-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
				<h2 class="text-color-dark font-weight-normal text-6 mb-2">Meet <strong class="font-weight-extra-bold">Our Team</strong></h2>
				<p class="lead">{!! $story_table[0]->meet !!}</p>
				<!-- <a href="page-team.html" class="btn btn-dark font-weight-semibold rounded-0 px-5 btn-py-2 text-2 p-relative bottom-3">LEARN MORE</a> -->
			</div>
			@endisset
		</div>
	</div>
</section>

<section>
	<div class="container my-5 py-3" id="main">
		<div class="row pt-4">
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
<section class="call-to-action call-to-action-strong-grey content-align-center call-to-action-in-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-lg-9">
				<div class="call-to-action-content">
					<h2 class="font-weight-normal text-6 mb-0">Are you <strong>interested</strong> to delve deeper in this <strong>startup</strong>?</h2>
					<!-- <p class="mb-0">The best HTML template for your new website.</p> -->
					
				</div>
			</div>
			<div class="col-md-3 col-lg-3">
				<div class="call-to-action-btn">
					<a href="#" target="_blank" class="btn btn-modern btn-primary">Visit Website</a>
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
<script type="text/javascript" src="{{ url('template/circle-flip-slideshow/js/jquery.flipshow.js') }}"></script>
<script type="text/javascript" src="{{ url('template/js/views/view.home.js') }}"></script>
<script src="{{ url('template/js/views/view.contact.js') }}"></script>
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