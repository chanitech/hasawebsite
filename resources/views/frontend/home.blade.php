@extends('frontend.layouts.app')
@section('title', 'Hasa Constructions Limited')

@push('styles')
{{-- AOS CSS --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
/* GLOBAL SPACING */
.section-spacing {
    padding: 80px 0;
}

/* HERO */
.hero-section {
    height: 90vh;
    position: relative;
    overflow: hidden;
}
.hero-bg {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 6s ease;
}
.carousel-item.active .hero-bg {
    transform: scale(1.05);
}
.hero-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,.65);
    z-index: 1;
    pointer-events: none;
}
.hero-content {
    position: absolute;
    inset: 0;
    z-index: 2;
    display: flex;
    align-items: center;
}
.btn {
    transition: all 0.3s ease;
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

/* PROGRAM CARDS (existing dark section) */
.service-card {
    background: #1f1f1f;
    padding: 30px;
    border-left: 4px solid #013660;
    transition: all .4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.service-card:hover {
    transform: translateY(-10px) scale(1.02);
    background: #2a2a2a;
    box-shadow: 0 20px 30px -10px rgba(0,0,0,0.5);
}
.service-link {
    color: #013660;
    font-weight: 600;
    text-decoration: none;
    position: relative;
    display: inline-block;
}
.service-link::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: #013660;
    transition: width 0.3s;
}
.service-link:hover::after {
    width: 100%;
}

/* FEATURES (why join boxes) */
.feature-box {
    padding: 30px;
    border-radius: 8px;
    background: #fff;
    transition: all .4s ease;
    border: 1px solid transparent;
}
.feature-box:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 30px -10px rgba(0,0,0,0.15);
    border-color: #013660;
}

/* LEADERSHIP CARDS */
.leader-card {
    background: #fff;
    padding: 25px 15px;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: all .4s ease;
    position: relative;
    overflow: hidden;
}
.leader-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 5px;
    background: linear-gradient(90deg, #013660, #610013);
    transition: left 0.4s ease;
}
.leader-card:hover::before {
    left: 0;
}
.leader-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px -10px rgba(1,54,96,0.3);
}
.leader-img-wrapper {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid #013660;
    transition: transform 0.4s ease;
}
.leader-card:hover .leader-img-wrapper {
    transform: scale(1.05);
}
.leader-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* ACTIVITY CARDS */
.activity-card {
    background: #fff;
    padding: 30px 20px;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,.05);
    text-align: center;
    transition: all .4s ease;
    border: 1px solid transparent;
}
.activity-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 30px -10px rgba(1,54,96,0.2);
    border-color: #013660;
}
.activity-icon {
    width: 70px;
    height: 70px;
    line-height: 70px;
    font-size: 32px;
    border-radius: 50%;
    margin: 0 auto 20px;
    transition: all 0.4s ease;
}
.activity-card:hover .activity-icon {
    transform: rotate(360deg);
    background: #013660 !important;
}

/* EVENT CARDS */
.event-card {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 8px;
    border-left: 4px solid #013660;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}
.event-card::after {
    content: '';
    position: absolute;
    top: 0;
    right: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(1,54,96,0.1), transparent);
    transition: right 0.6s ease;
}
.event-card:hover::after {
    right: 100%;
}
.event-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 25px -10px rgba(0,0,0,0.15);
}
.event-date {
    display: inline-block;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    transition: background 0.3s;
}
.event-card:hover .event-date {
    background: #013660 !important;
}

/* CTA SECTION */
.cta-section {
    padding: 90px 0;
    background: linear-gradient(45deg, #111, #222, #111);
    background-size: 200% 200%;
    animation: gradientShift 8s ease infinite;
    position: relative;
    overflow: hidden;
}
@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
.cta-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    animation: rotate 20s linear infinite;
    z-index: 1;
}
@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
.cta-section .container {
    position: relative;
    z-index: 2;
}

/* FOOTER */
footer a {
    transition: all 0.3s ease;
    display: inline-block;
}
footer a:hover {
    color: #013660 !important;
    transform: translateX(5px);
}
footer .bi {
    transition: transform 0.3s ease;
}
footer .bi:hover {
    transform: scale(1.2) rotate(5deg);
}

/* STATISTICS NUMBERS */
.text-primary {
    transition: all 0.3s;
}
.stat-item:hover .text-primary {
    transform: scale(1.1);
    text-shadow: 0 0 15px rgba(1,54,96,0.5);
}
</style>
@endpush

@section('content')

{{-- ======================================================
HERO SLIDER (dynamic) – Enhanced with unique animations
====================================================== --}}
@if($slides->count())
<div id="heroSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
        @foreach($slides as $index => $hero)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <section class="hero-section position-relative">
                <img src="{{ asset('storage/'.$hero->image) }}"
                     class="hero-bg"
                     alt="{{ $hero->title }}">

                {{-- Gradient overlay (more vibrant than solid) --}}
                <div class="hero-gradient"></div>

                <div class="container hero-content">
                    <div class="row">
                        <div class="col-md-8 text-white">
                            {{-- Animated title with staggered letters --}}
                            <h1 class="hero-title fw-bold display-4 mb-3">
                                {{ $hero->title }}
                            </h1>

                            @if($hero->subtitle)
                                <p class="hero-subtitle lead mb-4">
                                    {{ $hero->subtitle }}
                                </p>
                            @endif

                            <div class="d-flex flex-wrap gap-3 hero-buttons">
                                @if($hero->button_text && $hero->button_link)
                                    <a href="{{ $hero->button_link }}"
                                       class="btn btn-primary btn-lg shadow pulse">
                                        {{ $hero->button_text }}
                                    </a>
                                @endif
                                <a href="{{ route('frontend.about') }}"
                                   class="btn btn-outline-light btn-lg">
                                    About Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Scroll-down indicator --}}
                <div class="scroll-indicator">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </section>
        </div>
        @endforeach
    </div>

    {{-- Stylish carousel controls --}}
    <button class="carousel-control-prev custom-control" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next custom-control" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

@push('styles')
<style>
    /* Gradient overlay – vibrant blend */
    .hero-gradient {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0,0,0,0.8) 0%, rgba(1,54,96,0.3) 50%, rgba(0,0,0,0.8) 100%);
        z-index: 1;
        pointer-events: none;
    }

    /* Animated title – each word fades up */
    .hero-title {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeUp 1s ease forwards;
    }

    .hero-subtitle {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeUp 1s 0.3s ease forwards;
    }

    .hero-buttons {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeUp 1s 0.6s ease forwards;
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Scroll indicator – bouncing three dots */
    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        display: flex;
        gap: 8px;
        opacity: 0;
        animation: fadeIn 1s 1.5s forwards;
    }

    .scroll-indicator span {
        display: block;
        width: 10px;
        height: 10px;
        background: white;
        border-radius: 50%;
        opacity: 0.6;
        animation: bounce 2s infinite;
    }

    .scroll-indicator span:nth-child(2) {
        animation-delay: 0.2s;
    }
    .scroll-indicator span:nth-child(3) {
        animation-delay: 0.4s;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); opacity: 0.6; }
        50% { transform: translateY(-10px); opacity: 1; }
    }

    @keyframes fadeIn {
        to { opacity: 1; }
    }

    /* Custom carousel controls – circular with background */
    .custom-control {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(1,54,96,0.3);
        backdrop-filter: blur(5px);
        border: 2px solid rgba(255,255,255,0.5);
        transition: all 0.3s;
        top: 50%;
        transform: translateY(-50%);
    }
    .custom-control:hover {
        background: rgba(1,54,96,0.8);
        border-color: white;
        transform: translateY(-50%) scale(1.1);
    }
    .carousel-control-prev.custom-control {
        left: 20px;
    }
    .carousel-control-next.custom-control {
        right: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        .custom-control {
            width: 40px;
            height: 40px;
        }
    }
</style>
@endpush

@push('scripts')
{{-- Ensure AOS doesn't conflict with our animations – we disable AOS on hero or let it run --}}
<script>
    // If you still want AOS globally, you can keep it. The hero animations will override.
</script>
@endpush
@endif


{{-- ======================================================
STATISTICS
====================================================== --}}
<section class="section-spacing bg-light">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-3 stat-item" data-aos="fade-up" data-aos-delay="0">
                <h2 class="fw-bold text-primary mb-1 display-5">2025</h2>
                <p class="mb-0">Registered with TRA</p>
            </div>
            <div class="col-md-3 stat-item" data-aos="fade-up" data-aos-delay="100">
                <h2 class="fw-bold text-primary mb-1 display-5">12+</h2>
                <p class="mb-0">Service Categories</p>
            </div>
            <div class="col-md-3 stat-item" data-aos="fade-up" data-aos-delay="200">
                <h2 class="fw-bold text-primary mb-1 display-5">4</h2>
                <p class="mb-0">Company Directors</p>
            </div>
            <div class="col-md-3 stat-item" data-aos="fade-up" data-aos-delay="300">
                <h2 class="fw-bold text-primary mb-1 display-5">100%</h2>
                <p class="mb-0">TRA & BRELA Registered</p>
            </div>
        </div>
    </div>
</section>


{{-- ======================================================
ABOUT
====================================================== --}}
<section class="section-spacing">
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
                    Hasa Constructions Limited is a Tanzanian construction and engineering company based in Kibaha, Pwani. We deliver civil, mechanical, and electrical projects — from building construction to road, utility, and infrastructure works — for clients across the region.
                </p>
                <a href="{{ route('frontend.about') }}" class="btn btn-primary btn-lg">
                    Learn More
                </a>
            </div>
        </div>
    </div>
</section>


{{-- ======================================================
OUR ROOTS
====================================================== --}}
<section class="section-spacing bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="fw-bold">Our Foundation</h2>
            <p class="text-muted">Registered with the Business Registrations and Licensing Agency (BRELA)</p>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-6" data-aos="flip-left" data-aos-delay="100">
                <div class="p-4 bg-white rounded shadow-sm h-100 hover-lift">
                    <h4 class="text-primary fw-bold mb-3">Vision</h4>
                    <p class="mb-0">To be a trusted name in Tanzania's construction and engineering sector, known for quality, safety, and reliable delivery on every project.</p>
                </div>
            </div>
            <div class="col-md-6" data-aos="flip-right" data-aos-delay="200">
                <div class="p-4 bg-white rounded shadow-sm h-100 hover-lift">
                    <h4 class="text-primary fw-bold mb-3">Mission</h4>
                    <p class="mb-0">To deliver exceptional civil, mechanical, and electrical construction results by combining engineering expertise with strong safety, sustainability, and client partnership standards.</p>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <h3 class="fw-bold text-center mb-4" data-aos="fade-up">Our Objectives</h3>
            <div class="row g-4">
                @foreach([
                    ['Construction & Engineering', 'To design, plan, and execute civil, mechanical, and electrical projects tailored to client specifications.'],
                    ['Quality & Safety', 'To provide high-quality construction services that adhere to industry standards, safety, and sustainability.'],
                    ['Infrastructure Development', 'To undertake and manage the construction of roads, bridges, and civil engineering projects efficiently.'],
                    ['Strategic Partnerships', 'To build trust-based relationships with clients, suppliers, and subcontractors for long-term success.'],
                    ['Skilled Workforce', 'To employ and continuously develop engineers, architects, project managers, and technicians.'],
                    ['Technology & Sustainability', 'To embrace innovative methods such as Building Information Modeling (BIM) and eco-friendly practices.'],
                    ['Ethical Compliance', 'To uphold the highest ethical standards and full legal compliance in all business operations.']
                ] as $index => $objective)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                    <div class="d-flex align-items-start p-3 bg-white rounded shadow-sm h-100">
                        <div class="me-3 text-primary fs-4">•</div>
                        <div><strong>{{ $objective[0] }}:</strong> {{ $objective[1] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div>
            <h3 class="fw-bold text-center mb-4" data-aos="fade-up">Core Principles</h3>
            <div class="row g-4">
                @foreach([
                    ['Safety First', 'Stringent safety measures, training, and monitoring across every construction site.'],
                    ['Quality & Reliability', 'Durable, standards-compliant work delivered on time and within budget.'],
                    ['Sustainability', 'Eco-friendly, resource-efficient construction practices.'],
                    ['Integrity', 'Transparency and accountability in every client and business relationship.']
                ] as $principle)
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="p-3 bg-white rounded shadow-sm text-center h-100 principle-card">
                        <h5 class="text-primary fw-bold">{{ $principle[0] }}</h5>
                        <p class="small mb-0">{{ $principle[1] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


{{-- ======================================================
CORE ACTIVITIES
====================================================== --}}
<section class="section-spacing">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="fw-bold">Our Services</h2>
            <p class="text-muted">What we build and deliver for our clients</p>
        </div>
        <div class="row g-4">
            @foreach([
                ['🏗️', 'Building Construction', 'Design, planning, and execution of civil, mechanical, and electrical building projects.'],
                ['🛣️', 'Infrastructure Development', 'Construction of roads, utility projects, and civil engineering works.'],
                ['⚡', 'Electrical Installation', 'Installation, inspection, maintenance, and repair of electrical systems.'],
                ['🧱', 'Consultancy & Materials', 'Architectural and engineering consultancy plus wholesale supply of construction materials.']
            ] as $activity)
            <div class="col-md-6 col-lg-3" data-aos="flip-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="activity-card h-100">
                    <div class="activity-icon bg-primary text-white mb-3">{{ $activity[0] }}</div>
                    <h5 class="fw-bold mb-3">{{ $activity[1] }}</h5>
                    <p class="text-muted mb-0">{{ $activity[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ======================================================
OUR APPROACH
====================================================== --}}
<section class="section-spacing bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                <h2 class="fw-bold mb-4">Built on Engineering Expertise</h2>
                <p class="lead text-muted">
                    Our directors and technical team bring hands-on experience across civil, mechanical, and electrical disciplines, backed by modern methodologies like Building Information Modeling (BIM) and a strict commitment to safety.
                </p>
                <a href="{{ route('frontend.services') }}" class="btn btn-primary btn-lg mt-3">View Our Services</a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="{{ asset('images/hasalogo.jpg') }}" alt="Hasa Constructions Limited" class="img-fluid rounded shadow-lg" style="transition: transform 0.4s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
            </div>
        </div>
    </div>
</section>


{{-- ======================================================
WHY CHOOSE HASA CONSTRUCTIONS
====================================================== --}}
<section class="section-spacing">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="fw-bold">Why Choose Hasa Constructions</h2>
        </div>
        <div class="row g-4 text-center">
            @foreach([
                ['Registered & Licensed', 'TIN 180-943-188, TRA & BRELA registered'],
                ['Skilled Team', 'Experienced engineers and technicians'],
                ['Safety Focused', 'Strict safety protocols on every site'],
                ['Client-Centered', 'Transparent, reliable delivery']
            ] as $reason)
            <div class="col-md-3" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="feature-box h-100">
                    <h5 class="fw-bold">{{ $reason[0] }}</h5>
                    <p class="small text-muted mb-0">{{ $reason[1] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ======================================================
LEADERSHIP TEAM
====================================================== --}}
<section class="section-spacing bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="fw-bold">Our Leadership Team</h2>
            <p class="text-muted">Meet the directors guiding Hasa Constructions Limited</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach([
                ['Ahmed Salum Kibwana', 'Director & Company Secretary'],
                ['Hassan Salehe Awadh', 'Director'],
                ['Sinani Shabani Kamegi', 'Director'],
                ['Abudhari Issa Abdallah', 'Director']
            ] as $index => $leader)
            <div class="col-md-4 col-lg-3" data-aos="flip-left" data-aos-delay="{{ $index * 100 }}">
                <div class="leader-card text-center">
                    <div class="leader-img-wrapper mx-auto mb-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($leader[0]) }}&size=200&background=013660&color=fff"
                             alt="{{ $leader[0] }}"
                             class="rounded-circle img-fluid">
                    </div>
                    <h5 class="fw-bold mb-1">{{ $leader[0] }}</h5>
                    <p class="text-primary mb-0">{{ $leader[1] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ======================================================
CALL TO ACTION
====================================================== --}}
<section class="cta-section">
    <div class="container text-center text-white" data-aos="zoom-in">
        <h2 class="fw-bold mb-3 display-4">Let's Build Something Great Together</h2>
        <p class="mb-4 lead">
            Contact Hasa Constructions Limited for a consultation or project quote.
        </p>
        <a href="{{ route('frontend.contact') }}" class="btn btn-primary btn-lg">
            Get a Quote
        </a>
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