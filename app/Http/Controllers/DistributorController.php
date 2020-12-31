<?php

namespace App\Http\Controllers;

use App\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributors = Distributor::all();
        return view('distributors.index', compact('distributors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distributors.create');
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
            'name' => 'required|min:3', 
            'email' => 'required|unique:distributors|email', 
            'phone' => 'required|unique:distributors', 
            'address' => 'required|min:11|max:250', 
            'desc' => 'required|min:11|max:250' 
        ], [
            'name.required' => 'Kolom Nama tidak boleh kosong!',
            'name.min' => 'Kolom Nama minimal 3 karakter!',
            'email.required' => 'Kolom Email tidak boleh kosong!',
            'email.unique' => 'Email sudah terdaftar, silahkan coba email lain!',
            'email.email' => 'Ketikan alamat email yang valid!',
            'phone.required' => 'Kolom Phone tidak boleh kosong!',
            'phone.unique' => 'Phone sudah terdaftar!',
            'address.required' => 'Kolom Alamat tidak boleh kosong!',
            'address.min' => 'Kolom Alamat minimal 11 karakter!',
            'address.max' => 'Kolom Alamat maximal 250 karakter!',
            'desc.required' => 'Kolom Keterangan tidak boleh kosong!',
            'desc.min' => 'Kolom Keterangan minimal11 kakater!',
            'desc.max' => 'Kolom keterangan maximal 250 karakter!'
        ]);

        $new_distributor = new Distributor;
        $new_distributor->name = $request->get('name');
        $new_distributor->email = $request->get('email');
        $new_distributor->phone = $request->get('phone');
        $new_distributor->address = $request->get('address');
        $new_distributor->desc = $request->get('desc');
        $new_distributor->created_by = \Auth::user()->id;
        
        $new_distributor->save();
        return redirect()->route('distributors.create')->with('status','Add Distributor Successfully!') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $distributor = Distributor:: findOrFail($id);
        return view('distributors.show', compact('distributor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('distributors.edit', compact('distributor'));
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
            'name' => 'required|min:3', 
            'email' => 'required|email', 
            'phone' => 'required', 
            'address' => 'required|min:11|max:250', 
            'desc' => 'required|min:11|max:250' 
        ], [
            'name.required' => 'Kolom Nama tidak boleh kosong!',
            'name.min' => 'Kolom Nama minimal 3 karakter!',
            'email.required' => 'Kolom Email tidak boleh kosong!',
            'email.email' => 'Ketikan alamat email yang valid!',
            'phone.required' => 'Kolom Phone tidak boleh kosong!',
            'address.required' => 'Kolom Alamat tidak boleh kosong!',
            'address.min' => 'Kolom Alamat minimal 11 karakter!',
            'address.max' => 'Kolom Alamat maximal 250 karakter!',
            'desc.required' => 'Kolom Keterangan tidak boleh kosong!',
            'desc.min' => 'Kolom Keterangan minimal 11 kakater!',
            'desc.max' => 'Kolom keterangan maximal 250 karakter!'
        ]);

        $distributor = Distributor::findOrFail($id);
        $distributor->name = $request->get('name');
        $distributor->email = $request->get('email');
        $distributor->phone = $request->get('phone');
        $distributor->address = $request->get('address');
        $distributor->desc = $request->get('desc');
        $distributor->updated_by = \Auth::user()->id;

        $distributor->save();
        return redirect()->route('distributors.edit', [$id])->with('status', 'Distributor Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->deleted_by = \Auth::user()->id;
        $distributor->save();
        $distributor->delete();
        return redirect()->route('distributors.index')->with('status', 'Distributor Successfully DELETED!');
    }
}
