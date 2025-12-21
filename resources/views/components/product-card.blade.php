<div class="col-md-3">
    <div class="card h-100 shadow-sm text-center">
        <div class="card-body">
            <h6>{{ $name }}</h6>
            <p class="fw-bold text-success">${{ number_format($price,2) }}</p>
            <a href="{{ $link }}" class="btn btn-success btn-sm">View Details</a>
        </div>
    </div>
</div>
