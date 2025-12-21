@extends('adminlte::page')

@section('title', 'Add Service')

@section('content_header')
    <h1>Add New Service</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- TITLE --}}
            <div class="mb-3">
                <label class="form-label">Service Title</label>
                <input type="text"
                       name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}"
                       required>

                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- SLUG --}}
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text"
                       name="slug"
                       class="form-control @error('slug') is-invalid @enderror"
                       value="{{ old('slug') }}"
                       placeholder="auto-generated if empty">

                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- DESCRIPTION --}}
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description"
                          rows="4"
                          class="form-control @error('description') is-invalid @enderror"
                          required>{{ old('description') }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- IMAGE --}}
            <div class="mb-3">
                <label class="form-label">Service Image</label>
                <input type="file"
                       name="image"
                       class="form-control @error('image') is-invalid @enderror">

                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- POSITION --}}
            <div class="mb-3">
                <label class="form-label">Position (order)</label>
                <input type="number"
                       name="position"
                       class="form-control"
                       value="{{ old('position', 0) }}">
            </div>

            {{-- STATUS --}}
            <div class="mb-3 form-check">
                <input type="checkbox"
                       name="is_active"
                       class="form-check-input"
                       id="is_active"
                       checked>
                <label class="form-check-label" for="is_active">
                    Active
                </label>
            </div>

            {{-- ACTIONS --}}
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                    Back
                </a>
                <button type="submit" class="btn btn-success">
                    Save Service
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
