@extends('adminlte::page')

@section('title', 'Edit Slider')

@section('content_header')
    <h1>Edit Slider</h1>
    <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary float-right">Back to Sliders</a>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title *</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $slider->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle', $slider->subtitle) }}">
                </div>

                <div class="mb-3">
                    <label for="button_text" class="form-label">Button Text</label>
                    <input type="text" name="button_text" id="button_text" class="form-control" value="{{ old('button_text', $slider->button_text) }}">
                </div>

                <div class="mb-3">
                    <label for="button_link" class="form-label">Button Link</label>
                    <input type="url" name="button_link" id="button_link" class="form-control" value="{{ old('button_link', $slider->button_link) }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Current Image</label><br>
                    @if($slider->image)
                        <img src="{{ asset('storage/'.$slider->image) }}" width="150" class="mb-2 d-block">
                    @endif
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input type="number" name="position" id="position" class="form-control" value="{{ old('position', $slider->position) }}">
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', $slider->is_active) ? 'checked' : '' }}>
                    <label for="is_active" class="form-check-label">Active</label>
                </div>

                <button type="submit" class="btn btn-primary">Update Slider</button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@stop
