<!-- resources/views/permissions/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Permission</h1>

    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- To specify that this is an update request -->

        <div class="form-group">
            <label for="name">Permission Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $permission->name) }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Permission</button>
    </form>
@endsection
