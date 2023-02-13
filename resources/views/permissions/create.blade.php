<form action="{{ route('permissions.store') }}" method="post">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
    </div>
    <button type="submit">Create</button>
</form>
