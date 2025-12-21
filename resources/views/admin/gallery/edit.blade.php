@extends('adminlte::page')

@section('title', 'Upload Gallery Image')

@section('content_header')
    <h1>Upload Image</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-body">
        <form action="{{ isset($gallery) ? route('admin.gallery.update', $gallery->id) : route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($gallery)) @method('PUT') @endif

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title ?? '') }}">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                @if(isset($gallery))
                    <img src="{{ asset('storage/'.$gallery->image_path) }}" width="100" class="mt-2">
                @endif
            </div>

            <button class="btn btn-primary">{{ isset($gallery) ? 'Update' : 'Upload' }}</button>
        </form>
    </div>
</div>
@stop
