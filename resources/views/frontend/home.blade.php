@extends('frontend.layouts.app')
@section('title', 'Home')

@section('content')

{{-- STICKY TOP BAR --}}


{{-- HERO SLIDER --}}
@if($slides->count())
<div id="heroSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($slides as $index => $slider)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <div class="position-relative">
                <img src="{{ asset('storage/'.$slider->image) }}" class="w-100" style="height:85vh;object-fit:cover" alt="{{ $slider->title }}">
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to right, rgba(0,0,0,.65), rgba(0,0,0,.25));"></div>
                <div class="carousel-caption text-start text-light animate__animated animate__fadeInLeft">
                    <h1 class="display-4 fw-bold">{{ $slider->title }}</h1>
                    @if($slider->subtitle)
                        <p class="lead">{{ $slider->subtitle }}</p>
                    @endif
                    @if($slider->button_text && $slider->button_link)
                        <a href="{{ $slider->button_link }}" class="btn btn-warning btn-lg me-2 shadow">{{ $slider->button_text }}</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
@endif

{{-- ABOUT SECTION --}}
@if($about)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-md-6 animate__animated animate__fadeInLeft">
                <img src="{{ asset('storage/'.$about->image) }}" class="img-fluid rounded shadow-sm" alt="{{ $about->title }}">
            </div>
            <div class="col-md-6 animate__animated animate__fadeInRight">
                <h6 class="text-success fw-bold mb-2">Who We Are</h6>
                <h2 class="fw-bold mb-3">{{ $about->title }}</h2>
                <p class="text-muted">{{ $about->description }}</p>
                <a href="{{ route('frontend.about') }}" class="btn btn-success mt-3 shadow">Read More</a>
            </div>
        </div>
    </div>
</section>
@endif

{{-- SERVICES SECTION --}}
{{-- SERVICES SECTION --}}
<section class="py-5">
    <div class="container">
        {{-- Section title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h2 class="fw-bold">Our Services</h2>
            
        </div>

        {{-- Services list --}}
        <div class="row justify-content-left">
            <div class="col-md-12 animate__animated animate__fadeInUp">
                <ul class="list-group list-group-numbered shadow-sm">
                    @foreach($services as $service)
                    <li class="list-group-item d-flex justify-content-between align-items-start mb-2 rounded">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{ $service->title }}</div>
                            @if($service->description)
                            {{--<small class="text-muted">{{ $service->description }}</small>--}}
                            @endif
                        </div>
                        <a href="{{ route('frontend.services.show', ['slug' => $service->slug]) }}" 
                           class="btn btn-sm btn-outline-success">Read More</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>


{{-- BLOG SECTION --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h2 class="fw-bold">Latest Blog Posts</h2>
        </div>
        <div class="row g-4">
            @forelse($blogs as $blog)
            <div class="col-md-4 animate__animated animate__fadeInUp">
                <div class="card h-100 shadow-sm border-0 hover-shadow">
                    @if($blog->image)
                        <img src="{{ asset('storage/'.$blog->image) }}" class="card-img-top" alt="{{ $blog->title }}" loading="lazy">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $blog->title }}</h5>
                        <p class="card-text text-muted">{{ $blog->excerpt }}</p>
                        <a href="{{ route('frontend.blog_detail', $blog->slug) }}" class="btn btn-primary btn-sm shadow">Read More</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No blogs available at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- PRODUCTS SECTION --}}
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h2 class="fw-bold">Featured Products</h2>
        </div>
        <div class="row g-4">
            @forelse($featuredProducts as $product)
            <div class="col-md-3 animate__animated animate__fadeInUp">
                <div class="card h-100 shadow-sm border-0 hover-shadow">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}" loading="lazy">
                    @endif
                    <div class="card-body text-center">
                        <h6 class="fw-bold">{{ $product->name }}</h6>
                        <p class="text-success fw-bold">${{ number_format($product->price,2) }}</p>
                        <a href="{{ route('frontend.product_detail', $product->id) }}" class="btn btn-warning btn-sm shadow">View Product</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No products available at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>



{{-- ================= SCROLL TO TOP ================= --}}
    

@endsection

{{-- ADDITIONAL CSS --}}
@push('styles')
<style>
.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    transition: 0.3s;
}
.card-img-top {
    object-fit: cover;
    height: 200px;
}
.service-number {
    font-size: 1.25rem;
}
</style>
@endpush
