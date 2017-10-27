@extends('admin/admin')

@section('content')

    <div class="row">
        <div class="col s12">
            <h1>Les catégories</h1>
            <a class="btn-floating btn-large waves-effect waves-light darken-2" href="{{ route('categories.create') }}"><i class="material-icons">add</i></a>
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
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><a href="{{ route('categories.edit', ['id' => $category->id]) }}">{{ $category->name }}</a></td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn waves-effect waves-light">
                                <i class="material-icons">mode_edit</i> Editer
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="post" class="delete-inline" style="display: inline-block;">
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