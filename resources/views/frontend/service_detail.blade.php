@extends('frontend.layouts.app')
@section('title', $service->title)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="fw-bold mb-3">{{ $service->title }}</h1>

            @if($service->image)
            <img src="{{ asset('storage/services/' . $service->image) }}" 
                 alt="{{ $service->title }}" 
                 class="img-fluid rounded mb-3 float-start me-3"
                 style="max-width: 200px; height: auto;">
            @endif

            @if($service->description)
            <p class="text-muted" style="text-align: justify; word-break: break-word;">
                {{ $service->description }}
            </p>
            @endif

            <a href="{{ route('frontend.services') }}" class="btn btn-success mt-3">Back to Services</a>
        </div>
    </div>
</div>
@endsection
