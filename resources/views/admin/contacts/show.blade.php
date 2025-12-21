@extends('adminlte::page')

@section('title', 'View Contact')

@section('content_header')
    <h1>Contact Details</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-body">
        <p><strong>Name:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Subject:</strong> {{ $contact->subject }}</p>
        <p><strong>Message:</strong> {{ $contact->message }}</p>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@stop
