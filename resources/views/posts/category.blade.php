@extends('layout')

@section('content')

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Blog</h1>

        @include('partials.posts')
        <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                {{ $posts->links() }}
            </ul>

        </div>
        @include('partials.sidebar')
    </div>

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        {{ $posts->links() }}
    </ul>

    </div>

@endsection