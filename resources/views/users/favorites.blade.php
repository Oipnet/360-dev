@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h3>My favoris</h3>
            </div>

            @forelse($myFavorites as $myFavorite)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $myFavorite->name }}
                    </div>
                    <div class="panel-body">
                        {{ $myFavorite->shortContent() }}
                    </div>
                    @if (Auth::check())
                        <div class="panel-footer">
                            <favorite :post={{ $myFavorite->id }} :favorited={{ $myFavorite->favorited() ? 'true' : 'false' }}></favorite>
                        </div>
                    @endif
                </div>
            @empty
                <p>Vous avez aucun favoris pour le moment</p>
            @endforelse
        </div>
    </div>

@endsection