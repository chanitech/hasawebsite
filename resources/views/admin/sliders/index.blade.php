@extends('adminlte::page')

@section('title', 'Sliders')

@section('content_header')
    <h1>Sliders</h1>
    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary float-right">Add Slider</a>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Sliders</h3>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Button Text</th>
                        <th>Button Link</th>
                        <th>Position</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $slider)
                        <tr>
                            <td>{{ $loop->iteration + ($sliders->currentPage()-1) * $sliders->perPage() }}</td>
                            <td>
                                @if($slider->image)
                                    <img src="{{ asset('storage/'.$slider->image) }}" alt="Slider Image" width="100">
                                @endif
                            </td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->subtitle }}</td>
                            <td>{{ $slider->button_text }}</td>
                            <td>{{ $slider->button_link }}</td>
                            <td>{{ $slider->position ?? '-' }}</td>
                            <td>
                                @if($slider->is_active)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-sm btn-info">Edit</a>

                                <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No sliders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            {{ $sliders->links() }}
        </div>
    </div>
@stop
