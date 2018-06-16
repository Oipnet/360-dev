@extends('layout')

@section('content')

   <div class="row">
       <div class="col-md-4">
           <h1 class="my-4">Mes favoris</h1>

           @include('partials.posts', ['posts' => $myFavorites])
       </div>
   </div>

@endsection