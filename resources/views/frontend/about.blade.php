@extends('frontend.layouts.app')

@section('title', 'About Us - Hasa Constructions Limited')

@push('styles')
{{-- AOS CSS --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    /* Additional styles for about page */
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px -10px rgba(1,54,96,0.2);
    }
    .principle-card {
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    .principle-card:hover {
        border-color: #013660;
        transform: scale(1.02);
    }
    .objective-item {
        transition: all 0.3s ease;
        background: white;
        border-left: 3px solid transparent;
    }
    .objective-item:hover {
        border-left-color: #013660;
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
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
    .btn-outline-light:hover {
        background-color: rgba(255,255,255,0.1);
        border-color: #fff;
    }
</style>
@endpush

@section('content')

{{-- ================= PAGE HEADER ================= --}}
<section class="py-5 bg-dark text-white" data-aos="fade-down">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="fw-bold display-4">About Hasa Constructions Limited</h1>
                <p class="lead mb-0">
                    A Tanzanian construction and engineering company based in Kibaha, Pwani — registered with TRA (TIN 180-943-188) and BRELA.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ================= WHO WE ARE ================= --}}
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-md-6" data-aos="fade-right">
                <img src="{{ asset('images/hasalogo.jpg') }}"
                     class="img-fluid rounded shadow-lg"
                     alt="Hasa Constructions Limited Logo"
                     style="transition: transform 0.4s;"
                     onmouseover="this.style.transform='scale(1.02)'"
                     onmouseout="this.style.transform='scale(1)'">
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <h6 class="text-primary fw-bold mb-2">WHO WE ARE</h6>
                <h2 class="fw-bold mb-3">Hasa Constructions Limited</h2>
                <p class="text-muted mb-4 lead">
                    Hasa Constructions Limited is a private company limited by shares, incorporated in Tanzania and registered with the Business Registrations and Licensing Agency (BRELA) and the Tanzania Revenue Authority. We are based on Loliondo Street, near Loliondo Market, Kibaha, in the Pwani Region.
                </p>
                <p class="text-muted">
                    Our licensed activities span the construction of buildings, roads, and civil engineering works, demolition and building completion, electrical installation and maintenance, wholesale of construction materials, and architectural and engineering consultancy.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ================= MISSION & VISION ================= --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6" data-aos="flip-left" data-aos-delay="100">
                <div class="card h-100 shadow-sm border-0 hover-lift">
                    <div class="card-body p-4">
                        <h4 class="fw-bold text-primary mb-3">Our Vision</h4>
                        <p class="text-muted mb-0">
                            "To be a trusted name in Tanzania's construction and engineering sector, known for quality, safety, and reliable delivery on every project."
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="flip-right" data-aos-delay="200">
                <div class="card h-100 shadow-sm border-0 hover-lift">
                    <div class="card-body p-4">
                        <h4 class="fw-bold text-primary mb-3">Our Mission</h4>
                        <p class="text-muted mb-0">
                            "To deliver exceptional civil, mechanical, and electrical construction results by combining engineering expertise with strong safety, sustainability, and client partnership standards."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= OBJECTIVES ================= --}}
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="fw-bold">Our Objectives</h2>
            <p class="text-muted">From our Memorandum of Association</p>
        </div>
        <div class="row g-4">
            @foreach([
                ['Construction & Engineering Excellence', 'To design, plan, and execute civil, mechanical, and electrical projects, delivering exceptional results tailored to client specifications.'],
                ['Quality & Safety Standards', 'To provide high-quality construction services that adhere to industry standards, with strong emphasis on safety, sustainability, and innovation.'],
                ['Infrastructure Development', 'To undertake and manage the construction of roads, bridges, airports, and railways, delivered efficiently within timeline and budget.'],
                ['Strategic Partnerships', 'To build strategic partnerships with clients, suppliers, and subcontractors founded on trust, open communication, and shared goals.'],
                ['Skilled Workforce', 'To employ and continuously develop engineers, architects, project managers, and technicians dedicated to excellence.'],
                ['Technology & Sustainability', 'To embrace innovative construction methodologies such as Building Information Modeling (BIM) and sustainable, eco-friendly practices.'],
                ['Ethical & Legal Compliance', 'To uphold the highest ethical standards, transparency, and full legal compliance in all business operations.']
            ] as $index => $objective)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                <div class="d-flex align-items-start p-3 bg-white rounded shadow-sm h-100 objective-item">
                    <div class="me-3 text-primary fs-4">•</div>
                    <div><strong>{{ $objective[0] }}:</strong> {{ $objective[1] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= CORE PRINCIPLES ================= --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="fw-bold">Our Core Principles</h2>
            <p class="text-muted">The values that guide our work</p>
        </div>
        <div class="row g-4">
            @foreach([
                ['Safety First', 'Stringent safety measures, training, and monitoring across every construction site.'],
                ['Quality & Reliability', 'Durable, standards-compliant work delivered on time and within budget.'],
                ['Sustainability', 'Eco-friendly, resource-efficient construction practices.'],
                ['Integrity', 'Transparency and accountability in every client and business relationship.']
            ] as $principle)
            <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="p-4 bg-white rounded shadow-sm text-center h-100 principle-card">
                    <h5 class="text-primary fw-bold">{{ $principle[0] }}</h5>
                    <p class="small mb-0">{{ $principle[1] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= WHY JOIN US ================= --}}
<section class="py-5 bg-dark text-white">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-md-6" data-aos="fade-right">
                <h2 class="fw-bold mb-4 display-5">Why Choose Hasa Constructions?</h2>
                <ul class="list-unstyled">
                    <li class="mb-3 fs-5">✔ <strong>Registered & Licensed</strong> – TIN 180-943-188, TRA & BRELA registered</li>
                    <li class="mb-3 fs-5">✔ <strong>Experienced Directors</strong> – Hands-on engineering and management expertise</li>
                    <li class="mb-3 fs-5">✔ <strong>Modern Methods</strong> – BIM and sustainable construction practices</li>
                    <li class="mb-3 fs-5">✔ <strong>Safety Focused</strong> – Rigorous safety protocols on every site</li>
                    <li class="mb-3 fs-5">✔ <strong>Client-Centered</strong> – Transparent, reliable project delivery</li>
                </ul>
            </div>
            <div class="col-md-6 text-center" data-aos="fade-left">
                <p class="lead mb-4">Partner with a construction company committed to quality and safety.</p>
                <a href="{{ route('frontend.contact') }}" class="btn btn-primary btn-lg px-5">
                    Get a Quote
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ================= CALL TO ACTION (optional) ================= --}}
<section class="py-5 text-center" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container" data-aos="zoom-in">
        <h2 class="fw-bold mb-3">Ready to start your project?</h2>
        <p class="lead mb-4">Get in touch with Hasa Constructions Limited for a consultation.</p>
        <a href="{{ route('frontend.services') }}" class="btn btn-primary btn-lg me-2">Our Services</a>
        <a href="{{ route('frontend.contact') }}" class="btn btn-outline-primary btn-lg">Contact Us</a>
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