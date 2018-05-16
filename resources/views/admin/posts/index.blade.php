@extends('admin/admin')

@section('content')

    <div class="row">
        <div class="col s12">
            <h1>Les articles</h1>
            <a class="btn-floating btn-large waves-effect waves-light darken-2" href="{{ route('posts.create') }}"><i class="material-icons">add</i></a>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>URL</th>
                    <th>Auteur</th>
                    <th>En ligne ?</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="{{ route('posts.edit', ['id' => $post->id]) }}">{{ $post->name }}</a></td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->getOnlineToString() }}</td>
                        <td>
                            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn waves-effect waves-light">
                                <i class="material-icons">mode_edit</i> Editer
                            </a>
                            <form action="{{ route('posts.destroy', $post) }}" method="post" class="delete-inline" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <button class="btn waves-effect red inline"><i class="material-icons">delete</i> Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td>Aucun article de créé pour le moment</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection