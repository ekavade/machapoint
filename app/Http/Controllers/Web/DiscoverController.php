<?php

namespace App\Http\Controllers\Web;

use App\AddSubVariant;
use App\Blog;
use App\Cart;
use App\Category;
use App\CategorySlider;
use App\SimpleProduct;
use App\FrontCat;
use App\Genral;
use App\Grandcategory;
use App\Helpers\CategoryUrl;
use App\Helpers\ChidCategoryUrl;
use App\Helpers\ProductUrl;
use App\Helpers\SubcategoryUrl;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Controller;
use App\Menu;
use App\OfferPopup;
use App\Product;
use App\Slider;
use App\Subcategory;
use App\Testimonial;
use App\Widgetsetting;
use App\Wishlist;
use Avatar;
use GuestCartShipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mtownsend\ReadTime\ReadTime;
use ProductRating;
use ShippingPrice;

class DiscoverController extends Controller {

	public function discoverpage(){
		require base_path() . '/app/Http/Controllers/price.php';

        $offersettings = OfferPopup::first();
		$stores=DB::table('venderhomes')->get();
		
		// get list of all stories
		$stores1 = DB::select('SELECT * from stores where id in (select store_id from stories) order by RAND()');
		$stores_order = DB::select('SELECT * from stores order by created_at desc limit 10');
		$stores_r = DB::select('SELECT * from stores order by RAND() desc limit 10');
		// get 3 random categories
		$category = DB::select('select c.id, c.title from categories c where ( select COUNT(s.id) from stores s where s.cat_id = c.id > 0 ) order by RAND() limit 3');
		$category_ids = array();
		$category_titles = array();
		$category_entries = array();
		foreach ($category as $key => $value) {
			$category_ids[] = $value->id;
			$category_titles[] = $value->title;
			$category_entries[] = DB::select('select * from stores where cat_id = '.$value->id.' order by RAND()');
		}
		return view('front.discoverpage', compact('conversion_rate','offersettings','stores','stores1','stores_order','stores_r','category_ids','category_titles','category_entries'));
	}
}