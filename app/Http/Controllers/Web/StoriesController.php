<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\OfferPopup;
use App\story;
use App\Store;
use Illuminate\Support\Facades\DB;

class StoriesController extends Controller {
	public function index($id) {
		require base_path() . '/app/Http/Controllers/price.php';
		$offersettings = OfferPopup::first();

		$stores = DB::table('stores')
					->select('id', 'name', 'store_logo')
					->get();
		$storesWithStories = array();

		// prepend array with selected profile story
		$store = DB::table('stores')->where('id', $id)->first();
		$stories = DB::table('stories')->where('store_id', $id)->get();
		if(count($stories) > 0) {
			$store->stories = $stories;
			$storesWithStories[] = $store;
		}

		foreach ($stores as $key => $store) {
			$stories = DB::table('stories')->where('store_id', $store->id)->where('store_id', '!=', $id)->get();
			if(count($stories) > 0) {
				$store->stories = $stories;
				$storesWithStories[] = $store;
			}
		}
		// $store = DB::select('Select id,name,store_logo from stores where (select count(id) from stories where stories.store_id = stores.id) > 0 ORDER BY CASE WHEN id ='.$id.' THEN 1 ELSE 2 END');
		/*$stories = DB::select('SELECT stories.*, stores.store_logo  from stores left join  stories on stories.store_id = stores.id where stories.id is not NULL ORDER BY CASE WHEN stores.id ='.$id.' THEN 1 ELSE 2 END');*/
		return view('front.storiespage', compact('conversion_rate','offersettings','storesWithStories','stories'));
	}
}