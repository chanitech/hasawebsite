<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'services' => Service::count(),
            'categories' => Category::count(),
            'sliders' => Slider::where('is_active', true)->count(),
            'gallery' => Gallery::count(),
            'blogs' => Blog::count(),
            'contacts' => Contact::count(),
        ];

        $recentContacts = Contact::latest()->take(5)->get();
        $recentBlogs = Blog::latest()->take(5)->get();

        return view('dashboard', compact('stats', 'recentContacts', 'recentBlogs'));
    }
}
