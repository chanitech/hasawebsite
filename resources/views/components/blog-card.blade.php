<div class="col-md-4">
    <div class="card h-100 shadow-sm">
        <img src="{{ asset('storage/'.$image) }}" class="card-img-top" alt="{{ $title }}">
        <div class="card-body">
            <h5>{{ $title }}</h5>
            <p>{{ Str::limit($excerpt, 100) }}</p>
            <a href="{{ $link }}" class="btn btn-success btn-sm">Read More</a>
        </div>
    </div>
</div>
