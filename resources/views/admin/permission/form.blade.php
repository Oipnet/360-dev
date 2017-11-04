@extends('layout')

@section('content')
    <h1>Administration</h1>
    <h2>Les roles</h2>
    @if($item->id)
        <h4>Editer</h4>
    @else
        <h4>Créer</h4>
    @endif
@endsection