<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AreaOfExpertise;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = AreaOfExpertise::with(['subAreas', 'registrations'])->get();
        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        AreaOfExpertise::create(['name' => $request->name]);
        return redirect()->route('admin.users.areas.index')->with('success', 'Area created successfully.');
    }

    public function edit($id)
    {
        $area = AreaOfExpertise::findOrFail($id);
        return view('admin.areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $area = AreaOfExpertise::findOrFail($id);

        $request->validate(['name' => 'required|string|max:255']);
        $area->update(['name' => $request->name]);

        return redirect()->route('admin.users.areas.index')->with('success', 'Area updated successfully.');
    }

    public function destroy($id)
    {
        $area = AreaOfExpertise::findOrFail($id);

        if ($area->subAreas()->exists() || $area->registrations()->exists()) {
            return redirect()->route('admin.users.areas.index')
                ->with('delete_error_id', $id)
                ->with('error', 'Cannot Delete: This area has records associated with it.');
        }

        $area->delete();
        return redirect()->route('admin.users.areas.index')->with('success', 'Area deleted.');
    }
}
