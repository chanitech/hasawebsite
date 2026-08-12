@extends('adminlte::auth.auth-page', ['authType' => 'login'])

@section('auth_header', __('Reset Password'))

@section('auth_body')
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $request->email) }}" placeholder="Email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="New Password" autocomplete="new-password">
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                placeholder="Confirm Password" autocomplete="new-password">
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <button type="submit" class="btn btn-block btn-flat btn-primary">
            <span class="fas fa-sync-alt"></span> Reset Password
        </button>
    </form>
@stop
