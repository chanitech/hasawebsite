@extends('adminlte::auth.auth-page', ['authType' => 'login'])

@section('auth_header', __('Please verify your email address to continue.'))

@section('auth_body')
    <p class="text-sm">
        Thanks for signing up! Before getting started, could you verify your email address by clicking the
        link we emailed you? If you didn't receive it, we can send another one.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            A new verification link has been sent to the email address you provided.
        </div>
    @endif

    <div class="d-flex align-items-center justify-content-between mt-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-flat btn-primary">Resend Verification Email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link">Log Out</button>
        </form>
    </div>
@stop
