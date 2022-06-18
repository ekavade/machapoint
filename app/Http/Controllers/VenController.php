<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venderhome;
use App\Brand;
use App\Category;
use App\Commission;
use App\CommissionSetting;
use App\CurrencyNew;
use App\Genral;
use App\Http\Controllers\Web\HomeController;
use App\Notifications\SendReviewNotification;
use App\Product360Frame;
use App\ProductGallery;
use App\Seo;
use App\SimpleProduct;
use App\SizeChart;
use App\Store;
use App\Testimonial;
use App\User;
use App\UserReview;
use App\Widgetsetting;
use App\Wishlist;
use Avatar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Image;
use Yajra\DataTables\Facades\DataTables;

class VenController extends Controller
{
    //
    //
    public function create()
    {
       

        if (in_array('Seller', auth()->user()->getRoleNames()->toArray())) {
            $store = auth()->user()->store;
            return view('seller.simpleproducts.create', compact('categories', 'brands_all', 'store', 'template_size_chart'));
        } else {
            $stores = Store::with('user')->whereHas('user')->get();
            return view('vendor_home', compact('stores'));
        }
        //return view('vendor_home');
    }

    public function store(Request $request)
    {
        request()->all();
        $banner_images = array_filter(request('images'));
        $content2_images=array_filter(request('content2images'));
        $data1 = array();
        $data2 = array();
        for ($i = 0; $i < count($banner_images); $i++) {
       
                $url = $banner_images[$i]->store('uploads', 'public');
                array_push($data1, $url);
            }
            $imges = '';
            for ($i = 0; $i < count($data1); $i++) {
                $imges .= $data1[$i] . ',';
            }
            for ($i = 0; $i < count($content2_images); $i++) {
       
                $url = $content2_images[$i]->store('uploads', 'public');
                array_push($data2, $url);
            }
            $imges2 = '';
            for ($i = 0; $i < count($data2); $i++) {
                $imges2 .= $data2[$i] . ',';
            }
        //dd($imges);
        $imagepath1=request('image1')->store('uploads', 'public');
        $imagepath2=request('image2')->store('uploads', 'public');
        $imagepath3=request('image3')->store('uploads', 'public');
        Venderhome::create([
                'store_id'=>request('store_id'),
                'content1'=>request('content1'),
                'content2'=>request('content2'),
                'tag'=>request('tag'),
                'our_mission'=>request('our_mission'),
                'our_vision'=>request('our_vision'),
                'why_us'=>request('why_us'),
                'images'=>$imges,
                'image1'=>$imagepath1,
                'image2'=>$imagepath2,
                'image3'=>$imagepath3,
                'content2images'=>$imges2,
                'num1'=>request('num1'),
                'num2'=>request('num2'),
                'num3'=>request('num3'),
                'num4'=>request('num4'),
                'sign1'=>request('sign1'),
                'sign2'=>request('sign2'),
                'sign3'=>request('sign3'),
                'sign4'=>request('sign4'),
                'name1'=>request('name1'),
                'name2'=>request('name2'),
                'name3'=>request('name3'),
                'name4'=>request('name4'),
        ]);

       notify()->success('Data Saved successfully');

    return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(!auth()->user()->can('stores.edit'),403,__('User does not have the right permissions.'));

        $vendorhome = Venderhome::where('store_id', $id)->get();
        $stores = Store::with('user')->whereHas('user')->get();
        return view("vendor_home_edit", compact("vendorhome", "stores"));
    }

    public function save(Request $request, $id)
    {
        
        abort_if(!auth()->user()->can('stores.edit'),403,__('User does not have the right permissions.'));
        $store = Venderhome::find($id);

        if(!$store) {
            notify()->error(__('Store Not found !'),'404');
            return back();
        }

        $input = $request->all();
        
        if (request('images')) {

            $banner_images = array_filter(request('images'));
            $data1 = array();
            for ($i = 0; $i < count($banner_images); $i++) {
                $url = $banner_images[$i]->store('uploads', 'public');
                array_push($data1, $url);
            }

            $imges = '';
            for ($i = 0; $i < count($data1); $i++) {
                $imges .= $data1[$i] . ',';
            }

            if ($store->images != null) {
                $img_list = explode(",", $store->images);
                for ($i = 0; $i < count($img_list); $i++) {
                    if (file_exists(storage_path() . '/app/public/uploads' . $img_list[$i])) {
                        unlink(storage_path() . '/app/public/uploads' . $img_list[$i]);
                    }
                }
            }
            $input['images'] = $imges;
        }

        if (request('content2images')) {

            $banner_images = array_filter(request('content2images'));
            $data1 = array();
            for ($i = 0; $i < count($banner_images); $i++) {
                $url = $banner_images[$i]->store('uploads', 'public');
                array_push($data1, $url);
            }

            $imges = '';
            for ($i = 0; $i < count($data1); $i++) {
                $imges .= $data1[$i] . ',';
            }

            if ($store->content2images != null) {
                $img_list = explode(",", $store->content2images);
                for ($i = 0; $i < count($img_list); $i++) {
                    if (file_exists(storage_path() . '/app/public/uploads' . $img_list[$i])) {
                        unlink(storage_path() . '/app/public/uploads' . $img_list[$i]);
                    }
                }
            }
            $input['content2images'] = $imges;
        }

        if (request('image1')) {
            $banner_images = request('image1');
            $url = $banner_images->store('uploads', 'public');

            if ($store->image1 != null) {
                if (file_exists(storage_path() . '/app/public/uploads' . $store->image1)) {
                    unlink(storage_path() . '/app/public/uploads' . $store->image1);
                }
            }
            $input['image1'] = $url;
        }
        if (request('image2')) {
            $banner_images = request('image2');
            $url = $banner_images->store('uploads', 'public');

            if ($store->image2 != null) {
                if (file_exists(storage_path() . '/app/public/uploads' . $store->image2)) {
                    unlink(storage_path() . '/app/public/uploads' . $store->image2);
                }
            }
            $input['image2'] = $url;
        }
        if (request('image3')) {
            $banner_images = request('image3');
            $url = $banner_images->store('uploads', 'public');

            if ($store->image3 != null) {
                if (file_exists(storage_path() . '/app/public/uploads' . $store->image3)) {
                    unlink(storage_path() . '/app/public/uploads' . $store->image3);
                }
            }
            $input['image3'] = $url;
        }
        
        $store->update($input);
        notify()->success(__('Vendor Homepage has been updated !'.$store->name));
        return back();
    }

}