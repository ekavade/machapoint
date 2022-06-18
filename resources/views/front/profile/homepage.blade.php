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

<script src="{{ url('template/js/template_vendor/modernizr/modernizr.min.js') }}"></script>
@endsection
@section("body")
<section id="profile-nav" class="sticky-top">
	<div class="container-fluid hide-xs">
		<div class="row">
			<div class="col-md-2">
				<a href="profile/home/{{$id}}">
					<img src="{{ url('images/store/'.$store[0]->store_logo_rect) }}" class="img-fluid company-logo" />
				</a>
			</div>
			<div class="col-md-10">
				<ul class="profile-nav">
					<li>
						<a href="{{ url('profile/home/'.$id) }}" class="active">Home</a>
					</li>
					<li>
						<a href="{{ url('profile/story/'.$id) }}">About</a>
					</li>
					<li>
						<a href="{{ route('store.view',['uuid' => $store[0]->uuid ?? 0, 'title' => $store[0]->name]) }}">Products & Services</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container-fluid hide-sm">
		<div class="row">
			<div class="col-md-12">
				<a href="profile/home/{{$id}}">
					<img src="{{ url('images/store/'.$store[0]->store_logo) }}" class="img-fluid company-logo" />
				</a>
			</div>
			<div class="col-md-12">
				<hr />
				<ul class="nav nav-pills nav-fill mt-2">
				  <li class="nav-item">
				    <a class="nav-link active" href="{{ url('profile/home/'.$id) }}">Home</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="{{ url('profile/story/'.$id) }}">About</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="{{ route('store.view',['uuid' => $store[0]->uuid ?? 0, 'title' => $store[0]->name]) }}">Products & Services</a>
				  </li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="owl-carousel owl-theme">
		<?php 
        for ($i = 0; $i < count($images); $i++) {
			if($images[$i] == ''){
				continue;
			?>
				<div class="item">
					<img src="{{ url('images/store/'.$images[$i]->image_name) }}" class="img-fluid" />
				</div>
			<?php
			}
		?>
           <div class="item">
			<img src="{{ url('../storage/app/public/'.$images[$i]) }}" alt="" class="img-fluid story-image">
		</div>
        <?php }?>
		
	</div>
</section>

@isset($v[0]->content1)
<section class="section section-height-3 bg-color-grey-scale-1 m-0 border-0">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-6 pb-sm-4 pb-lg-0 pe-lg-5 mb-sm-5 mb-lg-0">
				
				<p>{!! $v[0]->content1 !!}</p>
			</div>
			<div class="col-sm-8 col-md-6 col-lg-4 offset-sm-4 offset-md-4 offset-lg-2 position-relative mt-sm-5" style="top: 1.7rem;">
				<img src="{{ url('../storage/app/public/'.$v[0]->image1) }}" id="img_square1" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="300" style="top: 10%; left: -50%;" alt="" />
				<img src="{{ url('../storage/app/public/'.$v[0]->image2) }}" id="img_square2" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" style="top: -33%; left: -29%;" alt="" />
				<img src="{{ url('../storage/app/public/'.$v[0]->image3) }}" id="img_square3" class="img-fluid position-relative appear-animation mb-2" data-appear-animation="expandIn" data-appear-animation-delay="600" alt="" />
			</div>
		</div>
	</div>
</section>
@endisset
@isset($v[0]->content2)
<section class="mt-3 mb-5">
	<div class="container">
		<div class="row text-center pt-3">
			<div class="col-md-10 mx-md-auto">
				<!-- <h1 class="word-rotator slide font-weight-bold text-8 mb-3 appear-animation" data-appear-animation="fadeInUpShorter">
					<span>Porto is </span>
					<span class="word-rotator-words bg-dark">
						<b class="is-visible">incredibly</b>
						<b>especially</b>
						<b>extremely</b>
					</span>
					<span> beautiful and fully responsive.</span>
				</h1> -->
				<p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
					{!!$v[0]->content2!!}
				</p>
			</div>
		</div>
	</div>

	<div class="appear-animation flip-section" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
		<div class="home-concept mt-5">
			<div class="container">

				<div class="row text-center">
					<span class="sun"></span>
					<span class="cloud"></span>
					<div class="col-lg-2 ms-lg-auto">
						<div class="process-image">
							<img src="{{ url('../storage/app/public/'.$images2[0]) }}" alt="" />
							<strong>Strategy</strong>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="process-image process-image-on-middle">
							<img src="{{ url('../storage/app/public/'.$images2[1]) }}" alt="" />
							<strong>Planning</strong>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="process-image">
							<img src="{{ url('../storage/app/public/'.$images2[2]) }}" alt="" />
							<strong>Build</strong>
						</div>
					</div>
					<div class="col-lg-4 ml-lg-auto">
						<div class="project-image">
							<div id="fcSlideshow" class="fc-slideshow">
								<ul class="fc-slides">
									<li><a href="#"><img class="img-fluid" src="{{ url('../storage/app/public/'.$images2[0]) }}" alt="" /></a></li>
									<li><a href="#"><img class="img-fluid" src="{{ url('../storage/app/public/'.$images2[1]) }}" alt="" /></a></li>
									<li><a href="#"><img class="img-fluid" src="{{ url('../storage/app/public/'.$images2[2]) }}" alt="" /></a></li>
								</ul>
							</div>
							<strong class="our-work">Our Work</strong>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

</section>
@endisset
<section class="section section-height-5 section-angled border-0 overlay overlay-show overlay-op-9 position-relative z-index-0 m-0 counter-section" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'fadeIn': true, 'parallaxHeight': '130%'}" data-image-src="{{ url('images/dummy/parallax/parallax-corporate-21-2.jpg') }}">
	<div class="section-angled-layer-top section-angled-layer-increase-angle bg-light"></div>
	<div class="section-angled-content position-relative">
		<div class="container mb-5-5">
			@isset($v[0]->tag)
			<div class="row">
				<div class="col text-center">
					<h2 class="text-color-light font-weight-bold text-10 mb-5">{!!$v[0]->tag!!}</h2>
				</div>
			</div>
			@endisset
			<div class="row counters">
			@isset($v[0]->name1)
				<div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
					<div class="counter">
						<strong data-to="{!!$v[0]->num1!!}" data-append= "{{ $v[0]->sign1 ?? ''}}" class="text-color-light text-16 line-height-1">{!!$v[0]->num1!!}</strong>
						<span class="text-color-grey text-5">{!!$v[0]->name1!!}</span>
					</div>
				</div>
				@endisset
				@isset($v[0]->name2)
				<div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
					<div class="counter">
						<strong data-to="{!!$v[0]->num2!!}" data-append= "{{ $v[0]->sign2 ?? ''}}" class="text-color-primary text-16 line-height-1">{!!$v[0]->num2!!}</strong>
						<span class="text-color-grey text-5">{!!$v[0]->name2!!}</span>
					</div>
				</div>
				@endisset
				<div class="col-sm-6 col-lg-3 mb-4 mb-sm-0">
					<div class="counter">
						<strong data-to="{!!$v[0]->num3!!}" data-append="{{ $v[0]->sign3 ?? ''}}" class="text-color-light text-16 line-height-1">{!!$v[0]->num3!!}</strong>
						<span class="text-color-grey text-5">{!!$v[0]->name3!!}</span>
					</div>
				</div>
				@isset($v[0]->name4)
				<div class="col-sm-6 col-lg-3">
					<div class="counter">
						<strong data-to="{!!$v[0]->num4!!}" data-append= "{{ $v[0]->sign4 ?? ''}}" class="text-color-primary text-16 line-height-1">{!!$v[0]->num4!!}</strong>
						<span class="text-color-grey text-5">{!!$v[0]->name4!!}</span>
					</div>
				</div>
				@endisset
			</div>
		</div>
	</div>
	
	
</section>

<section class="floating">
	<div class="container">
		<div class="row mt-3 mb-5">
			@isset($v[0]->our_mission)
			<div class="col-md-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="800">
				<h3 class="font-weight-bold text-4 mb-2"></h3>
				<p>{!!$v[0]->our_mission!!}</p>
			</div>
			@endisset
			@isset($v[0]->our_vision)
			<div class="col-md-4 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="600">
				<h3 class="font-weight-bold text-4 mb-2"></h3>
				<p>{!!$v[0]->our_vision!!}</p>
			</div>
			@endisset
			@isset($v[0]->why_us)
			<div class="col-md-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="800">
				<h3 class="font-weight-bold text-4 mb-2"></h3>
				<p>{!!$v[0]->why_us!!}</p>
			</div>
			@endisset
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
<script type="text/javascript" src="{{ url('OwlCarousel2/dist/owl.carousel.min.js') }}"></script>


<!-- Vendor -->
<script src="{{ url('template/js/template_vendor/jquery.appear/jquery.appear.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/jquery.validation/jquery.validate.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/lazysizes/lazysizes.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/isotope/jquery.isotope.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/vide/jquery.vide.min.js') }}"></script>
<script src="{{ url('template/js/template_vendor/vivus/vivus.min.js') }}"></script>

<script type="text/javascript" src="{{ url('template/js/theme.js') }}"></script>
<script type="text/javascript" src="{{ url('template/circle-flip-slideshow/js/jquery.flipshow.js') }}"></script>
<script type="text/javascript" src="{{ url('template/js/views/view.home.js') }}"></script>
<script type="text/javascript" src="{{ url('template/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ url('template/js/theme.init.js') }}"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$('.owl-carousel').owlCarousel({
			items:1,
			margin:10,
			autoHeight:true,
			nav:false,
			autoplay: true,
			autoplayTimeout:3500,
			loop: true,
			dots: false
		});

		$('.our-features-box').css('display', 'none');
		$('.cnt-home').css('background-color', 'white');
		$('.scroll-to-top').css('display', 'none');
	});
</script>
@endsection