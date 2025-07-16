@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-semibold mb-6">Add New Area of Expertise</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.areas.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Area Name</label>
                <input type="text" name="name" id="name" required
                    class="w-full border border-gray-300 p-2 rounded" value="{{ old('name') }}">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('admin.users.areas.index') }}" class="inline-block text-sm text-gray-600 hover:underline">
                    ← Back to Areas
                </a>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Add Area
                </button>
            </div>
        </form>
    </div>
@endsection
