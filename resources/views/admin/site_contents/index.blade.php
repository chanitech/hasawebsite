@extends('adminlte::page')

@section('title', 'Site Content')

@section('content_header')
    <h1>Site Content</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Section Name</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $content)
                <tr>
                    <td>{{ $content->id }}</td>
                    <td>{{ $content->section_name }}</td>
                    <td>{{ Str::limit($content->content, 50) }}</td>
                    <td>
                        <a href="{{ route('admin.site_contents.edit', $content->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $contents->links() }}
    </div>
</div>
@stop
