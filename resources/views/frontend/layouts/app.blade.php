<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Hasa Constructions Limited')</title>

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

        /* ================= BRAND COLORS (from logo) ================= */
        :root {
            --hasa-navy: #013660;
            --hasa-navy-dark: #012544;
            --hasa-maroon: #610013;
            --hasa-gray: #888888;
        }

        .btn-primary {
            --bs-btn-bg: var(--hasa-navy);
            --bs-btn-border-color: var(--hasa-navy);
            --bs-btn-hover-bg: var(--hasa-maroon);
            --bs-btn-hover-border-color: var(--hasa-maroon);
            --bs-btn-active-bg: var(--hasa-maroon);
            --bs-btn-active-border-color: var(--hasa-maroon);
            --bs-btn-disabled-bg: var(--hasa-navy);
            --bs-btn-disabled-border-color: var(--hasa-navy);
            --bs-btn-focus-shadow-rgb: 1, 54, 96;
        }

        .btn-outline-primary {
            --bs-btn-color: var(--hasa-navy);
            --bs-btn-border-color: var(--hasa-navy);
            --bs-btn-hover-bg: var(--hasa-navy);
            --bs-btn-hover-border-color: var(--hasa-navy);
            --bs-btn-active-bg: var(--hasa-navy);
            --bs-btn-active-border-color: var(--hasa-navy);
            --bs-btn-focus-shadow-rgb: 1, 54, 96;
        }

        .text-primary { color: var(--hasa-navy) !important; }
        .bg-primary { background-color: var(--hasa-navy) !important; }
        .border-primary { border-color: var(--hasa-navy) !important; }

        /* ================= TOP NAV ================= */
.top-nav {
    position: fixed;
    top: 0;
    width: 100%;
    background-color: #111;
    z-index: 1050;
    font-size: 13px;
}

.top-nav__wrapper {
    max-width: 1200px;
    margin: auto;
    padding: 6px 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.social-icons {
    list-style: none;
    display: flex;
    gap: 12px;
    padding: 0;
    margin: 0;
}

.social-icons li a {
    color: #fff;
    font-size: 13px;
    transition: opacity 0.3s ease;
}

.social-icons li a:hover {
    opacity: 0.7;
}

.top-nav__wrapper__selectors {
    display: flex;
    gap: 16px;
}

.top-nav__auth {
    color: #fff;
    text-decoration: none;
    font-size: 13px;
    transition: opacity 0.3s ease;
}

.top-nav__auth:hover {
    opacity: 0.7;
}


/* ================= MENU BAR ================= */
.menu {
    position: sticky;
    top: 36px; /* height of top bar */
    background: #fff;
    z-index: 1040;
    border-bottom: 1px solid #eee;
}

.menu__wrapper {
    max-width: 1200px;
    margin: auto;
    padding: 14px 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.menu__wrapper__logo img {
    height: 42px;
}

/* NAVIGATION */
.navigator ul {
    list-style: none;
    display: flex;
    gap: 28px;
    margin: 0;
    padding: 0;
}

.navigator ul li a {
    text-decoration: none;
    color: #111;
    font-weight: 500;
    font-size: 15px;
    position: relative;
}

.dropable-icon {
    margin-left: 5px;
    font-size: 12px;
}

/* DROPDOWN */

/* ================= DROPDOWN FIX ================= */

.relative {
    position: relative;
}

/* HIDE submenu by default */
.dropdown-menu-custom {
    position: absolute;
    top: 100%;
    left: 0;
    background: #ffffff;
    min-width: 260px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 10px 0;
    margin: 0;
    list-style: none;

    /* FORCE HIDE */
    display: none !important;
    opacity: 0;
    visibility: hidden;
    transition: all 0.25s ease;
    z-index: 9999;
}

/* SHOW submenu on hover */
.relative:hover > .dropdown-menu-custom {
    display: block !important;
    opacity: 1;
    visibility: visible;
}

/* submenu links */
.dropdown-menu-custom li a {
    display: block;
    padding: 10px 18px;
    font-size: 14px;
    color: #222;
    text-decoration: none;
    white-space: nowrap;
}

.dropdown-menu-custom li a:hover {
    background: #f5f5f5;
}



/* RIGHT ICONS */
.menu__wrapper__functions {
    display: flex;
    align-items: center;
    gap: 18px;
}

.menu-icon img {
    height: 22px;
}

.menu__cart {
    display: flex;
    align-items: center;
    gap: 6px;
}

.cart__quantity {
    position: absolute;
    top: -6px;
    right: -6px;
    background: red;
    color: #fff;
    font-size: 11px;
    border-radius: 50%;
    padding: 2px 6px;
}

/* MOBILE MENU ICON */
.menu-icon.-navbar {
    display: none;
    flex-direction: column;
    gap: 4px;
}

.menu-icon.-navbar .bar {
    width: 22px;
    height: 2px;
    background: #000;
}

html, body {
    height: 100%;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}



        /* Scroll Top Button */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #013660;
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

/* ================= FOOTER ================= */
        footer {
            margin-top: auto;
        }



        @media (max-width: 767.98px) {
    .navigator {
        display: none;
        flex-direction: column;
        width: 100%;
        background: #fff;
        border-top: 1px solid #eee;
    }
    .navigator.active {
        display: flex;
    }
    .navigator ul {
        flex-direction: column;
        gap: 0;
        padding: 10px 0;
    }
    .navigator li {
        width: 100%;
    }
    .relative > .dropdown-menu-custom {
        display: none !important;
        flex-direction: column;
        padding-left: 15px;
        box-shadow: none;
        position: relative;
    }
    .relative.open > .dropdown-menu-custom {
        display: flex !important;
    }
    .menu__wrapper__functions {
        gap: 12px; 
        margin-top: 10px;
    }
}







    /* Make the burger menu visible on mobile */
    .menu-icon.-navbar {
        display: flex;
        cursor: pointer;
    }


/* DESKTOP */
@media (min-width: 768px) {
    .menu-icon.-navbar {
        display: none;
    }
    .relative:hover > .dropdown-menu-custom {
        display: block !important;
    }
}


.relative > .dropdown-menu-custom {
    transition: max-height 0.3s ease, opacity 0.3s ease;
    overflow: hidden;
}
.relative.open > .dropdown-menu-custom {
    max-height: 500px; /* adjust as needed */
    opacity: 1;
}









        html {
            scroll-behavior: smooth;
        }
    </style>

    @stack('styles')
</head>
<body>
     {{-- ================= TOPBAR ================= --}}
    @include('frontend.partials.topbar')

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
        <a href="https://wa.me/255123456789" target="_blank" class="btn btn-success rounded-circle shadow-lg" title="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="{{ route('frontend.contact') }}" class="btn btn-primary rounded-circle shadow-lg" title="Contact Us">
            <i class="fas fa-envelope"></i>
        </a>
        

    {{-- ================= SCROLL TO TOP ================= --}}
    <button class="scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

     <script>
document.addEventListener('DOMContentLoaded', function() {
    const burger = document.querySelector('.menu-icon.-navbar');
    const navigator = document.querySelector('.navigator');

    // Toggle main menu on mobile
    burger.addEventListener('click', () => {
        navigator.classList.toggle('active');
    });

    // Toggle submenus on mobile
    document.querySelectorAll('.relative > a').forEach(link => {
        link.addEventListener('click', function(e) {
            if (window.innerWidth < 768) {
                e.preventDefault(); // prevent link
                this.parentElement.classList.toggle('open');
            }
        });
    });
});
</script>



    @stack('scripts')
</body>
</html>
