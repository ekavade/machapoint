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
<link rel="stylesheet" type="text/css" href="{{ url('css/discover.css') }}">
<link rel="stylesheet" href="{{ url('template/circle-flip-slideshow/css/component.css') }}">
<link id="skinCSS" rel="stylesheet" href="{{ url('template/css/skins/default.css') }}">

<script src="{{ url('template/js/template_vendor/modernizr/modernizr.min.js') }}"></script>
@endsection
@section("body")
<div class="body-content outer-top-vs" id="top-banner-and-menu">
	<div class="container-fluid">
		<div id="app" class="row no-gutters">
			@if(env('HIDE_SIDEBAR') == 0)
			<div class="h-100 col-12 col-sm-12 col-md-12 col-lg-12  col-xl-2 sidebar left-sidebar">
				<div class="side-content">
					<sidebar-desktop></sidebar-desktop>

				</div>
			</div>
			@endif
			<!-- Start Main -->
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 {{ env('HIDE_SIDEBAR') == 1 ? 'col-xl-12' : 'col-xl-10' }} right-sidebar">
				<div class="main-content homebanner-holder">
					<!--   <homepage></homepage> -->
					<div class="sticky-top fixed-header" style="background-color: #eee;">
						<div class="container-outer">
							<div class="container-inner">
								@foreach($stores1 as $story)
									<a href="{{ url('/stories/'.$story->id) }}">
										<img class="rounded-circle stories-thumb " src="{{  url('images/store/' . $story->store_logo)}}" alt="Store Image">
									</a>
								@endforeach
							</div>
						</div>
					</div>
					@auth						
						<!-- <div class="row pt-10 pb-10">
							<div class="col-md-12">
								<a href="javascript:void(0)" class="stories-content"> Seen stories </a>
							</div>
						</div> -->
					@endauth


						<div class="row">
							<div class="col-md-4">
								<a href="https://www.oneplus.in/">
									<img class="img-fluid" src="../public/images/brands/oneplus.png" alt="img1" height="350px" width="auto" >
								</a>
							</div>
							<div class="col-md-4">
								<a href="https://centrosistech.com/">
									<img class="img-fluid" src="../public/images/brands/b1g1.png" alt="img2" height="350px" width="auto">
								</a>
							</div>
							<div class="col-md-4">
								<a href="https://www.redbullshop.com/">
									<img class="img-fluid" src="../public/images/brands/redbull.png" alt="img3" height="350px" width="auto">
								</a>
							</div>
						</div>

						<div id="topProfiles">
							<div class="row">
								<div class="col-md-12" >
									<section class="mt-2 section new-arriavls feature-product-block">
										<h3 class="section-title">Top Profiles</h3>
										<div class="owl-carousel custom-carousel owl-theme outer-top-xs">
											@for ($i = 0; $i < count($stores_r); $i++)
												<div class="item item-carousel">
													<div class="products">
														<div class="product">
															<div class="product-image">
																<div class="image">
																	<a href="{{ url('profile/home/'.$stores_r[$i]->id) }}" class="btn">
																	<img alt="product_image" src="../public/images/store/{{$stores_r[$i]->store_logo}}"/>
																 </a>
																	<div class="clearfix">
																		<div class="action">
																			<ul class="list-unstyled" style="display: inline-flex;">
																				<li class=""> 
																					<a href="{{ url('/stories/'.$stores_r[$i]->id) }}" class="btn custom-icons" title="Stories"><i class="fa fa-camera-retro" aria-hidden="true"></i>
																					</a>
																				</li>
																				<li class=""> 
																					<a href="{{ route('store.view',['uuid' => $stores_r[$i]->uuid ?? 0, 'title' => $stores_r[$i]->name]) }}" class="btn custom-icons" title="Shop"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 
																					</a>
																				</li>
																				<li class=""> 
																					<a href="{{ url('profile/home/'.$stores_r[$i]->id) }}" class="btn custom-icons" title="Profile"><i class="fa fa-user" aria-hidden="true"></i> 
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											@endfor
											
										</div>
									</section>
								</div>
							</div>
						</div>

						<div id="recentlyAdded">
							<div class="row">
								<div class="col-md-12">
									<section class="mt-2 section new-arriavls feature-product-block">
										<h3 class="section-title">Recently Added</h3>
										<div class="owl-carousel custom-carousel owl-theme outer-top-xs">
											<?php
											for($i=0; $i<count($stores_order); $i++){
												 ?>
												<div class="item item-carousel ">
													<div class="products">
														<div class="product">
															<div class="product-image">
																<div class="image">
																	<a href="{{ url('profile/home/'.$stores_order[$i]->id) }}" class="btn">
																	<img alt="startup_store_Logo" src="../public/images/store/{{$stores_order[$i]->store_logo}}"/>
																	</a>
																	<div class="clearfix">
																		<div class="action">
																			<ul class="list-unstyled" style="display: inline-flex;">
																				<li class=""> 
																					<a href="{{ url('/stories/'.$stores_order[$i]->id) }}" class="btn custom-icons" title="Stories"><i class="fa fa-camera-retro" aria-hidden="true"></i>
																					</a>
																				</li>
																				<li class=""> 
																					<a href="{{ route('store.view',['uuid' => $stores_order[$i]->uuid ?? 0, 'title' => $stores_order[$i]->name]) }}" class="btn custom-icons" title="Shop"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 
																					</a>
																				</li>
																				<li class=""> 
																					<a href="{{ url('profile/home/'.$stores_order[$i]->id) }}" class="btn custom-icons" title="Profile"><i class="fa fa-user" aria-hidden="true"></i> 
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<?php
											}?>
										</div>
									</section>
								</div>
							</div>
						</div>


						<?php $counter = 0;?>						
						@foreach ($category_ids as $key => $category_id)

						<div class="row" id="customCat{{$counter}}">
							<div class="col-md-12">
								<section class="mt-2 section new-arriavls feature-product-block">
									<h3 class="section-title"> {{json_decode($category_titles[$counter])->en}} </h3>
									<div class="owl-carousel custom-carousel owl-theme outer-top-xs">
										<?php
										for($i=0; $i<count($category_entries[$counter]); $i++){
											$store_fx = $category_entries[$counter][$i];
											?>
											<div class="item item-carousel">
												<div class="products">
													<div class="product">
														<div class="product-image">
															<div class="image">
																<a href="{{ url('profile/home/'.$store_fx->id) }}" class="btn">
																<img alt="product_image" src="../public/images/store/{{$store_fx->store_logo}}"/>
															</a>
																<div class="clearfix">
																	<div class="action">
																		<ul class="list-unstyled" style="display: inline-flex;">
																			<li class=""> 
																				<a href="{{ url('/stories/'.$store_fx->id) }}" class="btn custom-icons" title="Stories"><i class="fa fa-camera-retro" aria-hidden="true"></i>
																				</a>
																			</li>
																			<li class=""> 
																				<a href="{{ route('store.view',['uuid' => $store_fx->uuid ?? 0, 'title' => $store_fx->name]) }}" class="btn custom-icons" title="Shop"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 
																				</a>
																			</li>
																			<li class=""> 
																				<a href="{{ url('profile/home/'.$store_fx->id) }}" class="btn custom-icons" title="Profile"><i class="fa fa-user" aria-hidden="true"></i> 
																				</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php
										}?>
									</div>
								</section>
							</div>
						</div>

						<?php $counter++;?>

						@endforeach


						<div class="row" id="yourInterests">
							<div class="col-md-12">
								<section class="mt-2 section new-arriavls feature-product-block">
									<h3 class="section-title"> Your Interests - Replace with Category</h3>
									<div class="owl-carousel custom-carousel owl-theme outer-top-xs">
										<?php
										for($i=1; $i<=10; $i++){
											?>
											<div class="item item-carousel">
												<div class="products">
													<div class="product">
														<div class="product-image">
															<div class="image">
																<a href="{{ url('profile/home/12') }}" class="btn">
																<img alt="product_image" src="../public/images/brands/img1.jpg"/>
															</a>
																<div class="clearfix">
																	<div class="action">
																		<ul class="list-unstyled" style="display: inline-flex;">
																			<li class=""> 
																				<a href="{{ url('/stories/12') }}" class="btn custom-icons" title="Stories"><i class="fa fa-camera-retro" aria-hidden="true"></i>
																				</a>
																			</li>
																			<li class=""> 
																				<a href="{{ url('store/96361833-9ee7-4e1c-8cce-c81b3f9c1099/Party%20Hunt') }}" class="btn custom-icons" title="Shop"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 
																				</a>
																			</li>
																			<li class=""> 
																				<a href="{{ url('profile/home/12') }}" class="btn custom-icons" title="Profile"><i class="fa fa-user" aria-hidden="true"></i> 
																				</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php
										}?>
									</div>
								</section>
							</div>
						</div>


						<div class="row" id="favorites">
							<div class="col-md-12">
								<section class="mt-2 section new-arriavls feature-product-block">
									<h3 class="section-title" id="favorites4">Favorites - Replace with Category</h3>
									<div class="owl-carousel custom-carousel owl-theme outer-top-xs">
										<?php
										for($i=1; $i<=10; $i++){
											?>
											<div class="item item-carousel">
												<div class="products">
													<div class="product">
														<div class="product-image">
															<div class="image">
																<a href="{{ url('profile/home/12') }}" class="btn">
																<img alt="product_image" src="../public/images/brands/img3.jpg"/>
															</a>
																<div class="clearfix">
																	<div class="action">
																		<ul class="list-unstyled" style="display: inline-flex;">
																			<li class=""> 
																				<a href="{{ url('/stories/12') }}" class="btn custom-icons" title="Stories"><i class="fa fa-camera-retro" aria-hidden="true"></i>
																				</a>
																			</li>
																			<li class=""> 
																				<a href="{{ url('store/96361833-9ee7-4e1c-8cce-c81b3f9c1099/Abhay%20store') }}" class="btn custom-icons" title="Shop"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 
																				</a>
																			</li>
																			<li class=""> 
																				<a href="{{ url('profile/home/12') }}" class="btn custom-icons" title="Profile"><i class="fa fa-user" aria-hidden="true"></i> 
																				</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php
										}?>
									</div>
								</section>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
	@section('script')
	<script type="text/javascript">
		$(document).ready(function($) {
			/*$(window).scroll(function(){
				if($(this).scrollTop() > 100){
					$('.sticky-top').addClass('fixed-header');
				}
				else{
					$('.sticky-top').removeClass('fixed-header');
				}
			});*/
			$('#yourInterests').hide(); 
			$('#favorites').hide(); 
			$('.owl-carousel').owlCarousel({
				loop:false,
				margin:10,
				nav:true,
				responsiveClass:true,
				responsive:{
					0:{
						items:2
					},
					600:{
						items:3
					},
					1000:{
						items:5
					}
				}
			})
		});

		function topProfiles() {
			$('html, body').animate({
				scrollTop: $('#topProfiles').offset().top - 150
			}, 600);
		}

		function recentlyAdded() {
			$('html, body').animate({
				scrollTop: $('#recentlyAdded').offset().top - 150
			}, 600);
		}

		function yourInterests() {
			$('html, body').animate({
				scrollTop: $('#yourInterests').offset().top - 150
			}, 600);
		}

		function favorites() {
			$('html, body').animate({
				scrollTop: $('#favorites').offset().top - 150
			}, 600);
		}

	</script>
	@endsection
