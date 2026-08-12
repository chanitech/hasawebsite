@extends('adminlte::page')

@section('title', 'Edit Slider')

@section('content_header')
    <h1>Edit Slider</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Current Image</label><br>
                    @if($slider->image)
                        <img src="{{ asset('storage/'.$slider->image) }}" width="150">
                    @endif
                </div>

                <div class="form-group">
                    <label for="image">Change Image</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary">Update Slider</button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@stop
