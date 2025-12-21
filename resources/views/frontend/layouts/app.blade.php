<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MEMAFarms')</title>

    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- ANIMATE.CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- CUSTOM CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        /* Scroll Top Button */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #ffc107;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 999;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        .scroll-top:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        /* Floating Actions */
        .floating-actions {
            position: fixed;
            bottom: 100px; /* above scroll top */
            right: 30px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            z-index: 1000;
        }
        .floating-actions .btn {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .floating-actions .btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        .card h5, .card h6 {
    font-family: 'Spartan', sans-serif;
}
.card-text {
    font-size: 0.9rem;
}
.card-img-top {
    object-fit: cover;
    height: 200px;
}


        html {
            scroll-behavior: smooth;
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- ================= NAVBAR ================= --}}
    @include('frontend.partials.navbar')

    {{-- ================= PAGE CONTENT ================= --}}
    <main>
        @yield('content')
    </main>

    {{-- ================= FOOTER ================= --}}
    @include('frontend.partials.footer')

    {{-- ================= FLOATING ACTIONS ================= --}}
    <div class="floating-actions">
        <a href="https://wa.me/256775677760" target="_blank" class="btn btn-success rounded-circle shadow-lg" title="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="{{ route('frontend.contact') }}" class="btn btn-primary rounded-circle shadow-lg" title="Contact Us">
            <i class="fas fa-envelope"></i>
        </a>
        <a href="#newsletter" class="btn btn-warning rounded-circle shadow-lg" title="Subscribe">
            <i class="fas fa-bell"></i>
        </a>
    </div>

    {{-- ================= SCROLL TO TOP ================= --}}
    <button class="scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
