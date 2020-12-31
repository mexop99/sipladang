<?php

namespace App\Http\Controllers;

use App\Distributor;
use App\EnterProduct;
use App\Product;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EnterProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enterProducts = EnterProduct::all();
        return view('enter-product.index', compact('enterProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distributors = Distributor::all();
        $vehicles = Vehicle::all();
        return view('enter-product.create', compact('distributors', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'enter_date'=>'required',
            'plat_number'=>'required',
            'name' => 'required'

        ]);
        $newEnterProduct = new EnterProduct;
        $date1 = $request->get('enter_date');
        $newEnterProduct->enter_date = Carbon::createFromFormat('d/m/yy H.i',$request->get('enter_date'))->format('Y-m-d H:i:s');
        $newEnterProduct->plat_number = strtoupper($request->get('plat_number'));
        $newEnterProduct->name = $request->get('name');
        $newEnterProduct->desc = $request->get('desc');
        $newEnterProduct->distributor_id = $request->get('distributor_id');
        $newEnterProduct->vehicle_id = $request->get('vehicle_id');
        $newEnterProduct->created_by = \Auth::user()->id;
        $newEnterProduct->save();

        return redirect()->route('enter-product.create')->with('status', 'Success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enterProduct = EnterProduct::findOrFail($id);
        $distributors = Distributor::all();
        $vehicles = Vehicle::all();
        $enterProduct->enter_date = Carbon::createFromFormat('Y-m-d H:i:s',$enterProduct->enter_date)->format('d/m/yy H.i');
        return view('enter-product.show', compact('enterProduct', 'distributors', 'vehicles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enterProduct = EnterProduct::findOrFail($id);
        $distributors = Distributor::all();
        $vehicles = Vehicle::all();
        $enterProduct->enter_date = Carbon::createFromFormat('Y-m-d H:i:s',$enterProduct->enter_date)->format('d/m/yy H.i');
        return view('enter-product.edit', compact('enterProduct', 'distributors', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'enter_date'=>'required',
            'plat_number'=>'required',
            'name' => 'required'

        ]);
        $enterProduct = EnterProduct::findOrFail($id);
        $enterDate = $request->get('enter_date');
        $enterProduct->enter_date = Carbon::createFromFormat('d/m/yy H.i', $enterDate)->format('Y-m-d H:i');
        $enterProduct->plat_number = $request->get('plat_number');
        $enterProduct->name = $request->get('name');
        $enterProduct->desc = $request->get('desc');
        $enterProduct->distributor_id = $request->get('distributor_id');
        $enterProduct->vehicle_id = $request->get('vehicle_id');
        $enterProduct->updated_by = \Auth::user()->id;
        // return $enterProduct;
        $enterProduct->save();

        return redirect()->route('enter-product.edit', [$id])->with('status', 'Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * function to detail enter product
     */
    
    public function detailIndex($id)
    {
        return view('enter-product.detail.index');
    }
    public function detailCreate($id)
    {
        $enterProduct = EnterProduct::findOrFail($id);
        $products = Product::all();
        // return $enterProduct;
        return view('enter-product.detail.create', compact('enterProduct','products'));
    }

}
