
@extends('layouts.app')

@section('content')
    <h1>Edit Role</h1>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- To specify that this is an update request -->

        <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Role</button>
    </form>
@endsection
