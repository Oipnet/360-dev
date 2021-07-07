@extends('admin/admin')

@section('content')

    <div class="row">
        <div class="col s12">
            <h1>Les utilisateurs</h1>
            <a class="btn-floating btn-large waves-effect waves-light darken-2" href="{{ route('users.create') }}"><i class="material-icons">add</i></a>
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ route('users.edit', ['id' => $user->id]) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->getRole() }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn waves-effect waves-light">
                                <i class="material-icons">mode_edit</i> Editer
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="post" class="delete-inline" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <button class="btn waves-effect red inline"><i class="material-icons">delete</i> Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection