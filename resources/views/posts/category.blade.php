@extends('layout')

@section('content')

    <div class="row">
        <div class="col-12 col-md-9">
            <h1>{{ $category->name }}</h1>
            <div class="row">
                @include('partials/posts')
                <nav aria-label="Page navigation example">
                    {{ $posts->links() }}
                </nav>
            </div>
        </div>

        @include('partials/sidebar')
    </div>

@endsection