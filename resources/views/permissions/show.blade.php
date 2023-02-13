@extends('layouts.app')

@section('content')
    <h1>{{ $role->name }}</h1>
    <p><a href="{{ route('permissions.index') }}">Back to Permissions</a></p>
@endsection
