@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center">Administration</h1>
        <hr>
        <h3 class="text-center">Roles</h3>
        <p>
            <a href="{{ route('admin.role.create') }}" class="btn btn-outline-primary">Créer un nouveau role</a>
        </p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->display_name }}</td>
                        <td>
                            <a href="{{ route('admin.role.show', $item->id) }}">
                                {{ $item->description }}
                            </a>
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.role.edit', $item->id) }}" class="btn btn-outline-warning">
                                Editer
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.role.destroy', $item->id) }}" method="POST">
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