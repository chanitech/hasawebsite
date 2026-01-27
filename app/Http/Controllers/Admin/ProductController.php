<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'price'=>'required|numeric',
            'category_id'=>'required|exists:categories,id',
            'images.*'=>'image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $product = Product::create($request->only(['name','description','price','category_id']));

        if($request->hasFile('images')){
            foreach($request->file('images') as $img){
                $path = $img->store('products','public');
                $product->images()->create(['image_path'=>$path]);
            }
        }

        return redirect()->route('admin.products.index')->with('success','Product created.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product','categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'price'=>'required|numeric',
            'category_id'=>'required|exists:categories,id',
            'images.*'=>'image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $product->update($request->only(['name','description','price','category_id']));

        if($request->hasFile('images')){
            foreach($request->file('images') as $img){
                $path = $img->store('products','public');
                $product->images()->create(['image_path'=>$path]);
            }
        }

        return redirect()->route('admin.products.index')->with('success','Product updated.');
    }

    public function destroy(Product $product)
    {
        // delete images first
        foreach($product->images as $img){
            \Illuminate\Support\Facades\Storage::disk('public')->delete($img->image_path);

            $img->delete();
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success','Product deleted.');
    }
}
