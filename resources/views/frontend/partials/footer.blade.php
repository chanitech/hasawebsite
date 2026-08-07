{{-- ======================================================
FOOTER
====================================================== --}}
<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-right">
                <h5 class="fw-bold mb-3">Hasa Constructions Limited</h5>
                <p class="small text-light">A Tanzanian construction and engineering company delivering building, infrastructure, and electrical installation projects. TIN 180-943-188.</p>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <h5 class="fw-bold mb-3">Contact</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2">📧 habeysh@gmail.com</li>
                    <li class="mb-2">📍 Loliondo Street, near Loliondo Market, Kibaha, Pwani, Tanzania</li>
                    <li class="mb-2">📞 +255 714 220 024</li>
                </ul>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-twitter fs-5"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-instagram fs-5"></i></a>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-left">
                <h5 class="fw-bold mb-3">Quick Links</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('frontend.about') }}" class="text-light text-decoration-none">About Us</a></li>
                    <li class="mb-2"><a href="{{ route('frontend.services') }}" class="text-light text-decoration-none">Services</a></li>
                    <li class="mb-2"><a href="{{ route('frontend.gallery') }}" class="text-light text-decoration-none">Projects</a></li>
                    <li class="mb-2"><a href="{{ route('frontend.contact') }}" class="text-light text-decoration-none">Contact</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <hr class="border-secondary">
        <div class="text-center small">
            &copy; {{ date('Y') }} Hasa Constructions Limited. All rights reserved.
        </div>
    </div>
</footer>
