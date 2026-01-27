@extends('frontend.layouts.app')

@section('title', $blog->title)

@section('content')
<section class="py-5">
    <div class="container">

        <div class="mb-4 text-center">
            <h1 class="fw-bold">{{ $blog->title }}</h1>
            @if($blog->published_at)
                <p class="text-muted">
                    {{ $blog->published_at->format('F d, Y') }}
                </p>
            @endif
        </div>

        @if($blog->image)
            <div class="mb-4 text-center">
                <img src="{{ asset('storage/'.$blog->image) }}"
                     class="img-fluid rounded shadow"
                     style="max-height:450px;object-fit:cover"
                     alt="{{ $blog->title }}">
            </div>
        @endif

        <div class="blog-content">
            {!! nl2br(e($blog->content)) !!}
        </div>

    </div>
</section>
@endsection
