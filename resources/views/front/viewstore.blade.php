@extends('front.layout.master')
@section('title',filter_var($store->name).' | ')
@section('stylesheet')
<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ url('template/css/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ url('template/animate/animate.compat.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('css/profile.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('css/mediaquery/mediaprofile.css') }}">
<link id="skinCSS" rel="stylesheet" href="{{ url('template/css/skins/default.css') }}">
<link rel="stylesheet" href="{{ url('template/css/simple-line-icons/css/simple-line-icons.min.css') }}">

<script src="{{ url('template/js/template_vendor/modernizr/modernizr.min.js') }}"></script>
@endsection
@section('body')
<section id="profile-nav" class="sticky-top">
  <div class="container-fluid hide-xs">
    <div class="row">
      <div class="col-md-2">
        <a href="profile/home/12">
          <img src="{{ url('images/store/'.$store->store_logo) }}" class="img-fluid company-logo" />
        </a>
      </div>
      <div class="col-md-10">
        <ul class="profile-nav">
          <li>
            <a href="{{ url('profile/home/'.$store->id) }}">Home</a>
          </li>
          <li>
            <a href="{{ url('profile/story/'.$store->id) }}">About</a>
          </li>
          <li>
            <a href="{{ route('store.view',['uuid' => $store->uuid ?? 0, 'title' => $store->name]) }}" class="active">Products & Services</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container-fluid hide-sm">
    <div class="row">
      <div class="col-md-12">
        <a href="profile/home/12">
          <img src="{{ url('images/store/'.$store->store_logo) }}" class="img-fluid company-logo" />
        </a>
      </div>
      <div class="col-md-12">
        <hr />
        <ul class="nav nav-pills nav-fill mt-2">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('profile/home/'.$store->id) }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('profile/story/'.$store->id) }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('store.view',['uuid' => $store->uuid ?? 0, 'title' => $store->name]) }}">Products & Services</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<div class="body-content outer-top-vs" id="top-banner-and-menu">
  <div class="container-fluid">

    <div class="clearfix my-wishlist-page m-t-10">

            {{-- <div id="category" class="category-carousel">
                <div class="item">
                    <div class="image"> <img
                            src="{{ $store->cover_photo != '' && file_exists(public_path().'/images/store/cover_photo/'.$store->cover_photo) ? url('images/store/cover_photo/'.$store->cover_photo) : url('images/default_cover_store.jpg') }}"
                            alt="" class="img-fluid"> </div>
                    <div class="container-fluid">
                        <div class="caption vertical-top text-left">
                            <div class="big-text"> {{ filter_var($store->name) }} @if($store->verified_store == '1') <small
                                    title="Verified"><i class="d-inline-flex fa fa-check-circle text-green"></i>
                                </small> @endif </div>
                            @if($store->description !='')
                            <div class="excerpt hidden-sm hidden-md"> {!! $store->description !!} </div>
                            @endif
                            <div class="mt-2 excerpt-normal hidden-sm hidden-md">

                                <p><i class="fa fa-map-marker"></i> {{ $store['address'] }} {{ $store->city['name'] }},
                                    {{ $store->state['name'] }}, {{ $store->country['nicename'] }},
                                    {{ $store->pin_code }}</p>

                                <p><i class="fa fa-phone"></i> <a class="text-dark" href="tel:{{ $store['mobile'] }}">{{ $store['mobile'] }}</a></p>



                                <p><i class="fa fa-envelope"></i> <a class="text-dark" href="mailto:{{ filter_var($store->email) }}">{{ filter_var($store->email) }}</a> </p>


                                @if($google_reviews != NULL)
                                <h6 role="button" data-toggle="modal" data-target="#reviewsgoogle"><span
                                        class="badge badge-primary"> <i class="fa fa-star"></i> {{$google_reviews['rating']}}
                                        {{ __("Google Reviews") }}</span> </h6>
                                @endif

                            </div>
                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
              </div> --}}

              <div class="filter-tabs">
                <div class="filter-tab-dropdown">
                  <div class="row no-gutters">
                    <div class="col-lg-4 col-12">
                      <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">

                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#grid-container"><i
                            class="icon fa fa-th-large"></i> Grid</a>
                          </li>
                          <li class="nav-item">
                            <a data-toggle="tab" href="#list-container" class="nav-link"><i
                              class="icon fa fa-bars"></i>
                            List</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-lg-4 col-12">
                        <div class="filter-pagination">
                          <div class="">
                            {!! $products->appends(Request::except('page'))->links() !!}
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-12">
                        <div class="filter-dropdown">
                          <ul>
                            <li>
                              <div class="dropdown">
                                <button type="button" class="btn btn-sm dropdown-toggle"
                                data-toggle="dropdown">
                                Show items :
                                {{ !app('request')->input('limit') ? 10 : app('request')->input('limit') }}
                              </button>
                              <div class="dropdown-menu">
                                @php
                                $sort = !app('request')->input('sort') ? 'A-Z' :
                                app('request')->input('sort');
                                @endphp
                                <a class="{{ !app('request')->input('limit') || app('request')->input('limit') == 10  ? 'active' : "" }} dropdown-item"
                                  href="{{ route('store.view',['uuid' => $store->uuid ?? 0, 'title' => $store->name, 'sort' => $sort , 'limit' => 10]) }}">10</a>
                                  <a class="{{ app('request')->input('limit') == 25 ? 'active' : "" }} dropdown-item"
                                    href="{{ route('store.view',['uuid' => $store->uuid ?? 0, 'title' => $store->name, 'sort' => $sort , 'limit' => 25]) }}">25</a>
                                    <a class="{{ app('request')->input('limit') == 50 ? 'active' : "" }} dropdown-item"
                                      href="{{ route('store.view',['uuid' => $store->uuid ?? 0, 'title' => $store->name, 'sort' => $sort , 'limit' => 50]) }}">50</a>
                                      <a class="{{ app('request')->input('limit') == 100 ? 'active' : "" }} dropdown-item"
                                        href="{{ route('store.view',['uuid' => $store->uuid ?? 0, 'title' => $store->name, 'sort' => $sort , 'limit' => 100]) }}">100</a>
                                      </div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="dropdown">
                                      <button type="button" class="btn btn-sm dropdown-toggle"
                                      data-toggle="dropdown">
                                      Sort By :
                                      {{ !app('request')->input('sort') ? "A-Z" : app('request')->input('sort') }}
                                    </button>
                                    <div class="dropdown-menu">
                                      @php
                                      $limit = !app('request')->input('limit') ? 10 :
                                      app('request')->input('limit');
                                      @endphp
                                      <a class="{{ !app('request')->input('sort') || app('request')->input('sort') == "A-Z"  ? 'active' : "" }} dropdown-item"
                                        href="{{ route('store.view',['uuid' => $store->uuid ?? 0, 'title' => $store->name, 'sort' => 'A-Z', 'limit' => $limit]) }}">A-Z</a>
                                        <a class="{{ app('request')->input('sort') == "Z-A" ? 'active' : "" }} dropdown-item"
                                          href="{{ route('store.view',['uuid' => $store->uuid ?? 0, 'title' => $store->name, 'sort' => "Z-A", 'limit' => $limit ]) }}">Z-A</a>
                                                {{-- <a class="{{ app('request')->input('sort') == 50 ? 'active' : "" }}
                                                dropdown-item"
                                                href="{{ route('store.view',['uuid' => $store->uuid ?? 0, 'title' => $store->name, 'sort' => 50]) }}">50</a>
                                                <a class="{{ app('request')->input('sort') == 100 ? 'active' : "" }} dropdown-item"
                                                    href="{{ route('store.view',['uuid' => $store->uuid ?? 0, 'title' => $store->name, 'sort' => 100]) }}">100</a>
                                                    --}}
                                                  </div>
                                                </div>
                                              </li>
                                            </ul>





                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <br>
                                    <span class="text-total">
                                      <b>({{__('staticwords.Showingproducts')}} {{ $products->count() }} {{__("staticwords.of")}}
                                        {{ $store->products()->count() }})</b>
                                      </span>

                                    </div>

                                    <div id="myTabContent" class="tab-content category-list">

                                      <div class="tab-pane fade show active" id="grid-container">
                                        <div class="row">
                                          @foreach($products as $product)

                                          <div class="col-sm-6 col-md-4 col-lg-3">
                                            <div class="item">

                                              <div class="products">

                                                <div class="product">

                                                  @if($product['sale_tag'] !== NULL && $product['sale_tag'] != '')
                                                  <div class="ribbon ribbon-top-right">
                                                    <span style="background : {{ $product['sale_tag_color'] }} ; color : {{ $product['sale_tag_text_color'] }}">

                                                      {{ $product['sale_tag'] }}

                                                    </span>
                                                  </div>
                                                  @endif

                                                  <div class="product-image">
                                                    <div class="image {{ $product['stock'] == 0 ? "pro-img-box" : ""}}">

                                                      <a href="{{ $product['producturl'] }}" title="{{ $product['productname'] }}">

                                                        <img class="lazy ankit {{ $product['stock'] ==0 ? "filterdimage" : ""}}" data-src="{{ $product['thumbnail'] }}" alt="{{ $product['productname'] }}">

                                                        <img class="lazy {{ $product['stock'] == 0 ? "filterdimage" : ""}} hover-image" data-src="{{ $product['hover_thumbnail'] }}"/>
                                                        
                                                      </a>
                                                    </div>
                                                    <!-- /.image -->

                                                    @if(isset($product['selling_start_at']) && $product['stock'] != 0 && $product['selling_start_at'] != null && $product['selling_start_at'] >=
                                                    date('Y-m-d'))
                                                    @else 
                                                    <div class="clearfix animate-effect">
                                                      <div class="action">
                                                        <ul class="list-unstyled">

                                                          @if($price_login != 1 || Auth::check())
                                                          @if($product['stock'] !== 0)
                                                          <li id="addCart" class="lnk wishlist">

                                                           @if($product['product_type'] == 'v'
                                                           )
                                                           <form style="text-align: center; padding: 10px;" method="POST" action="{{ route('add.cart',['id' => $product['productid'] ,'variantid' => $product['variantid'], 'varprice' => $product['mainprice'], 'varofferprice' => $product['offerprice'] ,'qty' => $product['min_order_qty']])}}">
                                                            @csrf
                                                            <button title="{{ __('Add to Cart') }}" type="submit"
                                                            class="custom-icons btn">
                                                            <i class="fa fa-shopping-cart"></i>
                                                          </button>
                                                        </form>
                                                        @else



                                                        <form style="text-align: center; padding: 10px;" action="{{ $product['type'] == 'ex_product' ? $product['external_product_link'] : route('add.cart.simple',['pro_id' => $product['productid'], 'price' => $product['mainprice'], 'offerprice' => $d_price ?? $product['offerprice']]) }}" method="{{$product['type'] == 'ex_product' ? 'GET' : 'POST'}}">
                                                          @csrf
                                                          <button title="{{ __('Add to Cart') }}" type="submit"
                                                          class="custom-icons btn">
                                                          <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                      </form>

                                                      @endif


                                                    </li>
                                                    @endif

                                                    @endif

                                                    @if($product['product_type'] == 'v')
                                                    <li class="lnk"> 
                                                      <a class="add-to-cart" href="{{route('compare.product',$product['variantid'])}}" title="{{ __('staticwords.Compare') }}"> 
                                                        <i class="fa fa-signal" aria-hidden="true"></i>
                                                      </a> 
                                                    </li>
                                                    @endif

                                                  </ul>
                                                </div>
                                              </div>
                                              @endif

                                                    @if($product['stock'] == 0)
                                                    <h6 align="center" class="oottext">
                                                      <span>{{ __('staticwords.Outofstock') }}</span></h6>
                                                      @endif

                                                      @if(isset($product['pre_order']) && $product['pre_order'] == 1 && $product['product_avbl_date'] >= date('Y-m-d'))
                                                      <h6 align="center" class="preordertext">
                                                        <span>{{ translate('Available for preorder') }}</span>
                                                      </h6>
                                                      @endif

                                                      @if($product['product_type'] == 'v' && $product['stock'] != 0 && $product['selling_start_at'] != null
                                                      && $products['selling_start_at'] >= date('Y-m-d'))
                                                      <h6 align="center" class="oottext2">
                                                        <span>{{ __('staticwords.ComingSoon') }}</span></h6>
                                                        @endif
                                                        <!-- /.image -->


                                                      </div>

                                                      <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{ $product['producturl'] }}">{{ filter_var($product['productname']) }}</a></h3>


                                                        @if($product['rating'] !== 0)


                                                        <div class="float-left">
                                                          <div class="star-ratings-sprite"><span
                                                            style="width:<?php echo $product['rating']; ?>%"
                                                            class="star-ratings-sprite-rating"></span>
                                                          </div>
                                                        </div>
                                                        @else
                                                        <div class="no-rating">{{ __('No Rating') }}</div>
                                                        @endif

                                                        @if($price_login == '0' || Auth::check())

                                                        <div class="product-price">
                                                          @if($product['offerprice'] == 0)
                                                          <span class="price"><i
                                                            class="{{session()->get('currency')['value']}}"></i>
                                                            {{ sprintf("%.2f",$product['mainprice']*$conversion_rate) }}
                                                          </span>
                                                          @else
                                                          <span class="price"><i
                                                            class="{{session()->get('currency')['value']}}"></i>{{ sprintf("%.2f",$product['offerprice']*$conversion_rate) }}
                                                          </span>

                                                          <span class="price-before-discount"><i
                                                            class="{{session()->get('currency')['value']}}"></i>{{  sprintf("%.2f",$product['mainprice']*$conversion_rate)  }}
                                                          </span>

                                                          @endif

                                                        </div>

                                                        @endif
                                                        <!-- /.product-price -->

                                                      </div>

                                                      {{-- @if(isset($product['selling_start_at']) && $product['stock'] != 0 && $product['selling_start_at'] != null && $product['selling_start_at'] >=
                                                      date('Y-m-d'))
                                                      @else 
                                                      <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                          <ul class="list-unstyled">

                                                            @if($price_login != 1 || Auth::check())
                                                            @if($product['stock'] !== 0)
                                                            <li id="addCart" class="lnk wishlist">

                                                             @if($product['product_type'] == 'v'
                                                             )
                                                             <form method="POST" action="{{ route('add.cart',['id' => $product['productid'] ,'variantid' => $product['variantid'], 'varprice' => $product['mainprice'], 'varofferprice' => $product['offerprice'] ,'qty' => $product['min_order_qty']])}}">
                                                              @csrf
                                                              <button title="{{ __('Add to Cart') }}" type="submit"
                                                              class="addtocartcus btn">
                                                              <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                          </form>
                                                          @else



                                                          <form action="{{ $product['type'] == 'ex_product' ? $product['external_product_link'] : route('add.cart.simple',['pro_id' => $product['productid'], 'price' => $product['mainprice'], 'offerprice' => $d_price ?? $product['offerprice']]) }}" method="{{$product['type'] == 'ex_product' ? 'GET' : 'POST'}}">
                                                            @csrf
                                                            <button title="{{ __('Add to Cart') }}" type="submit"
                                                            class="addtocartcus btn">
                                                            <i class="fa fa-shopping-cart"></i>
                                                          </button>
                                                        </form>

                                                        @endif


                                                      </li>
                                                      @endif

                                                      @endif

                                                      @if($product['product_type'] == 'v')
                                                      <li class="lnk"> 
                                                        <a class="add-to-cart" href="{{route('compare.product',$product['variantid'])}}" title="{{ __('staticwords.Compare') }}"> 
                                                          <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a> 
                                                      </li>
                                                      @endif

                                                    </ul>
                                                  </div>
                                                </div>
                                                @endif --}}
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        @endforeach 
                                      </div>

                                    </div>

                                    <div class="tab-pane fade" id="list-container">
                                      <div class="category-product">
                                        <div class="category-product-inner">
                                          @foreach($products as $product)
                                          <div class="products">
                                            <div class="product-list product">
                                              <div class="row product-list-row">

                                                <div class="col col-sm-3 col-lg-3">



                                                  <div class="product-image">



                                                    <div class="image {{ $product['stock'] == 0 ? "pro-img-box" : ""}}">

                                                      @if($product['sale_tag'] !== NULL && $product['sale_tag'] != '')
                                                      <div class="ribbon ribbon-top-right">
                                                        <span style="background : {{ $product['sale_tag_color'] }} ; color : {{ $product['sale_tag_text_color'] }}">

                                                          {{ $product['sale_tag'] }}

                                                        </span>
                                                      </div>
                                                      @endif

                                                      <a href="{{ $product['producturl'] }}" title="{{ $product['productname'] }}">

                                                        <img style="width: 250px;height: 200px;object-fit: scale-down;" class="lazy ankit {{ $product['stock'] ==0 ? "filterdimage" : ""}}" data-src="{{ $product['thumbnail'] }}" alt="{{ $product['productname'] }}">
                                                      </a>
                                                    </div>
                                                    <!-- /.image -->

                                                    @if($product['stock'] == 0)
                                                    <h6 align="center" class="oottext">
                                                      <span>{{ __('staticwords.Outofstock') }}</span></h6>
                                                      @endif

                                                      @if(isset($product['pre_order']) && $product['pre_order'] == 1 && $product['product_avbl_date'] >= date('Y-m-d'))
                                                      <h6 align="center" class="preordertext">
                                                        <span>{{ translate('Available for preorder') }}</span>
                                                      </h6>
                                                      @endif

                                                      @if($product['product_type'] == 'v' && $product['stock'] != 0 && $product['selling_start_at'] != null
                                                      && $products['selling_start_at'] >= date('Y-m-d'))
                                                      <h6 align="center" class="oottext2">
                                                        <span>{{ __('staticwords.ComingSoon') }}</span></h6>
                                                        @endif
                                                        <!-- /.image -->

                                                        
                                                      </div>
                                                      <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-9 col-lg-9">
                                                      <div class="product-info text-left">
                                                        <h3 class="name">
                                                          <a href="{{ $product['producturl'] }}">
                                                            {{ filter_var($product['productname']) }}
                                                          </a>
                                                        </h3>


                                                        @if($product['rating'] !== 0)


                                                        <div class="float-left">
                                                          <div class="star-ratings-sprite"><span
                                                            style="width:<?php echo $product['rating']; ?>%"
                                                            class="star-ratings-sprite-rating"></span>
                                                          </div>
                                                        </div>

                                                        @else
                                                        <div class="no-rating">{{ __('No Rating') }}</div>
                                                        @endif

                                                        @if($price_login == '0' || Auth::check())

                                                        <div class="product-price">
                                                          @if($product['offerprice'] == 0)
                                                          <span class="price"><i
                                                            class="{{session()->get('currency')['value']}}"></i>
                                                            {{ sprintf("%.2f",$product['mainprice']*$conversion_rate) }}
                                                          </span>
                                                          @else
                                                          <span class="price"><i
                                                            class="{{session()->get('currency')['value']}}"></i>{{ sprintf("%.2f",$product['offerprice']*$conversion_rate) }}
                                                          </span>

                                                          <span class="price-before-discount"><i
                                                            class="{{session()->get('currency')['value']}}"></i>{{  sprintf("%.2f",$product['mainprice']*$conversion_rate)  }}
                                                          </span>
                                                          @endif
                                                        </div>

                                                        @endif

                                                        <div class="description m-t-10">
                                                          {{$product['details']}}
                                                        </div>



                                                        <!-- /.product-price -->

                                                      </div>
                                                      <!-- /.product-info -->

                                                    </div>

                                                    <!-- /.col -->
                                                  </div>
                                                </div>
                                                <!-- /.product-list -->
                                              </div>
                                              <hr>
                                              @endforeach

                                              <!-- /.products -->
                                            </div>
                                          </div>
                                        </div>

                                      </div>


                                      <div class="mx-auto" style="width: 200px;">
                                        {!! $products->appends(Request::except('page'))->links() !!}
                                      </div>
                                    </div>

                                  </div>
                                  @if($google_reviews != NULL)
                                  <div id="reviewsgoogle" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="p-2 modal-header">
                                          <h5 class="modal-title" id="my-modal-title">{{ __("What customer says about us on google?") }}</h5>
                                          <button class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">

                                          <h1 class="text-center">
                                            {{$google_reviews['rating']}} <i style="color: #FFC902" class="fa fa-star"></i>

                                            <div class="mt-2 clearfix star-ratings-sprite">
                                              <span style="width:{{ ($google_reviews['rating']  * 100) / 5 }}%" class="star-ratings-sprite-rating"></span>
                                            </div>

                                            <h5 class="text-center">
                                              {{__("Overall rating")}}
                                            </h5>

                                          </h1>

                                          <ul class="mt-2 list-unstyled">
                                            @forelse ($google_reviews['reviews'] as $greview)
                                            <li class="shadow-sm mt-2 border p-3 media">

                                              <img width="64px" src="{{ $greview['profile_photo_url'] }}" class="mr-3" alt="...">
                                              <div class="media-body">
                                                <h5 class="mt-0 mb-1">{{ ucfirst($greview['author_name']) }}</h5>
                                                <div class="float-left clearfix star-ratings-sprite">
                                                  <span style="width:{{ ($greview['rating']  * 100) / 5 }}%" class="star-ratings-sprite-rating"></span>
                                                </div>
                                                <br>
                                                <p>{{ $greview['text'] }}</p>
                                              </div>
                                              <small class="float-right">{{ $greview['relative_time_description'] }}</small>
                                            </li>
                                            @empty

                                            @endforelse
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  @endif

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
                                        <div class="col-lg-4">
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
                                        <div class="col-lg-4">
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
                                        <div class="col-lg-4">
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
                                          <div class="feature-box feature-box-style-2">
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
                                          <div class="feature-box feature-box-style-2">
                                            <div class="feature-box-icon">
                                              <i class="icon-drop icons"></i>
                                            </div>
                                            <div class="feature-box-info">
                                              <h4 class="font-weight-bold mb-2">Colors</h4>
                                              <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla.</p>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-4">
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
                                        <div class="col-lg-4">
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
                                        <div class="col-lg-4">
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
                                        <div class="col-lg-4">
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
                                  <section class="call-to-action call-to-action-strong-grey content-align-center call-to-action-in-footer">
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-md-9 col-lg-9">
                                          <div class="call-to-action-content">
                                            <h2 class="font-weight-normal text-6 mb-0">Porto is <strong>everything</strong> you need to create an <strong>awesome</strong> website!</h2>
                                            <p class="mb-0">The best HTML template for your new website.</p>
                                          </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                          <div class="call-to-action-btn">
                                            <a href="http://themeforest.net/item/porto-responsive-html5-template/4106987" target="_blank" class="btn btn-modern btn-primary">Buy Now!</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                </div>
                                @endsection
                                @section('script')
                                <script src="{{ url('template/js/template_vendor/owl.carousel/owl.carousel.min.js') }}"></script>

                                <script type="text/javascript" src="{{ url('template/js/theme.js') }}"></script>
                                <script type="text/javascript" src="{{ url('template/js/custom.js') }}"></script>
                                <script type="text/javascript" src="{{ url('template/js/theme.init.js') }}"></script>
                                <script>
                                  $(document).ready(function() {
                                    $('.our-features-box').css('display', 'none');
                                  });
                                  $(function () {

                                    "use Strict";

                                    $('.lazy').lazy({

                                      effect: "fadeIn",
                                      effectTime: 1000,
                                      scrollDirection: 'both',
                                      threshold: 0

                                    });
                                  });
                                </script>
                                @endsection