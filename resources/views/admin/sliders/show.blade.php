@extends('adminlte::page')

@section('title', 'View Slider')

@section('content_header')
    <h1>Slider Details</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>{{ $slider->title }}</h3>
            @if($slider->image)
                <img src="{{ asset('storage/'.$slider->image) }}" width="300">
            @endif
            <p>Created at: {{ $slider->created_at->format('d M Y') }}</p>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@stop
