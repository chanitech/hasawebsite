<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Contact;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        

    // Services for footer / layout
    View::composer('frontend.layouts.*', function ($view) {
        $view->with('services', Service::orderBy('position')->get());
    });

    // Latest blogs (footer)
    View::composer('frontend.layouts.*', function ($view) {
        $view->with(
            'latestBlogs',
            Blog::whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->latest()
                ->limit(3)
                ->get()
        );
    });

    // ✅ Contact info (footer)
    View::composer('frontend.layouts.*', function ($view) {
        $view->with('contact', Contact::first());
    });
    }

    
}
