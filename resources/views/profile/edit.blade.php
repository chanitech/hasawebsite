@extends('adminlte::page')

@section('title', 'My Profile')

@section('content_header')
    <h1>My Profile</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Profile Information</h3>
        </div>
        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Password</h3>
        </div>
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="card border-danger">
        <div class="card-header">
            <h3 class="card-title text-danger">Delete Account</h3>
        </div>
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@stop
