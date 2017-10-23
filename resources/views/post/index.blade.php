@extends('layout')

@section('content')

    <div class="row">
        <div class="col-12 col-md-9">
            <h1>Blog</h1>
            <div class="row">
                @foreach($items as $item)
                    <div class="col-md-4 mb-3">
                        <div class="card card-default">
                            <img src="{{ $item->image }}" alt="" class="card-img-top" height="175">
                            <div class="card-body text-center">
                                <div class="card-title">{{ $item->name }}</div>
                                <p class="card-text">{{ str_limit($item->content, 100, '...') }}</p>
                                <a href="{{ route('blog.show', ['slug' => $item->slug]) }}" class="btn btn-outline-primary m-b">
                                    Lire la suite <i class="glyphicon glyphicon-menu-right"></i>
                                </a>
                            </div>
                            <div class="card-footer">
                                <small>{{ $item->created_at }} // By {{ $item->user->login }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
                <nav aria-label="Page navigation example">
                    {{ $items->links() }}
                </nav>
            </div>
        </div>

        <div class="col-12 col-md-3">
            <h2>Catégories</h2>
            <div class="list-group">
                @foreach($categories as $category)
                    <a href="" class="list-group-item list-group-item-action">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

@endsection