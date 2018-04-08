@extends('admin/admin')

@section('content')

    <div class="row">
        <div class="col s12">
            <h1>Mettre à jour l'article {{ $post->name }}</h1>
            <p><a href="{{ route('posts.index') }}">Revenir à la liste</a></p>
            {!! form($form) !!}
        </div>
    </div>

@endsection