@extends('adminlte::page')

@section('title', 'Gallery')

@section('content_header')
    <h1>Gallery</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-success">Upload Image</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galleries as $gallery)
                <tr>
                    <td>{{ $gallery->id }}</td>
                    <td>{{ $gallery->title }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$gallery->image_path) }}" width="80" height="80">
                    </td>
                    <td>
                        <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $galleries->links() }}
    </div>
</div>
@stop
