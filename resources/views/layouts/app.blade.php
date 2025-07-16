<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-900">
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="">
            <img src="{{ asset('images/ACT-LOGO.svg') }}" alt="Logo" class="h-11">
        </div>

        <div class="space-x-4">
            <a href="{{ url('/') }}" class="text-gray-700 hover:text-red-600">Home</a>

            @auth
                @php
                    $hasRegistration = \App\Models\Registration::where('user_id', auth()->id())->exists();
                @endphp

                @if ($hasRegistration)
                    <a href="{{ route('registrations.edit') }}" class="text-gray-700 hover:text-red-600">Edit
                        Registration</a>
                @else
                    @if (auth()->user()->role === 'user')
                        <a href="{{ route('registrations.edit') }}" class="text-gray-700 hover:text-red-600">Registration
                            Form</a>
                    @else
                        <a href="{{ route('admin.users.create') }}" class="text-gray-700 hover:text-red-600">Registration
                            Form</a>
                    @endif
                @endif

                @if (auth()->user()?->role?->name === 'Admin')
                    <a href="{{ url('/admin') }}" class="text-gray-700 hover:text-red-600">Admin Dashboard</a>
                @endif

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-600">Logout</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-red-600">Login</a>
            @endguest
        </div>
    </nav>

    <main class="mx-auto mt-10 p-4">
        @yield('welcome-page-content')
        @yield('content')
    </main>

    @yield('scripts')
</body>

</html>
