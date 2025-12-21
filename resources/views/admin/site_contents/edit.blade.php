@extends('adminlte::page')

@section('title', 'Edit Site Content')

@section('content_header')
    <h1>Edit Content</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-body">
        <form action="{{ route('admin.site_contents.update', $site_content->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Section Name</label>
                <input type="text" class="form-control" value="{{ $site_content->section_name }}" disabled>
            </div>

            <div class="form-group">
                <label>Content</label>
                <textarea name="content" class="form-control" rows="6">{{ old('content',$site_content->content) }}</textarea>
            </div>

            <button class="btn btn-primary">Update Content</button>
        </form>
    </div>
</div>
@stop
