@extends('layout')

@section('content')

    <h1>{{ $item->name }}</h1>

    <p>{{ $item->content }}</p>

@endsection