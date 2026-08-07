@extends('frontend.layouts.app')

@section('title', 'Contact Us - Hasa Constructions Limited')

@push('styles')
{{-- AOS CSS --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    .btn-primary {
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    .btn-primary::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255,255,255,0.2);
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.4s ease;
        z-index: -1;
    }
    .btn-primary:hover::after {
        transform: scaleX(1);
        transform-origin: left;
    }
    .contact-info i {
        width: 25px;
        color: #013660;
    }
    .social-link {
        display: inline-block;
        transition: transform 0.3s ease;
    }
    .social-link:hover {
        transform: translateY(-3px);
    }
</style>
@endpush

@section('content')

{{-- ================= PAGE HEADER ================= --}}
<section class="py-5 bg-dark text-white" data-aos="fade-down">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="fw-bold display-4">Contact Hasa Constructions Limited</h1>
                <p class="lead mb-0">
                    Get in touch with us for project inquiries, quotes, or consultations.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ================= CONTACT SECTION ================= --}}
<section class="py-5 bg-light">
    <div class="container">

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" data-aos="fade">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row g-5">

            {{-- CONTACT INFO --}}
            <div class="col-md-5" data-aos="fade-right">
                <h4 class="fw-bold mb-4">Get in Touch</h4>

                <div class="contact-info mb-4">
                    <div class="mb-3">
                        <i class="bi bi-building me-2 text-primary"></i>
                        <strong>Company:</strong><br>
                        <span class="ms-4">Hasa Constructions Limited (TIN 180-943-188)</span>
                    </div>

                    <div class="mb-3">
                        <i class="bi bi-geo-alt me-2 text-primary"></i>
                        <strong>Location:</strong><br>
                        <span class="ms-4">Loliondo Street, near Loliondo Market, Kibaha, Pwani, Tanzania (P.O. Box 1212)</span>
                    </div>

                    <div class="mb-3">
                        <i class="bi bi-envelope me-2 text-primary"></i>
                        <strong>Email:</strong><br>
                        <a href="mailto:habeysh@gmail.com" class="text-decoration-none ms-4">
                            habeysh@gmail.com
                        </a>
                    </div>

                    <div class="mb-3">
                        <i class="bi bi-telephone me-2 text-primary"></i>
                        <strong>Phone:</strong><br>
                        <a href="tel:+255714220024" class="text-decoration-none ms-4">
                            +255 714 220 024
                        </a>
                    </div>
                </div>

                <div class="mt-4">
                    <h5 class="fw-bold mb-3">Follow Us</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="social-link text-primary fs-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link text-primary fs-3"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-link text-primary fs-3"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-link text-primary fs-3"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

                <div class="mt-4 p-3 bg-white rounded shadow-sm">
                    <p class="text-muted mb-0">
                        Whether you have a building, infrastructure, or electrical project in mind, or want to request a quote, we'd love to hear from you.
                    </p>
                </div>
            </div>

            {{-- CONTACT FORM --}}
            <div class="col-md-7" data-aos="fade-left">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">Send Us a Message</h4>

                        <form action="{{ route('frontend.contact.submit') }}" method="POST">
                            @csrf

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Full Name</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" placeholder="Your name">
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email Address</label>
                                    <input type="email" name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" placeholder="you@example.com">
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Subject</label>
                                    <input type="text" name="subject"
                                           class="form-control @error('subject') is-invalid @enderror"
                                           value="{{ old('subject') }}" placeholder="Subject">
                                    @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Message</label>
                                    <textarea name="message" rows="5"
                                              class="form-control @error('message') is-invalid @enderror"
                                              placeholder="Tell us about your project or inquiry">{{ old('message') }}</textarea>
                                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        Send Message
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
{{-- AOS JS --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 100,
        easing: 'ease-in-out'
    });
</script>
@endpush