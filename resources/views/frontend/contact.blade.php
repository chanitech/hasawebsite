@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container py-8">

    <h1 class="text-4xl font-bold mb-6 text-center">Contact Us</h1>

    {{-- ================= SUCCESS MESSAGE ================= --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- ================= CONTACT FORM ================= --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('frontend.contact.submit') }}" method="POST" class="bg-white shadow p-6 rounded-lg">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                           class="form-control @error('name') is-invalid @enderror" placeholder="Your Name">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                           class="form-control @error('email') is-invalid @enderror" placeholder="you@example.com">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label fw-bold">Subject</label>
                    <input type="text" name="subject" id="subject" value="{{ old('subject') }}" 
                           class="form-control @error('subject') is-invalid @enderror" placeholder="Subject">
                    @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label fw-bold">Message</label>
                    <textarea name="message" id="message" rows="5" 
                              class="form-control @error('message') is-invalid @enderror" placeholder="Write your message here">{{ old('message') }}</textarea>
                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-success w-100">Send Message</button>
            </form>
        </div>
    </div>

</div>
@endsection
