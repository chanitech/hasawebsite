@extends('frontend.layouts.app')
@section('title','Products')

@section('content')
<div class="container py-8">

    <h1 class="text-4xl font-bold mb-6 text-center">Our Products</h1>

    {{-- ================= CATEGORY FILTER ================= --}}
    <div class="mb-8 flex justify-center flex-wrap gap-3">
        <a href="{{ route('frontend.products') }}" 
           class="px-4 py-2 {{ request('category') ? 'bg-green-100 text-green-700' : 'bg-green-600 text-white' }} rounded hover:bg-green-700 hover:text-white transition">
            All
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('frontend.products',['category'=>$cat->id]) }}" 
               class="px-4 py-2 {{ request('category') == $cat->id ? 'bg-green-600 text-white' : 'bg-green-100 text-green-700' }} rounded hover:bg-green-700 hover:text-white transition">
               {{ $cat->name }}
            </a>
        @endforeach
    </div>

    {{-- ================= PRODUCTS GRID ================= --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
        <div class="bg-white shadow hover:shadow-lg rounded-lg overflow-hidden transition duration-300">
            {{-- Product Image --}}
            <div class="h-48 w-full overflow-hidden">
                @if($product->images->first())
                    <img src="{{ asset('storage/'.$product->images->first()->image_path) }}" 
                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-105" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/no-image.png') }}" 
                         class="w-full h-full object-cover opacity-50" alt="No Image">
                @endif
            </div>

            {{-- Product Details --}}
            <div class="p-4">
                <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                @if($product->category)
                    <span class="inline-block text-sm text-gray-500 mb-2">{{ $product->category->name }}</span>
                @endif
                <p class="text-green-700 font-bold mb-2">${{ number_format($product->price,2) }}</p>
                <a href="{{ route('frontend.product_detail',$product->id) }}" 
                   class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                   View Details
                </a>
            </div>
        </div>
        @empty
        <p class="col-span-full text-center text-gray-500">No products found.</p>
        @endforelse
    </div>

    {{-- ================= PAGINATION ================= --}}
    <div class="mt-8 flex justify-center">
        {{ $products->withQueryString()->links() }}
    </div>
</div>
@endsection
