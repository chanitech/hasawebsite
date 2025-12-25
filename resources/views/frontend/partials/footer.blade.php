<footer class="footer-section bg-dark text-white pt-5">
    <div class="container">
        <div class="row gy-4">
            {{-- BRAND --}}
            <div class="col-lg-4 col-md-6">
                <h4 class="fw-bold mb-3">Mural Enterprises</h4>
                <p class="text-white-50">Empowering farmers through smart, sustainable agricultural and livestock investment solutions.</p>
                <div class="d-flex gap-3 mt-3">
                    <a href="https://www.facebook.com/share/1GN8DMvA4C/" class="footer-social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="footer-social"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="footer-social"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="footer-social"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            {{-- QUICK LINKS --}}
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-semibold mb-3">Quick Links</h6>
                <ul class="list-unstyled footer-links">
                    @foreach($quickLinks ?? [] as $link)
                        <li><a href="{{ $link['url'] }}">{{ $link['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- SERVICES --}}
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-semibold mb-3">Our Services</h6>
                <ul class="list-unstyled footer-links">
                    @foreach($services->take(5) as $service)
                        <li><a href="{{ route('frontend.services.show', $service->slug) }}">{{ $service->title }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- CONTACT --}}
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-semibold mb-3">Contact Us</h6>
                @if($contact)
                    <ul class="list-unstyled footer-contact">
                        <li><i class="fas fa-map-marker-alt me-2"></i>{{ $contact->address ?? 'Dar es Salaam, Tanzania' }}</li>
                        <li><i class="fas fa-phone me-2"></i>{{ $contact->phone ?? '+255 000 000 000' }}</li>
                        <li><i class="fas fa-envelope me-2"></i>{{ $contact->email ?? 'info@muralenterprises.co.tz' }}</li>
                    </ul>
                @endif
            </div>
        </div>

        <hr class="border-secondary my-4">

        <div class="row align-items-center pb-3">
            <div class="col-md-6 text-center text-md-start small text-white-50">© {{ date('Y') }} Mural Enterprises. All rights reserved.</div>
            <div class="col-md-6 text-center text-md-end small">
                <a href="#" class="text-white-50 me-3">Privacy Policy</a>
                <a href="#" class="text-white-50">Terms & Conditions</a>
            </div>
        </div>
    </div>
</footer>
