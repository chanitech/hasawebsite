<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContent;

class SiteContentController extends Controller
{
    public function index()
    {
        $contents = SiteContent::latest()->paginate(10);
        return view('admin.site_contents.index', compact('contents'));
    }

    public function edit(SiteContent $site_content)
    {
        return view('admin.site_contents.edit', compact('site_content'));
    }

    public function update(Request $request, SiteContent $site_content)
    {
        $request->validate([
            'content'=>'required|string'
        ]);

        $site_content->content = $request->content;
        $site_content->save();

        return redirect()->route('admin.site_contents.index')->with('success','Content updated.');
    }
}
