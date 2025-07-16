@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-4">Edit Role</h2>

        <form action="{{ route('admin.users.roles.update', $role->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-medium">Role Name</label>
                <input type="text" name="name" id="name" value="{{ $role->name }}"
                    class="w-full border px-4 py-2 rounded" required>
            </div>

            <div class="flex space-x-3">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update
                    Role</button>
                <a href="{{ route('admin.users.roles.index') }}"
                    class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</a>
            </div>
        </form>
    </div>
@endsection
