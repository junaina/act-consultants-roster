@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto mt-8">
        <h2 class="text-xl font-semibold mb-4">Edit Sub Area</h2>
        <form action="{{ route('admin.users.sub-areas.update', $subArea->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="area_of_expertise_id" class="block font-medium mb-1">Parent Area</label>
                <select name="area_of_expertise_id" id="area_of_expertise_id" class="w-full border rounded px-4 py-2">
                    <option value="">Select Area</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}"
                            {{ old('area_of_expertise_id', $subArea->area_of_expertise_id) == $area->id ? 'selected' : '' }}>
                            {{ $area->name }}
                        </option>
                    @endforeach
                </select>
                @error('area_of_expertise_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">Sub Area Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $subArea->name) }}"
                    class="w-full border rounded px-4 py-2" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Update Sub Area
                </button>
            </div>
        </form>
    </div>
@endsection
