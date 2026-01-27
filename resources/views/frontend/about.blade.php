@extends('frontend.layouts.app')

@section('title', 'About Us')

@section('content')
<h1>About Us</h1>
<p>{{ $siteContent['about'] ?? 'About MEMAFarms...' }}</p>
@stop
