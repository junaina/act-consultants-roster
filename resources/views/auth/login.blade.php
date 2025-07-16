@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-12 bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login to Your Account</h2>

    @if (session('status'))
        <div class="mb-4 text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
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

        <div class="flex items-center justify-between">
            
{{-- 
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-red-600 hover:underline">Forgot your password?</a>
            @endif --}}
        </div>

        <div>
            <button type="submit"
                class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">Log in</button>
        </div>

        <div class="text-center text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-red-600 hover:underline">Sign up here</a>
        </div>
    </form>
</div>
@endsection
