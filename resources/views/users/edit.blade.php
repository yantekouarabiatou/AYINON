@extends('layout')
@section('content')
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $user->name }}">
        <button type="submit">Update</button>
    </form>
@endsection
