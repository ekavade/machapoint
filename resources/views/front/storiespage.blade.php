@extends("front.layout.master")
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{ url('css/mediaquery/mediastories.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
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
		height: 100vh;
		overflow: auto;
	}
	#story-content::-webkit-scrollbar {
		width: 0;
		background: transparent;
	}
</style>
@endsection
@section("body")
<section class="stories-body stories">
	<div class="d-block d-sm-none">
		@foreach($storesWithStories as $key => $store)
		<div class="story">
			<div id="store{{ $key }}" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#store{{ $key }}" data-slide-to="0" class="active"></li>
					<li data-target="#store{{ $key }}" data-slide-to="1"></li>
					<li data-target="#store{{ $key }}" data-slide-to="2"></li>
				</ol>
			  <div class="carousel-inner">
			  	@foreach($store->stories as $i => $story)
			    <div class="carousel-item <?php if($i==0){ echo 'active'; } ?>">
			      <img class="d-block w-100" src="{{ url('images/store/'.$story->img_url) }}" alt="First slide">
			    </div>
			    @endforeach
			  </div>
			</div>
		</div>
		@endforeach
	</div>

	<div class="d-none d-sm-block mt-4">
		<div class="container">
			<div class="row mt-4">
				<div class="col-md-10" id="story-content">
					@foreach($storesWithStories as $key => $store)
					<div class="row stry" id="story<?php echo $key; ?>">
					<div id="store_id<?php echo $key; ?>" data-store-id="<?php echo $store->id; ?>"></div>
						<div class="col-md-3">
							<div class="form-group">
								<a href="{{url('/')}}"><img src="{{ url('images/ionic-md-arrow-back.png') }}" height="20px" /></a>
							</div>
							<div class="form-group">
								<img src="{{ url('/images/store/'.$store->store_logo) }}" class="company-logo">
								<p class="company-name">{{ $store->name; }}</p>
							</div>
						</div>
						<div class="col-md-9">
							<div class="companies">
								<div class="company-item">
									<div class="owl-carousel owl-theme">
										{{-- loop through stories --}}
										@foreach($store->stories as $i => $story)
										<div class="item">
											<img src="{{ url('images/store/'.$story->img_url) }}" alt="" class="img-fluid story-image">
										</div>
										@endforeach
									</div>
									<div class="company-attr">
										<ul>
											<li>
												<a href="javascript:likeordislike({{$store->id}})" >
													<img src="{{ url('images/awesome-thumbs-up.png') }}" alt="" class="img-fluid">
													<p>{{ $story->likes }} {{ $story->likes <=1 ?'like':'likes'}}</p>
												</a>
											</li>
											<li>
												<a href="{{ url('profile/home/'.$store->id) }}">
													<img src="{{ url('images/awesome-building.png') }}" alt="" class="img-fluid">
													<p>Profile</p>
												</a>
											</li>
											<li>
												<a href="{{ $story->store_url }}">
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
					@endforeach
				</div>
				<div class="col-md-2">
					{{-- <input type="hidden" value="1" id="currentStory">
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
					</div> --}}
				</div>
			</div>
		</div>
	</div>
</section>
<div class="stories-footer d-block d-sm-none">
	<ul>
		<li>
			<span class="material-symbols-outlined">favorite</span>
		</li>
		<li>
			<span class="material-symbols-outlined">shopping_cart</span>
		</li>
		<li>
			<span class="material-symbols-outlined">person</span>
		</li>
	</ul>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript">

	function likeordislike(store_id) {	
			$.ajax({
				url: "{{ url('story/like') }}/" + store_id,
				type: "GET",
				success: function(data) {
					if(data) {
						//alert(data.message);
						location.reload();
					}
				}
			});
	}

	$(document).ready(function() {
		// $('header').remove();

		function isScrolledIntoView(elem)
		{
			var docViewTop = $(window).scrollTop();
			var docViewBottom = docViewTop + $(window).height();

			var elemTop = $(elem).offset().top;
			var elemBottom = elemTop + $(elem).height();

			return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
		}

		function showCurrentStoryId(){
			for(var i = 0;i < {{count($storesWithStories)}} ;i++){
				if(isScrolledIntoView('#story'+i)){
					$.ajax({
						url: "{{ url('story/view') }}/"+$('#store_id'+i).data('store-id'),
						type: "GET",
						dataType: "json",
						success: function(data){
							//alert(data.id);
							//console.log("Story viewed",data.ip_address)
							//$('#currentStory').val(data.id);
						}
					});
				}
			}
		}

		setInterval(showCurrentStoryId, 7000);

		$('.newsletter-bg-custom').remove();
		$('#footer').remove();
		$('#wpButton').remove();
		$('#search-sm').remove();
		$('.main-header').remove();
		$('.top-bar').remove();
		$('.owl-carousel').owlCarousel({
			stagePadding: 0,
			items: 1,
			// margin: 10,
			loop:false,
			singleItem: true,
			dots: true,
			nav: true,
			navText: ["<img src='{{ url("images/awesome-arrow-alt-circle-left.png") }}' class='story-nav' />", "<img src='{{ url("images/awesome-arrow-alt-circle-right.png") }}' class='story-nav' />"]
		});
	});
</script>
@endsection