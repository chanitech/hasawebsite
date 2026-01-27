@extends('frontend.layouts.app')

@section('title', $product->name ?? 'Product Detail')

@section('content')
<div class="container py-8">

    {{-- ================= PRODUCT HEADER ================= --}}
    <div class="row mb-6">
        {{-- Product Images Carousel --}}
        <div class="col-md-6">
            @if($product->images->count())
            <div id="productImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($product->images as $k => $image)
                    <div class="carousel-item {{ $k === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/'.$image->image_path) }}" class="d-block w-100" style="height:400px; object-fit:cover;" alt="{{ $product->name }}">
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productImagesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productImagesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            @else
            <img src="{{ asset('images/no-image.png') }}" class="w-100 shadow-sm" style="height:400px;object-fit:cover;" alt="No Image Available">
            @endif
        </div>

        {{-- Product Info --}}
        <div class="col-md-6">
            <h1 class="fw-bold mb-3">{{ $product->name }}</h1>
            <p class="text-green-700 fw-bold h4 mb-3">${{ number_format($product->price, 2) }}</p>
            @if($product->category)
                <p class="mb-3"><strong>Category:</strong> {{ $product->category->name }}</p>
            @endif
            <p class="mb-4">{{ $product->description }}</p>
            <a href="#" class="btn btn-success btn-lg">Add to Cart</a>
        </div>
    </div>

    {{-- ================= RELATED PRODUCTS ================= --}}
    @if(isset($relatedProducts) && $relatedProducts->count())
    <div class="mt-8">
        <h3 class="fw-bold mb-4">Related Products</h3>
        <div class="row g-4">
            @foreach($relatedProducts as $rProduct)
            <div class="col-md-3">
                <div class="card h-100 shadow-sm text-center">
                    @if($rProduct->images->first())
                    <img src="{{ asset('storage/'.$rProduct->images->first()->image_path) }}" class="card-img-top" style="height:200px;object-fit:cover;" alt="{{ $rProduct->name }}">
                    @else
                    <img src="{{ asset('images/no-image.png') }}" class="card-img-top" style="height:200px;object-fit:cover;" alt="No Image">
                    @endif
                    <div class="card-body">
                        <h6>{{ $rProduct->name }}</h6>
                        <p class="text-green-700 fw-bold">${{ number_format($rProduct->price, 2) }}</p>
                        <a href="{{ route('frontend.product_detail', $rProduct->id) }}" class="btn btn-success btn-sm">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection
