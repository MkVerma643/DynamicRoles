@extends('layouts.app')

@section('content')
    <h1>Edit {{ $role->name }}</h1>
    <form action="{{ route('roles.update', $role) }}" method="post">
        @csrf
        @method('put')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $role->name }}">
        </div>
        <div>
            <label for="permissions">Permissions:</label>
            <select multiple id="permissions" name="permissions[]">
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission) ? 'selected' : '' }}>{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
