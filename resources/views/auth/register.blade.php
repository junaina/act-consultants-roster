@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-12 bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <div>
            <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input id="full_name" type="text" name="full_name" value="{{ old('full_name') }}" required autofocus
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-red-500 focus:border-red-500">
            @error('full_name')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-red-500 focus:border-red-500">
            @error('email')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input id="password" type="password" name="password" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-red-500 focus:border-red-500">
            @error('password')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-red-500 focus:border-red-500">
            @if ($errors->has('password'))
                <p class="text-sm text-gray-500 mt-1">Please re-enter your password confirmation.</p>
            @endif
        </div>

        <div>
            <button type="submit"
                class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">Register</button>
        </div>

        <div class="text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-red-600 hover:underline">Log in here</a>
        </div>
    </form>
</div>
@endsection
