<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\SiteContent;
use App\Models\Contact;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Blog;

class FrontendController extends Controller
{
    /**
     * Home page
     */
    public function home()
{
    // Active sliders
    $slides = Slider::where('is_active', 1)
                     ->orderBy('position')
                     ->get();

    // About section content
    $about = SiteContent::where('section_name', 'about')->first();

    // Services ordered by position
    $services = Service::orderBy('position')->get();

    $blogs = Blog::where('is_featured', 1)
             ->where(function($query) {
                 $query->whereDate('published_at', '<=', now())
                       ->orWhereNull('published_at');
             })
             ->orderBy('published_at', 'desc')
             ->get();


    // Featured products (optional: limit if needed)
    $featuredProducts = Product::where('is_featured', 1)->get();

    // Contact info (optional)
    $contact = Contact::first();

    // Pass all data to homepage view
    return view('frontend.home', compact(
        'slides',
        'about',
        'services',
        'blogs',
        'featuredProducts',
        'contact'
    ));
}

/**
 * Single blog detail page
 */
public function blogDetail($slug)
{
    $blog = Blog::where('slug', $slug)
        ->where(function ($q) {
            $q->whereNull('published_at')
              ->orWhereDate('published_at', '<=', now());
        })
        ->firstOrFail();

    return view('frontend.blog_detail', compact('blog'));
}

/**
 * Services listing page
 */
public function services()
{
    $services = Service::orderBy('position')->get();
    return view('frontend.services', compact('services'));
}

/**
 * Single service detail page
 */
/**
 * Single Service Detail page
 */
public function serviceDetail($slug)
{
    $service = Service::where('slug', $slug)->firstOrFail();
    return view('frontend.service_detail', compact('service'));
}







    /**
     * About page
     */
    public function about()
    {
        $siteContent = SiteContent::pluck('content', 'section_name')->toArray();

        return view('frontend.about', compact('siteContent'));
    }

    /**
     * Products listing
     */
    public function products(Request $request)
    {
        $query = Product::with(['images', 'category']);

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $products = $query->latest()->paginate(12);
        $categories = Category::orderBy('name')->get();

        return view('frontend.products', compact('products', 'categories'));
    }

    /**
     * Single product detail
     */
    public function productDetail($id)
    {
        $product = Product::with(['images', 'category'])->findOrFail($id);

        return view('frontend.product_detail', compact('product'));
    }

    /**
     * Gallery page
     */
    public function gallery()
    {
        $gallery = Gallery::latest()->paginate(16);

        return view('frontend.gallery', compact('gallery'));
    }

    /**
     * Contact page
     */
    public function contact()
    {
        $contact = Contact::first();

        return view('frontend.contact', compact('contact'));
    }

    public function invest()
{
    return view('frontend.invest');
}


    /**
     * Handle contact form submission
     */
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Your message has been sent successfully.');
    }
}
