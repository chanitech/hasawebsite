@extends('frontend.layouts.app')
@section('title', $service->title)

@section('content')

<section class="py-5">
    <div class="container">
        <div class="mb-4">
            <h1 class="fw-bold">{{ $service->title }}</h1>
        </div>

        @if($service->icon)
            <div class="mb-3">
                <i class="{{ $service->icon }} fa-2x text-success"></i>
            </div>
        @endif

        <div class="mb-4">
            <p>{{ $service->description }}</p>
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
</section>

@endsection
