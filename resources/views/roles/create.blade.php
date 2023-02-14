@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Role</div>

                <div class="card-body text-center">
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="name">Role Name:</label>&nbsp;
                            <input type="text" id="name" name="name">
                        </div>
                        <br>
                        <div>
                            <label for="permissions">Permissions:</label>&nbsp;
                            <select multiple id="permissions" name="permissions[]" style="width:180px">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit">Create Role</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
