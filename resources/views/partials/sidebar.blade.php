<div class="col-12 col-md-3">
    <h2>Catégories</h2>
    <div class="list-group">
        @foreach($categories as $category)
            <a
                href="{{ route('blog.category', ['slug' => $category->slug]) }}"
                class="list-group-item {{ request()->getUri() === route('blog.category', ['slug' => $category->slug]) ? 'active' : ''}} list-group-item-action">
                {{ $category->name }}
                <span class="badge badge-primary float-right">{{ $category->posts_count }}</span>
            </a>
        @endforeach
    </div>
</div>