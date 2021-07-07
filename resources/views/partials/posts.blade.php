@foreach($posts as $post)

    <!-- Blog Post -->
    <div class="card mb-4">
        <a href="{{ route('blog.show', ['slug' => $post->slug]) }}">
            <img class="card-img-top" src="{{ $post->getImage('thumb') ?: 'http://placehold.it/750x300' }}" alt="Card image cap">
        </a>
        <div class="card-body">
            <h2 class="card-title">{{ $post->name }}</h2>
            <p class="card-text">{{ $post->shortContent() }}</p>
            <a href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="btn btn-primary">Lire la suite &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Créé le <em>{{ $post->getCreatedAt() }}</em> by
            <a href="#"><strong>{{ $post->user->name }}</strong></a>
            | {{ $post->category->name }}
            @if (Auth::check())
                | <favorite :post={{ $post->id }} :favorited={{ $post->favorited() ? 'true' : 'false' }}></favorite>
            @endif
        </div>
    </div>

@endforeach