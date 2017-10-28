@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center">Administration</h1>
        <hr>
        <h3 class="text-center">Users</h3>
        <p>
            <a href="{{ route('admin.user.create') }}" class="btn btn-outline-primary">Créer un nouveau user</a>
        </p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ route('admin.user.show', $item->id) }}">
                                <img src="{{ $item->avatar }}" alt="Avatar de {{ $item->name }}" width="50">
                            </a>
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            @foreach($item->roles as $role)
                                {{ ucfirst($role->name) }}
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-outline-warning">
                                Editer
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.user.destroy', $item->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-outline-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection