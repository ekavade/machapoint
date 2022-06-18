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
<link rel="stylesheet" type="text/css" href="{{ url('OwlCarousel2/dist/assets/owl.carousel.min.css') }}">
<style type="text/css">
	section.stories .owl-prev {
		position: absolute;
    bottom: 110px;
    left: 220px;
	}
	section.stories .owl-next {
		position: absolute;
    bottom: 110px;
    right: 220px;
	}
	#story-content {
		height: 530px;
		overflow: auto;
	}
	#story-content::-webkit-scrollbar {
		width: 0;
		background: transparent;
	}
</style>
@endsection
@section("body")
<section class="stories">
	<div class="container">
		<div class="row mt-4">
			<div class="col-md-10" id="story-content">
				<?php
				for($i = 1; $i <= 5; $i++) {
				?>
				<div class="row" id="story<?php echo $i; ?>">
					<div class="col-md-3">
						<div class="form-group">
							<a href="{{url('/')}}"><img src="{{ url('images/ionic-md-arrow-back.png') }}" height="20px" /></a>
						</div>
						<div class="form-group">
							<img src="{{ url('/images/dummy/company_logo01.png') }}" class="company-logo">
							<p class="company-name">COMPANY <?php echo $i; ?> NAME</p>
						</div>
					</div>
					<div class="col-md-9">
						<div class="companies">
							<div class="company-item">
								<div class="owl-carousel owl-theme">
									{{-- loop through stories --}}
									<div class="item">
										<img src="{{ url('images/dummy/story01.png') }}" alt="" class="img-fluid story-image">
									</div>
									<div class="item">
										<img src="{{ url('images/dummy/story01.png') }}" alt="" class="img-fluid story-image">
									</div>
									<div class="item">
										<img src="{{ url('images/dummy/story01.png') }}" alt="" class="img-fluid story-image">
									</div>
								</div>
								<div class="company-attr">
									<ul>
										<li>
											<a href="#">
												<img src="{{ url('images/awesome-thumbs-up.png') }}" alt="" class="img-fluid">
												<p>10K likes</p>
											</a>
										</li>
										<li>
											<a href="">
												<img src="{{ url('images/awesome-building.png') }}" alt="" class="img-fluid">
												<p>Profile</p>
											</a>
										</li>
										<li>
											<a href="">
												<img src="{{ url('images/awesome-shopping-cart.png') }}" alt="" class="img-fluid">
												<p>Shop</p>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
				?>
			</div>
			<div class="col-md-2">
				<input type="hidden" value="1" id="currentStory">
				<div class="row company-swatch">
					<div class="col-md-12">
						<input type="hidden" value="5" id="totalStory">
						<button type="button" style="display: none;" role="presentation" class="up" id="prevStoryBtn" onclick="javascript:prevStory()">
							<img src="{{ url('images/awesome-arrow-alt-circle-up.png') }}" />
						</button>
						<button type="button" role="presentation" id="nextStoryBtn" class="down" onclick="javascript:nextStory()">
							<img src="{{ url('images/awesome-arrow-alt-circle-down.png') }}" />
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')
<script type="text/javascript" src="{{ url('OwlCarousel2/dist/owl.carousel.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		// $('body').css('overflow', 'hidden');
		$('.our-features-box').css('display', 'none');
		$('.newsletter-bg-custom').css('display', 'none');
		$('#footer').css('display', 'none');
		$('.owl-carousel').owlCarousel({
			stagePadding: 0,
			items: 1,
			margin: 10,
			loop:false,
			singleItem: true,
			dots: true,
			nav: true,
			navText: ["<img src='{{ url("images/awesome-arrow-alt-circle-left.png") }}' class='story-nav' />", "<img src='{{ url("images/awesome-arrow-alt-circle-right.png") }}' class='story-nav' />"]
		});

		$(window).on('scroll', function() {
			console.log('scrolled');
		});
	});

	function nextStory() {
		var currentStory = $('#currentStory').val();
		var nextStory = parseInt(currentStory) + parseInt(1);
		console.log('what is nextStory: ', nextStory);
		$('#story-content').animate({
			// scrollTop: $("#story"+nextStory).offset().top - $('#story'+nextStory).offsetParent().offset().top
			scrollTop: $("#story"+nextStory).offset().top - 200
		}, 600);
		$('#currentStory').val(nextStory);
		var totalStory = $('#totalStory').val();
		if(nextStory < totalStory) {
			$('#nextStoryBtn').css('display', 'block');
		}else {
			$('#nextStoryBtn').css('display', 'none');
		}

		if(nextStory > 1) {
			$('#prevStoryBtn').css('display', 'block');
		}else {
			$('#prevStoryBtn').css('display', 'none');
		}
	}

	function prevStory() {
		var currentStory = $('#currentStory').val();
		var nextStory = parseInt(currentStory) - parseInt(1);
		console.log('what is nextStory: ', nextStory);
		$('#story-content').animate({
			// scrollTop: $("#story"+nextStory).offset().top - $('#story'+nextStory).offsetParent().offset().top
			scrollTop: $("#story"+nextStory).offset().top - 200
		}, 600);
		$('#currentStory').val(nextStory);
		var totalStory = $('#totalStory').val();
		if(nextStory < totalStory) {
			$('#nextStoryBtn').css('display', 'block');
		}else {
			$('#nextStoryBtn').css('display', 'none');
		}

		if(nextStory > 1) {
			$('#prevStoryBtn').css('display', 'block');
		}else {
			$('#prevStoryBtn').css('display', 'none');
		}
	}
</script>
@endsection