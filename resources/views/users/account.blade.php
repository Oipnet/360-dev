@extends('layout')

@section('content')

    <h1>Mon compte</h1>

    <form action="{{ route('user.update', $user) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="role">Pseudo :</label>
                    <input type="text" name="name" class="form-control" placeholder="{{ $user->name }}" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="role">Email :</label>
                    <input type="email" name="email" class="form-control" placeholder="{{ $user->email }}" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="role">Disocrd ID :</label>
                    <input type="number" name="discord_id" class="form-control" value="{{ $user->getDiscordId() }}" placeholder="Discord ID">
                </div>
                <div class="form-group">
                    <label for="role">Votre role :</label>
                    <input type="text" id="role" class="form-control" disabled value="{{ $user->role->name }}">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="use_discord" id="use_discord">
                    <label class="form-check-label" for="use_discord">
                        Utiliser vos informations de discord
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{ $user->avatar }}" alt="Votre avatar">
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Modifer mon compte</button>
    </form>

@endsection