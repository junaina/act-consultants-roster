@extends('layouts.app')

@section('content')
    <div class="max-w-screen-xl mx-auto px-8 py-6">
        <h1 class="text-3xl font-semibold text-slate-800 mb-6">Manage Sub Areas of Expertise</h1>

        <!-- Navigation Buttons -->
        <div class="flex flex-wrap gap-3 mb-6">
            <a href="{{ route('admin.users.dashboard') }}"
                class="px-4 py-2 text-sm rounded-lg bg-slate-100 text-slate-700 border border-slate-300 hover:bg-slate-200 transition">
                ← Back to Dashboard
            </a>

            <a href="{{ route('admin.users.areas.index') }}"
                class="px-4 py-2 text-sm rounded-lg bg-blue-100 text-blue-700 border border-blue-200 hover:bg-blue-200 transition">
                Manage Areas of Expertise
            </a>

            <a href="{{ route('admin.users.roles.index') }}"
                class="px-4 py-2 text-sm rounded-lg bg-emerald-100 text-emerald-700 border border-emerald-200 hover:bg-emerald-200 transition">
                Manage Roles
            </a>

            <a href="{{ route('admin.users.roles.assignment.index') }}"
                class="px-4 py-2 text-sm rounded-lg bg-orange-100 text-orange-700 border border-orange-200 hover:bg-orange-200 transition">
                Assign Roles
            </a>
        </div>

        <!-- Filter + Create -->
        <form method="GET" action="{{ route('admin.users.sub-areas.index') }}"
            class="mb-6 flex flex-wrap items-center gap-3">
            <select name="area_id" onchange="this.form.submit()"
                class="border border-gray-300 rounded-md px-4 py-2 text-sm shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">All Areas</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}" {{ $selectedAreaId == $area->id ? 'selected' : '' }}>
                        {{ $area->name }}
                    </option>
                @endforeach
            </select>

            <a href="{{ route('admin.users.sub-areas.create', ['area_id' => $selectedAreaId]) }}"
                class="bg-red-600 text-white px-4 py-2 text-sm rounded-md hover:bg-red-700 transition">
                + Add New Sub Area
            </a>
        </form>

        <!-- Table -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-red-100 text-xs uppercase text-black-600">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Parent Area</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($subAreas as $sub)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $sub->name }}</td>
                            <td class="px-6 py-4">{{ $sub->area->name ?? '—' }}</td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('admin.users.sub-areas.edit', $sub->id) }}"
                                        class="px-3 py-1 text-sm rounded-md bg-yellow-100 text-yellow-800 hover:bg-yellow-200 transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.users.sub-areas.destroy', $sub->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this sub-area?');">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm rounded-md bg-rose-100 text-rose-700 hover:bg-rose-200 transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-slate-500">No sub-areas found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
