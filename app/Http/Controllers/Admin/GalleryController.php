<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;


class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'nullable|string|max:255',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $path = $request->file('image')->store('gallery','public');
        Gallery::create(['title'=>$request->title,'image_path'=>$path]);

        return redirect()->route('admin.gallery.index')->with('success','Image uploaded.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title'=>'nullable|string|max:255',
            'image'=>'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        if($request->hasFile('image')){
            \Illuminate\Support\Facades\Storage::disk('public')->delete($gallery->image_path);

            $path = $request->file('image')->store('gallery','public');
            $gallery->image_path = $path;
        }

        $gallery->title = $request->title;
        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success','Gallery updated.');
    }

    public function destroy(Gallery $gallery)
    {
        \Illuminate\Support\Facades\Storage::disk('public')->delete($gallery->image_path);

        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success','Gallery deleted.');
    }
}
