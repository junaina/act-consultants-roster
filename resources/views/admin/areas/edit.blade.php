@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto mt-8">
        <h2 class="text-xl font-semibold mb-4">Edit Area of Expertise</h2>

        <form action="{{ route('admin.users.areas.update', $area->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">Area Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $area->name) }}"
                    class="w-full border rounded px-4 py-2" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Update Area
                </button>
            </div>
        </form>
    </div>
@endsection
