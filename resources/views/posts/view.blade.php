@extends('layout')

@section('content')

    <h1>{{ $post->name }}</h1>

    <p>{{ $post->content }}</p>

@endsection