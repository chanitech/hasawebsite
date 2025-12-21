@extends('frontend.layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="container py-8">

    <h1 class="text-4xl font-bold mb-6 text-center">Gallery</h1>

    {{-- ================= GALLERY GRID ================= --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse($gallery as $item)
        <div class="relative overflow-hidden rounded-lg shadow hover:shadow-lg transition duration-300 group">
            @if($item->image_path)
                <img src="{{ asset('storage/'.$item->image_path) }}" 
                     class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105" 
                     alt="{{ $item->title }}">
            @else
                <img src="{{ asset('images/no-image.png') }}" 
                     class="w-full h-64 object-cover opacity-50" alt="No Image">
            @endif
            @if($item->title)
            <div class="absolute bottom-0 left-0 w-full bg-black bg-opacity-50 text-white text-center py-1 opacity-0 group-hover:opacity-100 transition">
                {{ $item->title }}
            </div>
            @endif
        </div>
        @empty
        <p class="col-span-full text-center text-gray-500">No gallery images found.</p>
        @endforelse
    </div>

    {{-- ================= PAGINATION ================= --}}
    <div class="mt-8 flex justify-center">
        {{ $gallery->withQueryString()->links() }}
    </div>

</div>
@endsection
