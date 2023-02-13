@extends('layouts.app')

@section('content')
    <h1>{{ $role->name }}</h1>
    <p><a href="{{ route('roles.index') }}">Back to roles</a></p>
@endsection
