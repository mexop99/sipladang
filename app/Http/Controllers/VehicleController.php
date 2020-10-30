<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create');
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
            'image' => 'required'
        ], [
            'name.required' => 'Kolom Nama tidak boleh kosong!',
            'name.min' => 'Kolom Nama minimal 3 karakter!',
            'image.required' => 'Kolom gambar tidak boleh kosong!'
        ]);

        $new_vehicle = new Vehicle;
        $new_vehicle->name = $request->get('name');
        $new_vehicle->desc = $request->get('desc');
        $new_vehicle->created_by = \Auth::user()->id;

        if ($request->file('image')) {
            $image_path = $request->file('image')->store('vehicle_image', 'public');
            $new_vehicle->image = $image_path;
        }

        $new_vehicle->save();

        return redirect()->route('vehicles.create')->with('status', 'Success!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.edit', compact('vehicle'));
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
        $vehicle = Vehicle::findOrFail($id);

        $request->validate([
            'name' => 'required|min:3',
            'desc' => 'required'
        ]);

        $vehicle->name = $request->get('name');
        $vehicle->desc = $request->get('desc');

        $new_image = $request->file('image');
        if ($new_image) {
            if ($vehicle->image && file_exists(storage_path('app/public'. $vehicle->image))) {
                Storage::delete('public/'.$vehicle->image);
            }
            $new_path_image = $new_image->store('vehicle_image', 'public');
            $vehicle->image = $new_path_image; 
        }
        $vehicle->updated_by = \Auth::user()->id;
        $vehicle->save();

        return redirect()->route('vehicles.edit', [$id])->with('status', 'Success!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->deleted_by = \Auth::user()->id;
        $vehicle->save();
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('status', 'Success Delete!');
    }
}
