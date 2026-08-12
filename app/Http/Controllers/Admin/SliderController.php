<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        // Order by position and paginate
        $sliders = Slider::orderBy('position', 'asc')->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'subtitle'     => 'nullable|string|max:255',
            'button_text'  => 'nullable|string|max:100',
            'button_link'  => 'nullable|url|max:255',
            'image'        => 'required|image|mimes:jpg,jpeg,png,gif|max:122880',
            'position'     => 'nullable|integer',
            'is_active'    => 'nullable|boolean',
        ]);

        $data = $request->only(['title','subtitle','button_text','button_link','position']);
        $data['is_active'] = $request->has('is_active'); // checkbox handling

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('sliders','public');
        }

        Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('success','Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'subtitle'     => 'nullable|string|max:255',
            'button_text'  => 'nullable|string|max:100',
            'button_link'  => 'nullable|url|max:255',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'position'     => 'nullable|integer',
            'is_active'    => 'nullable|boolean',
        ]);

        $data = $request->only(['title','subtitle','button_text','button_link','position']);
        $data['is_active'] = $request->has('is_active');

        if($request->hasFile('image')){
            // Delete old image
            if($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            $data['image'] = $request->file('image')->store('sliders','public');
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success','Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        // Delete image from storage
        if($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success','Slider deleted successfully.');
    }
}
