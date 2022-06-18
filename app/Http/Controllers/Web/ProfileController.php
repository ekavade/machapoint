<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\OfferPopup;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller {
	public function home($id) {
		$v=DB::table('venderhomes')->where('store_id', $id)->get();
		//dd($v[0]->images);
		$images = array();
		$images = explode(',',$v[0]->images);

		$images2 = array();
		$images2 = explode(',',$v[0]->content2images);

		require base_path() . '/app/Http/Controllers/price.php';
		$offersettings = OfferPopup::first();
		$store=DB::table('stores')->where('id',$id)->get();

		return view('front.profile.homepage', compact('conversion_rate','offersettings','v','images','images2','id','store'));
	}

	public function story($id) {
		require base_path() . '/app/Http/Controllers/price.php';
		$offersettings = OfferPopup::first();

		$story_table=DB::table('venderstories')->where('store_id',$id)->get();		
		$team_table=DB::table('vendorteams')->where('store_id',$id)->get();
		$store=DB::table('stores')->where('id',$id)->get();

		return view('front.profile.storypage', compact('conversion_rate','offersettings','story_table','team_table','id','store'));
	}

	public function productsServices() {
		require base_path() . '/app/Http/Controllers/price.php';
		$offersettings = OfferPopup::first();

		return view('front.profile.productsservicespage', compact('conversion_rate','offersettings'));
	}
}