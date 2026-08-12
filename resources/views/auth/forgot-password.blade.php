@extends('adminlte::auth.auth-page', ['authType' => 'login'])

@section('auth_header', __('Forgot your password? Enter your email and we\'ll send you a reset link.'))

@section('auth_body')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" placeholder="Email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <button type="submit" class="btn btn-block btn-flat btn-primary">
            <span class="fas fa-share-square"></span> Email Password Reset Link
        </button>
    </form>
@stop
