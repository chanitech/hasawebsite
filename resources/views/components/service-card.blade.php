<div class="col-md-4">
    <div class="card h-100 text-center p-4 shadow-sm service-card">
        <h5 class="fw-bold">{{ $title }}</h5>
        <p>{{ $description }}</p>
        @isset($link)
        <a href="{{ $link }}" class="service-link">Learn More</a>
        @endisset
    </div>
</div>
