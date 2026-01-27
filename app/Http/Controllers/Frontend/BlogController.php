<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()
            ->orderByDesc('published_at')
            ->paginate(6);

        return view('frontend.blogs.index', compact('blogs'));
    }

    public function show(string $slug)
    {
        $blog = Blog::published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('frontend.blogs.show', compact('blog'));
    }
}
