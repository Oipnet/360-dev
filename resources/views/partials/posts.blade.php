@foreach($posts as $post)
    <div class="col-md-4 mb-3">
        <div class="card card-default">
            <img src="{{ $post->getImage('thumb') }}" alt="" class="card-img-top" height="175">
            <div class="card-body text-center">
                <div class="card-title">{{ $post->name }}</div>
                <p class="card-text">{{ $post->shortContent() }}</p>
                <a href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="btn btn-outline-primary m-b">
                    Lire la suite <i class="glyphicon glyphicon-menu-right"></i>
                </a>
            </div>
            <div class="card-footer">
                <small>
                    Le <em>{{ $post->getCreatedAt() }}</em>
                    | Par : <strong>{{ $post->user->name }}</strong>
                    | {{ $post->category->name }}
                </small>
            </div>
        </div>
    </div>
@endforeach