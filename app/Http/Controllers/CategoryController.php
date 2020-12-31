<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parent')->paginate(5);
        return view('categories.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('categories.create', ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maxID = Category::max('id');
        $new_category = new Category;
        $new_category->name = $request->get('name');
        $new_category->parent_id = $request->get('parent_id');

        if ($request->file('image')) {
            $image_path = $request->file('image')->store('category_image', 'public');
            $new_category->image = $image_path;
        }
        $new_category->created_by = \Auth::user()->id;
        $new_category->slug = \Str::slug($request->get('name') . '-' . ($maxID+1) );
        $new_category->save();
        return redirect()->route('categories.index')->with('status', 'Category Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::with('parent')->findOrFail($id);
        $categories = Category::get();
        return view('categories.edit', compact('category', 'categories'));
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
        $category = Category::findOrFail($id);

        $category->parent_id = $request->get('parent_id');
        $category->name = $request->get('name');
        $category->slug = \Str::slug($request->get('name') . "-" . $id);

        $new_image = $request->get('image');
        if ($new_image){
            if ($category->image && file_exists(storage_path('app/public/' . $category->image)))  {
                \Storage::delete('public/' . $category->image);
            }
            $new_path_image = $new_image->store('category_image', 'public');
            $category->image = $new_path_image;
        }

        $category->updated_by = \Auth::user()->id;
        $category->save();
        return redirect()->route('categories.edit', [$id])->with('status', 'User successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrfail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('status', 'category successfully DELETED!');
    }
}
