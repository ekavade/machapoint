<?php

namespace App\Http\Controllers;
use App\Store;
use App\Vendorteam;
use Illuminate\Http\Request;

class VenteamController extends Controller
{
    public function create()
    {
        $stores = Store::with('user')->whereHas('user')->get();
            return view('vendor_team', compact('stores'));
    }

    public function store(Request $request)
    {
        request()->all();
        $imagepath1=request('image')->store('uploads', 'public');
        Vendorteam::create([
                'store_id'=>request('store_id'),
                'image'=>$imagepath1,
                'name'=>request('name'),
                'position'=>request('position')
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

        $vendorteam = Vendorteam::where('store_id', $id)->get();

        return view("vendor_team_edit", compact("vendorteam"));
    }
}
