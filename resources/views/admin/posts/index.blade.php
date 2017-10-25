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
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="">{{ $post->name }}</a></td>
                        <td>{{ $post->slug }}</td>
                        <td>
                            <a href="" class="btn waves-effect waves-light">
                                Editer <i class="material-icons">mode_edit</i>
                            </a>
                            <a href="" class="btn waves-effect red">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection