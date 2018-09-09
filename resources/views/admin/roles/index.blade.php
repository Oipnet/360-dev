@extends('admin/admin')

@section('content')

    <div class="row">
        <div class="col s12">
            <h1>Les roles utilisateur</h1>
            <a class="btn-floating btn-large waves-effect waves-light darken-2" href="{{ route('roles.create') }}"><i class="material-icons">add</i></a>
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td><a href="{{ route('roles.edit', $role) }}">{{ $role->name }}</a></td>
                        <td>{{ $role->slug }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role) }}" class="btn waves-effect waves-light">
                                <i class="material-icons">mode_edit</i> Editer
                            </a>
                            <form action="{{ route('roles.destroy', $role) }}" method="post" class="delete-inline" style="display: inline-block;">
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