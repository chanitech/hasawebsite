@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card bg-gradient-primary mb-4">
                <div class="card-body">
                    <h3 class="mb-1">Welcome back, {{ auth()->user()->name }} 👋</h3>
                    <p class="mb-0 opacity-75">Hasa Constructions Limited — here's what's happening on your site right now.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $stats['products'] }}</h3>
                    <p>Products</p>
                </div>
                <div class="icon"><i class="fas fa-box"></i></div>
                <a href="{{ route('admin.products.index') }}" class="small-box-footer">
                    Manage <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stats['services'] }}</h3>
                    <p>Services</p>
                </div>
                <div class="icon"><i class="fas fa-concierge-bell"></i></div>
                <a href="{{ route('admin.services.index') }}" class="small-box-footer">
                    Manage <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $stats['sliders'] }}</h3>
                    <p>Active Sliders</p>
                </div>
                <div class="icon"><i class="fas fa-images"></i></div>
                <a href="{{ route('admin.sliders.index') }}" class="small-box-footer">
                    Manage <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $stats['contacts'] }}</h3>
                    <p>Enquiries</p>
                </div>
                <div class="icon"><i class="fas fa-envelope"></i></div>
                <a href="{{ route('admin.contacts.index') }}" class="small-box-footer">
                    View <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background-color: #013660; color: #fff;">
                <div class="inner">
                    <h3>{{ $stats['categories'] }}</h3>
                    <p>Categories</p>
                </div>
                <div class="icon"><i class="fas fa-list"></i></div>
                <a href="{{ route('admin.categories.index') }}" class="small-box-footer text-white">
                    Manage <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background-color: #610013; color: #fff;">
                <div class="inner">
                    <h3>{{ $stats['gallery'] }}</h3>
                    <p>Gallery Photos</p>
                </div>
                <div class="icon"><i class="fas fa-photo-video"></i></div>
                <a href="{{ route('admin.gallery.index') }}" class="small-box-footer text-white">
                    Manage <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $stats['blogs'] }}</h3>
                    <p>Blog Posts</p>
                </div>
                <div class="icon"><i class="fas fa-blog"></i></div>
                <a href="{{ route('admin.blogs.index') }}" class="small-box-footer">
                    Manage <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box" style="background-color: #888888; color: #fff;">
                <div class="inner">
                    <h3>TIN</h3>
                    <p>180-943-188</p>
                </div>
                <div class="icon"><i class="fas fa-certificate"></i></div>
                <a href="{{ route('frontend.about') }}" target="_blank" class="small-box-footer text-white">
                    View Site <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Enquiries</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Received</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentContacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ Str::limit($contact->subject, 30) }}</td>
                                    <td>{{ $contact->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-3">No enquiries yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Blog Posts</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Published</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentBlogs as $blog)
                                <tr>
                                    <td>{{ Str::limit($blog->title, 35) }}</td>
                                    <td>{{ $blog->published_at ? $blog->published_at->format('d M Y') : 'Draft' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted py-3">No blog posts yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                </div>
                <div class="card-body d-flex flex-wrap gap-2">
                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add Slider</a>
                    <a href="{{ route('admin.services.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add Service</a>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add Product</a>
                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Write Blog Post</a>
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Upload Photo</a>
                </div>
            </div>
        </div>
    </div>

@stop
