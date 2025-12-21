@extends('adminlte::page')

@section('title', 'Edit Blog')

@section('content_header')
    <h1>Edit Blog</h1>
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary float-right">Back to Blogs</a>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $blog->title) }}" required>
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug', $blog->slug) }}" required>
            </div>

            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <textarea name="excerpt" class="form-control" id="excerpt" rows="2">{{ old('excerpt', $blog->excerpt) }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" id="content" rows="5">{{ old('content', $blog->content) }}</textarea>
            </div>

            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="date" name="published_at" class="form-control" id="published_at" value="{{ old('published_at', optional($blog->published_at)->format('Y-m-d')) }}">
            </div>

            <div class="form-group">
                <label for="is_featured">Featured</label>
                <select name="is_featured" id="is_featured" class="form-control">
                    <option value="0" {{ old('is_featured', $blog->is_featured) == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('is_featured', $blog->is_featured) == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                @if($blog->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image" width="150">
                    </div>
                @endif
                <input type="file" name="image" class="form-control-file" id="image">
            </div>

            <button type="submit" class="btn btn-primary">Update Blog</button>
        </form>
    </div>
</div>
@stop
