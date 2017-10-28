@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center">Administration</h1>
        <hr>
        <h3 class="text-center">Permissions</h3>
        <p>
            <a href="{{ route('admin.permission.create') }}" class="btn btn-outline-primary">Créer une nouvel permission</a>
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
                            <a href="{{ route('admin.permission.show', $item->id) }}">
                                {{ $item->description }}
                            </a>
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.permission.edit', $item->id) }}" class="btn btn-outline-warning">
                                Editer
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.permission.destroy', $item->id) }}" method="POST">
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