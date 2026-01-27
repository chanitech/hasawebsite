@extends('frontend.layouts.app')
@section('title', 'Our Services')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Our Services</h2>
        <img src="{{ asset('assets/images/introduction/IntroductionOne/content-deco.png') }}" alt="decoration" class="mt-2">
    </div>
    <ul class="list-group list-group-flush">
        @foreach($services as $index => $service)
        <li class="list-group-item d-flex justify-content-between align-items-start py-3 shadow-sm mb-3 rounded">
            <div>
                <span class="fw-bold">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}. </span>
                <a href="{{ route('frontend.services.show', $service->slug) }}" class="text-decoration-none">{{ $service->title }}</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
