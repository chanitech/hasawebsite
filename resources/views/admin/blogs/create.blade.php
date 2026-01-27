@extends('adminlte::page')

@section('title', 'Add Blog')

@section('content_header')
    <h1>Add Blog</h1>
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary float-right">Back to Blogs</a>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') }}" required>
            </div>

            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <textarea name="excerpt" class="form-control" id="excerpt" rows="2">{{ old('excerpt') }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" id="content" rows="5">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="date" name="published_at" class="form-control" id="published_at" value="{{ old('published_at') }}">
            </div>

            <div class="form-group">
                <label for="is_featured">Featured</label>
                <select name="is_featured" id="is_featured" class="form-control">
                    <option value="0" {{ old('is_featured') == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('is_featured') == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>

            <button type="submit" class="btn btn-success">Save Blog</button>
        </form>
    </div>
</div>
@stop
