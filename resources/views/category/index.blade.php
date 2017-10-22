@extends('layout')

@section('content')

    <div class="row">
        <div class="col-12 col-md-9">
            <h1>Category</h1>
            <div class="row">
                @foreach($items as $item)
                    <div class="col-md-4 mb-3">
                        <div class="card card-default">
                            <img src="{{ $item->image }}" alt="" class="card-img-top" height="175">
                            <div class="card-body text-center">
                                <div class="card-title">{{ $item->name }}</div>
                                <p class="card-text">{{ $item->type === 'post' ? "Blog" : "Tuto" }}</p>
                                <a href="{{ route('category.show', ['slug' => $item->slug]) }}" class="btn btn-outline-primary m-b">
                                    Lire la suite <i class="glyphicon glyphicon-menu-right"></i>
                                </a>
                            </div>
                            <div class="card-footer">
                                <small>{{ $item->created_at }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
                <nav aria-label="Page navigation example">
                    {{ $items->links() }}
                </nav>
            </div>
        </div>
    </div>

@endsection