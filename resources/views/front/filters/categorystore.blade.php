@extends('front.layout.master')

@php

  /** Seo of category pages */

    if(request()->keyword){
        $title      = __('Showing all results for :keyword',['keyword' => request()->keyword]);
        $seodes     = $title;
    }
    else if(request()->chid)
    {
        $findchid = App\Grandcategory::find(request()->chid);
        $title    = __(':title - All products | ',['title' => $findchid->title]);
        $seodes   = strip_tags($findchid->description);
        $seoimage = url('images/grandcategory/'.$findchid->image);
    }
    else if(request()->sid)
    {
        $findsubcat = App\Subcategory::find(request()->sid);
        $title      = __(':title - All products | ',['title' => $findsubcat->title]);
        $seodes     = strip_tags($findsubcat->description);
        $seoimage   = url('images/subcategory/'.$findsubcat->image);

    }else{

        $findcat    = App\Category::find(request()->category);
        $title      = __(':title - All products | ',['title' => $findcat->title]);
        $seodes     = strip_tags($findcat->description);
        $seoimage   = url('images/category/'.$findcat->image);

    }

  /* End */

@endphp
@section('meta_tags')
  <main id="seo_section">
    <link rel="canonical" href="{{ url()->full() }}" />
    <meta name="robots" content="all">
    <meta property="og:title" content="{{ $title }}" />
    <meta name="keywords" content="{{ $title }}">
    <meta property="og:description" content="{{ $seodes }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:image" content="{{ isset($seoimage) ? $seoimage : '' }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="{{ $seodes }}" />
    <meta name="twitter:site" content="{{ url()->full() }}" />
  </main>
@endsection
<link rel="stylesheet" href="{{url('css/discover.css')}}" />
@section('title',$title)
@section('body')
<br>
@php
  $last_cat = 0;
  $first_cat = 0;
  $price_login = App\Genral::first()->login;
  $price_array = array();
  $convert_price = 0;
  $show_price = 0;
  $s_product = App\SimpleProduct::query();
  $get_simple_products = array();

$all_brands_products = array();
if ($tag != '')
{

    try
    {
        if ($chid != '')
        {
            if ($brand_names != '')
            {
                $get_all_products = App\Product::query();
                if (is_array($brand_names))
                {
                    
                    $all_products_brands = $get_all_products->whereIn('brand_id', $brand_names)->where('tags', $tag)->where('grand_id', $chid)->get();

                    $get_simple_products = $s_product->whereIn('brand_id', $brand_names)->where('product_tags', $tag)->where('child_id', $chid);

                    foreach ($all_products_brands as $zx)
                    {
                        array_push($all_brands_products, $zx);
                    }
                    
                    
                   
                    
                }
                if ($all_brands_products == null)
                {
                    $first_cat = 0;
                    $last_cat = 0;
                }
                else
                {
                    $productsfor_price = $all_brands_products;
                }
            }
            else
            {
                $productsfor_price = App\Product::where('tags', $tag)->where('grand_id', $chid)->get();
                $get_simple_products = $s_product->where('product_tags', $tag)->where('child_id', $chid);
            }
            foreach ($productsfor_price as $old)
            {

                foreach ($old->subvariants as $orivar)
                {
                    if ($price_login == 0 || Auth::user())
                    {

                      $customer_price = ProductPrice::getprice($old,$orivar)->getData()->customer_price;
                      array_push($price_array, $totalprice);
                       
                    }
                }
            }

            foreach ($get_simple_products->get() as $key => $sp) {

                if ($price_login == 0 || Auth::user())
                {
                  if($sp->offer_price != 0){
                    array_push($price_array, $sp->offer_price);
                  }else{
                    array_push($price_array, $sp->price);
                  }
                    
                }

            }

            if ($price_array != null)
            {
                $first_cat = min($price_array);
                $last_cat = max($price_array);
            }
            unset($price_array);
            $price_array = array();
        }
        else
        {
            if ($sid != '')
            {
                if ($brand_names != '')
                {
                    $get_all_products = App\Product::query();
                    if (is_array($brand_names))
                    {
                        foreach ($brand_names as $brands_all)
                        {
                            $all_products_brands = $get_all_products->where('brand_id', $brands_all)->where('tags', $tag)->where('child', $sid)->get();

                            

                            foreach ($all_products_brands as $zx)
                            {
                                array_push($all_brands_products, $zx);
                            }
                        }

                        $get_simple_products = $s_product->whereIn('brand_id', $brand_names)->where('product_tags', $tag)->where('subcategory_id', $sid);
                        
                    }
                    if ($all_brands_products == null)
                    {
                        $first_cat = 0;
                        $last_cat = 0;
                    }
                    else
                    {
                        $productsfor_price = $all_brands_products;
                    }
                }
                else
                {
                    $productsfor_price = App\Product::where('tags', $tag)->where('child', $sid)->get();
                    $get_simple_products = $s_product->where('product_tags', $tag)->where('subcategory_id', $sid);
                }
                foreach ($productsfor_price as $old)
                {

                    foreach ($old->subvariants as $orivar)
                    {
                        if ($price_login == 0 || Auth::user())
                        {

                          $customer_price = ProductPrice::getprice($old,$orivar)->getData()->customer_price;
                          array_push($price_array, $totalprice); 

                        }
                    }
                }

                foreach ($get_simple_products->get() as $key => $sp) {

                  if ($price_login == 0 || Auth::user())
                  {
                    if($sp->offer_price != 0){
                      array_push($price_array, $sp->offer_price);
                    }else{
                      array_push($price_array, $sp->price);
                    }
                      
                  }

                }

                if ($price_array != null)
                {
                    $first_cat = min($price_array);
                    $last_cat = max($price_array);
                }
                unset($price_array);
                $price_array = array();
            }
            else
            {
                if ($brand_names != '')
                {
                    $get_all_products = App\Product::query();

                    if (is_array($brand_names))
                    {
                        foreach ($brand_names as $brands_all)
                        {
                            $all_products_brands = $get_all_products->where('brand_id', $brands_all)->where('tags', $tag)->where('category_id', $catid)->get();

                            foreach ($all_products_brands as $zx)
                            {
                                array_push($all_brands_products, $zx);
                            }
                        }

                        $get_simple_products =    $s_product
                                              ->where('product_tags', $tag)
                                              ->whereIn('brand_id', $brand_names)
                                              ->where('category_id', $catid);

                    }
                    if ($all_brands_products == null)
                    {
                        $first_cat = 0;
                        $last_cat = 0;
                    }
                    else
                    {
                        $productsfor_price = $all_brands_products;
                    }
                }
                else
                {

                    $productsfor_price = App\Product::where('tags', $tag)->where('category_id', $catid)->get();

                    $get_simple_products = $s_product
                                              ->where('product_tags', $tag)
                                              ->where('category_id', $catid);
                }
                foreach ($productsfor_price as $old)
                {

                    foreach ($old->subvariants as $orivar)
                    {
                        if ($price_login == 0 || Auth::user())
                        {

                          $customer_price = ProductPrice::getprice($old,$orivar)->getData()->customer_price;
                          array_push($price_array, $totalprice);
                            
                        }
                    }
                }

                foreach ($get_simple_products->get() as $key => $sp) {

                  if ($price_login == 0 || Auth::user())
                  {
                    if($sp->offer_price != 0){
                      array_push($price_array, $sp->offer_price);
                    }else{
                      array_push($price_array, $sp->price);
                    }
                      
                  }

                }

                if ($price_array != null)
                {
                    $first_cat = min($price_array);
                    $last_cat = max($price_array);
                }
                unset($price_array);
                $price_array = array();
            }
        }

    }
    catch(Exception $e)
    {
        $last_cat = 0;
        $first_cat = 0;
    }

}

else
{

    try
    {
        if ($chid != '')
        {
            if ($brand_names != '')
            {
                $get_all_products = App\Product::query();
                if (is_array($brand_names))
                {
                    foreach ($brand_names as $brands_all)
                    {
                        $all_products_brands = $get_all_products->where('brand_id', $brands_all)->where('grand_id', $chid)->get();

                        foreach ($all_products_brands as $zx)
                        {
                            array_push($all_brands_products, $zx);
                        }
                    }

                    $get_simple_products = $s_product
                                              ->whereIn('brand_id', $brand_names)
                                              ->where('child_id', $chid);

                }
                if ($all_brands_products == null)
                {
                    $first_cat = 0;
                    $last_cat = 0;
                }
                else
                {
                    $productsfor_price = $all_brands_products;
                }
            }
            else
            {
                $productsfor_price = App\Product::where('grand_id', $chid)->get();
                $get_simple_products = $s_product->where('child_id', $chid);
            }
            foreach ($productsfor_price as $old)
            {

                foreach ($old->subvariants as $orivar)
                {
                    if ($price_login == 0 || Auth::user())
                    {

                      $customer_price = ProductPrice::getprice($old,$orivar)->getData()->customer_price;
                      array_push($price_array, $totalprice);
                        
                    }
                }
            }

            foreach ($get_simple_products->get() as $key => $sp) {

                if ($price_login == 0 || Auth::user())
                {
                  if($sp->offer_price != 0){
                    array_push($price_array, $sp->offer_price);
                  }else{
                    array_push($price_array, $sp->price);
                  }
                    
                }

            }


            if ($price_array != null)
            {
                $first_cat = min($price_array);
                $last_cat = max($price_array);
            }
            unset($price_array);
            $price_array = array();
        }
        else
        {
            if ($sid != '')
            {
                if ($brand_names != '')
                {
                    $get_all_products = App\Product::query();
                    if (is_array($brand_names))
                    {
                        foreach ($brand_names as $brands_all)
                        {
                            $all_products_brands = $get_all_products->where('brand_id', $brands_all)->where('child', $sid)->get();
                            foreach ($all_products_brands as $zx)
                            {
                                array_push($all_brands_products, $zx);
                            }
                        }

                        $get_simple_products = $s_product
                                              ->whereIn('brand_id', $brand_names)
                                              ->where('subcategory_id', $sid);

                    }
                    if ($all_brands_products == null)
                    {
                        $first_cat = 0;
                        $last_cat = 0;
                    }
                    else
                    {
                        $productsfor_price = $all_brands_products;
                    }
                }
                else
                {
                    $productsfor_price = App\Product::where('child', $sid)->get();

                    $get_simple_products = $s_product->where('subcategory_id', $sid);
                }
                foreach ($productsfor_price as $old)
                {

                    foreach ($old->subvariants as $orivar)
                    {
                        if ($price_login == 0 || Auth::user())
                        {

                          $customer_price = ProductPrice::getprice($old,$orivar)->getData()->customer_price;
                          array_push($price_array, $totalprice);

                        }
                    }
                }

                foreach ($get_simple_products->get() as $key => $sp) {

                  if ($price_login == 0 || Auth::user())
                  {
                    if($sp->offer_price != 0){
                      array_push($price_array, $sp->offer_price);
                    }else{
                      array_push($price_array, $sp->price);
                    }
                      
                  }

                }

                if ($price_array != null)
                {
                    $first_cat = min($price_array);
                    $last_cat = max($price_array);
                }
                unset($price_array);
                $price_array = array();
            }
            else
            {

                if ($brand_names != '')
                {
                    $get_all_products = App\Product::query();
                    if (is_array($brand_names))
                    {
                        foreach ($brand_names as $brands_all)
                        {
                            $all_products_brands = $get_all_products->where('brand_id', $brands_all)->where('category_id', $catid)->get();
                            foreach ($all_products_brands as $zx)
                            {
                                array_push($all_brands_products, $zx);
                            }
                        }

                        $get_simple_products = $s_product
                                              ->whereIn('brand_id', $brand_names)
                                              ->where('category_id', $catid);

                    }

                    if ($all_brands_products == null)
                    {
                        $first_cat = 0;
                        $last_cat = 0;
                    }
                    else
                    {
                        $productsfor_price = $all_brands_products;
                    }
                }
                else
                {
                    $productsfor_price = App\Product::where('category_id', $catid)->get();

                    $get_simple_products = $s_product->where('subcategory_id', $sid);
                }
                foreach ($productsfor_price as $old)
                {

                    foreach ($old->subvariants as $orivar)
                    {
                        if ($price_login == 0 || Auth::user())
                        {

                          $customer_price = ProductPrice::getprice($old,$orivar)->getData()->customer_price;
                          array_push($price_array, $totalprice);

                        }
                    }
                }

                foreach ($get_simple_products->get() as $key => $sp) {

                  if ($price_login == 0 || Auth::user())
                  {
                    if($sp->offer_price != 0){
                      array_push($price_array, $sp->offer_price);
                    }else{
                      array_push($price_array, $sp->price);
                    }
                      
                  }

                }

                if ($price_array != null)
                {
                    $first_cat = min($price_array);
                    $last_cat = max($price_array);
                }
                unset($price_array);
                $price_array = array();
            }
        }

    }
    catch(Exception $e)
    {
        $last_cat = 0;
        $first_cat = 0;
    }

}

@endphp
<div id="app">

</div>
<div class='container-fluid'>
    <div class='row categoryfilter-block'>
      <div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 sidebar'>
     

        @php
          $isad = App\DetailAds::where('position','=','category')->where('linked_id',$catid)->where('status','=','1')->first();
        @endphp
        <div class="adbox">
            @if(isset($isad))
                
                
                    <div class="home-banner outer-top-n outer-bottom-xs">
                        @if($isad->adsensecode != '')
                          @php
                            echo html_entity_decode($isad->adsensecode);
                          @endphp
                        @else
                            @if($isad->show_btn == '1')
                               <h3 class="buy-heading" style="color:{{ $isad->hcolor }}">{{ $isad->top_heading }}</h3>
                               <h4 class="buy-sub-heading" style="color:{{ $isad->scolor }}">{{ $isad->sheading }}</h4>
                               <center><a href="
                               @if($isad->linkby == 'category')
                                 {{ App\Helpers\CategoryUrl::getURL($isad->cat_id) }}
                               @elseif($isad->linkby == 'detail' && $isad->pro_id != '' && $isad->product && $isad->product->subvariants)
                                {{ App\Helpers\ProductUrl::getURL($isad->product->subvariants[0]['id']) }}
                               @elseif($isad->linkby == 'url')
                                {{ $isad->url }}
                               @endif" style="color:{{ $isad->btn_txt_color }};background: {{ $isad->btn_bg_color }}" class="btn buy-button">{{ $isad->btn_text }}</a></center>
                               <img src="{{ url('images/detailads/'.$isad->adimage) }}" alt="advertise" class="img-responsive img-fluid">
                            @elseif($isad->show_btn == 0 && $isad->top_heading != '')
                               <a href="
                              @if($isad->linkby == 'category')
                                {{ App\Helpers\CategoryUrl::getURL($isad->cat_id) }}
                              @elseif($isad->linkby == 'detail' && $isad->pro_id != '' && $isad->product->subvariants)
                                {{ App\Helpers\ProductUrl::getURL($isad->product->subvariants[0]['id']) }}
                              @elseif($isad->linkby == 'url')
                                {{ $isad->url }}
                              @endif
                              ">
                                <h3 class="buy-heading" style="color:{{ $isad->hcolor }}">{{ $isad->top_heading }}</h3>
                                <h4 class="buy-sub-heading" style="color:{{ $isad->scolor }}">{{ $isad->sheading }}</h4>
                                <img src="{{ url('images/detailads/'.$isad->adimage) }}" alt="advertise" class="img-responsive img-fluid">
                              </a>
                            @else
                              <a href="
                              @if($isad->linkby == 'category')
                                {{ App\Helpers\CategoryUrl::getURL($isad->cat_id) }}
                              @elseif($isad->linkby == 'detail' && $isad->pro_id != '' && $isad->product && $isad->product->subvariants)
                                {{ App\Helpers\ProductUrl::getURL($isad->product->subvariants[0]['id']) }}
                              @elseif($isad->linkby == 'url')
                                {{ $isad->url }}
                              @endif
                              ">
                                <img src="{{ url('images/detailads/'.$isad->adimage) }}" alt="advertise" class="img-responsive img-fluid">
                              </a>
                            @endif
                        @endif
                    </div>
                
            @endif
        </div>
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs navigation-small-block">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> {{ __('staticwords.Categories') }}</div>
          <nav class=" megamenu-horizontal">
           
           
            @php 
            
              $price_array = array();
              
              $pirmarycategories = App\Category::orderBy('title','ASC')->select('categories.*')->where('categories.status','=','1')->get();
                               
             
            @endphp
            
            <ul class="nav flex-column flex-nowrap overflow-hidden">
             @foreach($pirmarycategories->unique() as $item)

                    @if($item->simpleproducts()->where('status','1')->count()) 

                      @if($price_login == 0 || Auth::check())

                          @foreach ($item->simpleproducts()->where('status','1')->get() as $sp)

                              @if($sp->offer_price != 0)
                                  @php
                                    array_push($price_array, $sp->offer_price);
                                  @endphp
                              @else
                                @php
                                    array_push($price_array, $sp->price);
                                @endphp
                              @endif
                              
                          @endforeach

                      @endif

                    @endif
                
                    @foreach($item->products as $old)

                      
                        @foreach($old->subvariants as $orivar)
                                
                        @if($price_login == 0 || Auth::check())
                        
                                    @php
                                              
                                              $convert_price = 0;
                                              $show_price = 0;
                                              
                                              $commision_setting = App\CommissionSetting::first();

                                              if($commision_setting->type == "flat"){

                                                $commission_amount = $commision_setting->rate;
                                                if($commision_setting->p_type == 'f'){

                                                  if($old->tax_r !=''){
                                                    $cit = $commission_amount*$old->tax_r/100;
                                                    $totalprice = $old->vender_price+$orivar->price+$commission_amount+$cit;
                                                    $totalsaleprice = $old->vender_offer_price + $orivar->price + $commission_amount+$cit;
                                                  }else{
                                                    $totalprice = $old->vender_price+$orivar->price+$commission_amount;
                                                    $totalsaleprice = $old->vender_offer_price + $orivar->price + $commission_amount;
                                                  }
                                                
                                                

                                                  if($old->vender_offer_price == 0){
                                                      $totalprice;
                                                      array_push($price_array, $totalprice);
                                                    }else{
                                                      $totalsaleprice;
                                                      $convert_price = $totalsaleprice==''?$totalprice:$totalsaleprice;
                                                      $show_price = $totalprice;
                                                      array_push($price_array, $totalsaleprice);
                                                    
                                                    }

                                                  
                                                }else{

                                                  $totalprice = ($old->vender_price+$orivar->price)*$commission_amount;

                                                  $totalsaleprice = ($old->vender_offer_price+$orivar->price)*$commission_amount;

                                                  $buyerprice = ($old->vender_price+$orivar->price)+($totalprice/100);

                                                  $buyersaleprice = ($old->vender_offer_price+$orivar->price)+($totalsaleprice/100);

                                                
                                                    if($old->vender_offer_price ==0){
                                                      $bprice = round($buyerprice,2);
                                                    
                                                        array_push($price_array, $bprice);
                                                    }else{
                                                      $bsprice = round($buyersaleprice,2);
                                                      $convert_price = $buyersaleprice==''?$buyerprice:$buyersaleprice;
                                                      $show_price = $buyerprice;
                                                      array_push($price_array, $bsprice);
                                                    
                                                    }
                                                

                                                }
                                              }else{
                                                
                                              $comm = App\Commission::where('category_id',$old->category_id)->first();
                                              if(isset($comm)){
                                            if($comm->type=='f'){

                                              if($old->tax_r !=''){
                                                $cit =$comm->rate*$old->tax_r/100;
                                                $price =  $old->vender_price  + $comm->rate+$orivar->price+$cit;
                                                $offer =  $old->vender_offer_price  + $comm->rate+$orivar->price+$cit;
                                              }else{
                                                $price =  $old->vender_price  + $comm->rate+$orivar->price;
                                                $offer =  $old->vender_offer_price  + $comm->rate+$orivar->price;
                                              }
                                              
                                              

                                                $convert_price = $offer==''?$price:$offer;
                                                $show_price = $price;

                                                if($old->vender_offer_price == 0){

                                                      array_push($price_array, $price);
                                                    }else{
                                                      array_push($price_array, $offer);
                                                    }

                                                
                                                
                                            }
                                            else{

                                                  $commission_amount = $comm->rate;

                                                  $totalprice = ($old->vender_price+$orivar->price)*$commission_amount;

                                                  $totalsaleprice = ($old->vender_offer_price+$orivar->price)*$commission_amount;

                                                  $buyerprice = ($old->vender_price+$orivar->price)+($totalprice/100);

                                                  $buyersaleprice = ($old->vender_offer_price+$orivar->price)+($totalsaleprice/100);

                                                
                                                    if($old->vender_offer_price ==0){
                                                      $bprice = round($buyerprice,2);
                                                        array_push($price_array, $bprice);
                                                    }else{
                                                      $bsprice = round($buyersaleprice,2);
                                                      $convert_price = $buyersaleprice==''?$buyerprice:$buyersaleprice;
                                                      $show_price = round($buyerprice,2);
                                                      array_push($price_array, $bsprice);
                                                    }
                                                
                                                
                                                  
                                            }
                                        }else{
                                                  $commission_amount = 0;

                                                  $totalprice = ($old->vender_price+$orivar->price)*$commission_amount;

                                                  $totalsaleprice = ($old->vender_offer_price+$orivar->price)*$commission_amount;

                                                  $buyerprice = ($old->vender_price+$orivar->price)+($totalprice/100);

                                                  $buyersaleprice = ($old->vender_offer_price+$orivar->price)+($totalsaleprice/100);

                                                
                                                    if($old->vender_offer_price ==0){
                                                        $bprice = round($buyerprice,2);
                                                        array_push($price_array, $bprice);
                                                    }else{
                                                      $bsprice = round($buyersaleprice,2);
                                                      $convert_price = $buyersaleprice==''?$buyerprice:$buyersaleprice;
                                                      $show_price = round($buyerprice,2);
                                                      array_push($price_array, $bsprice);
                                                    }
                                        }
                                      }
                              
                                    @endphp
                                  
                                
                        @endif

                  
                      @endforeach
                      
                      

                              
                    @endforeach

                @if($price_login == 0 || Auth::check())
                    <?php
                    if($price_array != null){
                    $first =  min($price_array);
                    $startp =  round($first);
                    if($startp >= $first){
                        $startp = $startp-1;
                      }else{
                        $startp = $startp;
                      }

                      
                    $last = max($price_array);
                    $endp =  round($last);

                    if($endp <= $last){
                        $endp = $endp+1;
                      }else{
                        $endp = $endp;
                      }

                    }
                    else{
                      $startp = 0.00;
                      $endp = 0.00;
                    }

                    if(isset($first)){

                      if($first == $last){
                        $startp=0.00;
                      }

                    }
                    

                    unset($price_array); 
                    
                    $price_array = array();
                    ?>
                
                  @endif

                  <li class="nav-item">
                    <div class="row">
                        <div class="col-10">
                            <a role="button" class="nav-link text-truncate" href="{{url('shopcat?category='.$item->id)}}">
                            <i class="fa {{ $item['icon'] }}"></i> 
                            <span class="d-inline">{{ $item['title'] }}</span>
                            </a>
                        </div>
                    </div>
                  </li>
             @endforeach
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu -->
        <!-- ================================== TOP NAVIGATION : END ================================== -->
        <div class="sidebar-module-container">
          <div class="sidebar-filter">
         <!--End-->
        </div>
          
          <!-- /.sidebar-filter -->
        </div>
        <!-- /.sidebar-module-container -->
      </div>
      <!-- /.sidebar -->
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-10 rht-col">
        
        <div class="clearfix filters-container ">
          <div class="row">
            <div class="col col-sm-6 col-md-3 col-lg-3 col-12">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  
                  
                  
                </ul>
              </div>
              <!-- /.filter-tabs -->
            </div>
            
          </div>
          <!-- /.row -->
        </div>
        <div class="search-conversion_rate-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product filter-block">
                <div>
                    
                    <div>
                        <div class="row" id="customCat">
                          <div class="col-md-12">
                            <section class="mt-2 section new-arriavls feature-product-block">
                              <h3 class="section-title"> {{$category_titles->title}} </h3>
                              <div class="owl-carousel custom-carousel owl-theme outer-top-xs">
                                <?php
                                for($i=0; $i<count($category_entries); $i++){
                                  $store_fx = $category_entries[$i];
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

                        
                  
                    </div>
                    </div>
                      
                    </div>
                    <!-- /.product-list -->
                  </div>
                  <!-- /.products -->
                </div>
                <!-- /.category-product-inner -->


                <!-- /.category-product-inner -->


                <!-- /.category-product-inner -->
                
              </div>
              <!-- /.category-product -->
            </div>
            <!-- /.tab-pane #list-container -->
          </div>
         

        </div>
        <!-- /.search-conversion_rate-container -->
        
      </div>
      <!-- /.col -->
    </div>
</div>
@endsection
@section('head-script')
   
@endsection
@section('script')
<script type="text/javascript">
		$(document).ready(function($) {
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

	</script>    
@endsection