@extends('layout')

@section('content')
    <h1>Administration</h1>
    <h2>Les roles</h2>
    <h4>{{ $item->name }}</h4>
    <p>{{ $item->description }}</p>
@endsection