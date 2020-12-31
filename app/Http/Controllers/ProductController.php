<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        // return $products;
        return view('products.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_product = new Product;
        $maxID = Product::max('id');

        $new_product->category_id = $request->get('category_id');
        $new_product->sku = $request->get('sku');
        $new_product->name = $request->get('name');
        $new_product->slug = \Str::slug($request->get('name') . "-" . ($maxID+1));
        $new_product->desc = $request->get('desc');

        if ($request->file('image')) {
            $img_path = $request->file('image')->store('products_image', 'public');
            $new_product->image = $img_path;
        }

        $new_product->price = $request->get('price');
        $new_product->stock = $request->get('stock');
        $new_product->created_by = Auth::user()->id;

        $new_product->save();
        return redirect()->route('products.create')->with('status', 'Product successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        return view('products.edit', compact('product', 'categories'));
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
        
        $product = Product::findOrFail($id);

        $product->category_id = $request->get('category_id');
        $product->sku = $request->get('sku');
        $product->name = $request->get('name');
        $product->slug = \Str::slug( $request->get('name') . "-" . $id);
        $product->desc = $request->get('desc');

        $new_image = $request->get('image');
        if ($new_image) {
            if ($product->image && file_exists(storage_path('app/public' . $product->image))) {
                \Storage::delete('public/' . $product->image);
            }
            $new_path_image = $new_image->store('products_image', 'public');
            $product->image = $new_path_image;
        }
        $product->price = $request->get('price');
        $product->stock = $request->get('stock');
        $product->updated_by = Auth::user()->id;

        $product->save();
        return redirect()->route('products.edit', [$id])->with('status', 'Product successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->deleted_by = Auth::user()->id;
        $product->save();
        $product->delete();
        return redirect()->route('products.index')->with('status', 'Product Successfully DELETED!');
    }

    public function trash()
    {
        $products_trash = Product::onlyTrashed()->paginate(10);
        return view('products.trash', compact('products_trash')); 
    }

    public function showTrash($id)    
    {
        $product = Product::withTrashed()->findOrFail($id);
        // return $product;
        return view('products.show-trash', compact('product'));
    }
    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        if ($product->trashed()) {
            $product->restore();
        } else {
            return redirect()->route('products.index')->with('status', 'Product is not in trash');
        }
        return redirect()->route('products.index')->with('status', 'Product successfully Restore');
        
    }
    public function deletePermanent($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        if (!$product->trashed()) {
            return redirect()->route('products.index')->with('status', 'Product is Not in trash');
        }else {
            $product->forceDelete();
            return redirect()->route('products.index')->with('status', 'Product Successfully Deleted PERMANENT!');
        } 
    }
}
