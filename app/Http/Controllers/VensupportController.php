<?php
namespace App\Http\Controllers;
use App\Store;
use App\Vendersupport;
use Illuminate\Http\Request;

class VensupportController extends Controller
{
    public function create()
    {
        $stores = Store::with('user')->whereHas('user')->get();
            return view('vendor_support', compact('stores'));
    }

    public function store(Request $request){
       //dd( request()->all());
        Vendersupport::create([
            'store_id'=>request('store_id'),
                'title'=>'na',
                'brief'=>request('descr')

        ]);

        notify()->success('Data Saved successfully');

        return back();

    }
}
