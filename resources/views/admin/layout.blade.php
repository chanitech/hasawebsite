@extends('adminlte::page')

@section('title', $title ?? 'Admin Panel')

@section('content_header')
    <h1>{{ $title ?? 'Admin Panel' }}</h1>
@stop

@section('content')
    @yield('admin_content')
@stop
