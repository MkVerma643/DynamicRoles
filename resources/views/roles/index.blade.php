@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach ($role->permissions as $permission)
                            {{ $permission->name }},
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('roles.show', $role) }}">View</a>
                        <a href="{{ route('roles.edit', $role) }}">Edit</a>
                        <form action="{{ route('roles.destroy', $role) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('roles.create') }}">Add New Role</a>
@endsection
