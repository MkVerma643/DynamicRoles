<form action="{{ route('permissions.update', $permission) }}" method="post">
    @csrf
    @method('put')
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $permission->name }}">
    </div>
    <button type="submit">Update</button>
</form>
