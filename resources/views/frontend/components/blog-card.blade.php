<div class="col-md-4">
    <div class="card h-100 border-0 shadow-sm transition-hover">
        @if($image)
            <img src="{{ asset('storage/'.$image) }}" class="card-img-top" alt="{{ $title }}" style="height:200px; object-fit:cover;">
        @else
            <img src="{{ asset('images/default-blog.png') }}" class="card-img-top" alt="{{ $title }}" style="height:200px; object-fit:cover;">
        @endif
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ Str::limit($title, 50) }}</h5>
            <p class="card-text flex-grow-1">{{ Str::limit($excerpt, 100) }}</p>
            <a href="{{ $link }}" class="btn btn-success mt-3">Read More</a>
        </div>
    </div>
</div>
