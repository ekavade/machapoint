<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Venderstory;

class VenstoryController extends Controller
{
    //
    public function create()
    {
       

        if (in_array('Seller', auth()->user()->getRoleNames()->toArray())) {
            $store = auth()->user()->store;
            return view('seller.simpleproducts.create', compact('categories', 'brands_all', 'store', 'template_size_chart'));
        } else {
            $stores = Store::with('user')->whereHas('user')->get();
            return view('vendor_story', compact('stores'));
        }
        //return view('vendor_home');
    }

     public function store(Request $request)
    {
        request()->all();
        
        
        //dd($imges);
        $imagepath1=request('image1')->store('uploads', 'public');
        $imagepath2=request('image2')->store('uploads', 'public');
        Venderstory::create([
                'store_id'=>request('store_id'),
                'quote'=>request('quote'),
                'w1'=>request('word1'),
                'w2'=>request('word2'),
                'w3'=>request('word3'),
                'content1'=>request('content1'),
                'img1'=>$imagepath1,
                'content2'=>request('content2'),
                'img2'=>$imagepath2,
                'content3'=>request('content3'),
                'meeting'=>request('meeting'),
                'execute'=>request('executive'),
                'delivery'=>request('delivery'),
                'meet'=>request('meet')
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

        $vendorstory = Venderstory::where('store_id', $id)->get();
        $stores = Store::with('user')->whereHas('user')->get();
        return view("vendor_story_edit", compact("vendorstory","stores"));
    }

    public function save(Request $request, $id)
    {
        
        abort_if(!auth()->user()->can('stores.edit'),403,__('User does not have the right permissions.'));
        $store = Venderstory::find($id);

        if(!$store) {
            notify()->error(__('Store Not found !'),'404');
            return back();
        }

        $input = $request->all();

        if (request('image1')) {
            $banner_images = request('image1');
            $url = $banner_images->store('uploads', 'public');

            if ($store->img1 != null) {
                if (file_exists(storage_path() . '/app/public/uploads' . $store->image1)) {
                    unlink(storage_path() . '/app/public/uploads' . $store->image1);
                }
            }
            $input['img2'] = $url;
        }
        if (request('image2')) {
            $banner_images = request('image2');
            $url = $banner_images->store('uploads', 'public');

            if ($store->img2 != null) {
                if (file_exists(storage_path() . '/app/public/uploads' . $store->image2)) {
                    unlink(storage_path() . '/app/public/uploads' . $store->image2);
                }
            }
            $input['img2'] = $url;
        }

        $input['w1']=request('word1');
        $input['w2']=request('word2');
        $input['w3']=request('word3');
        $input['execute']=request('executive');

        
        $store->update($input);
        notify()->success(__('Vendor Homepage has been updated !'.$store->name));
        return back();
    }
}
