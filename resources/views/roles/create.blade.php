<form action="{{ route('roles.store') }}" method="post">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="permissions">Permissions:</label>
        <select multiple id="permissions" name="permissions[]">
            @foreach ($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Create</button>
</form>
