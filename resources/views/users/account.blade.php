@extends('layout')

@section('content')

    <h1>Mon compte</h1>

    <form action="{{ route('user.update', $user) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="{{ $user->name }}" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="{{ $user->email }}" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <input type="text" name="discord_id" class="form-control" value="{{ $user->getDiscordId() }}" placeholder="Discord ID">
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Modifer mon compte</button>
    </form>

@endsection