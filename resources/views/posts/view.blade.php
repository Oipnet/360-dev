@extends('layout')

@section('content')

    <div class="row">
        <div class="col-12 col-md-9">
            <img src="{{ $post->image }}" alt="" width="100%" height="175px">
            <h1>{{ $post->name }}</h1>
            <small class="mb-3">{{ $post->getCreatedAt() }} | De : <strong>{{ $post->user->name }}</strong></small>

            <p class="mt-3">{!! nl2br($post->html) !!}</p>
        </div>
        @include('partials/sidebar')
    </div>

@endsection