<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubAreaOfExpertise;
use App\Models\AreaOfExpertise;

class SubAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        $areas = AreaOfExpertise::all();

        $selectedAreaId = $request->query('area_id');

        $subAreas = $selectedAreaId
            ? SubAreaOfExpertise::where('area_of_expertise_id', $selectedAreaId)->with('area')->get()
            : SubAreaOfExpertise::with('area')->get();

        return view('admin.sub-areas.index', compact('areas', 'subAreas', 'selectedAreaId'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $areas = AreaOfExpertise::all();
        $selectedAreaId = $request->query('area_id');
        return view('admin.sub-areas.create', compact('areas', 'selectedAreaId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'area_of_expertise_id' => 'required|exists:areas_of_expertise,id',
        ]);

        SubAreaOfExpertise::create([
            'name' => $request->name,
            'area_of_expertise_id' => $request->area_of_expertise_id,
        ]);

        return redirect()->route('admin.users.sub-areas.index', ['area_id' => $request->area_of_expertise_id])
            ->with('success', 'Sub Area created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subArea = SubAreaOfExpertise::findOrFail($id);
        $areas = AreaOfExpertise::all();  // To populate the dropdown
        return view('admin.sub-areas.edit', compact('subArea', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'area_of_expertise_id' => 'required|exists:areas_of_expertise,id',
        ]);

        $subArea = SubAreaOfExpertise::findOrFail($id);
        $subArea->update([
            'name' => $request->name,
            'area_of_expertise_id' => $request->area_of_expertise_id,
        ]);

        return redirect()->route('admin.users.sub-areas.index', ['area_id' => $request->area_of_expertise_id])
            ->with('success', 'Sub Area updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subArea = SubAreaOfExpertise::findOrFail($id);
        $subArea->delete();

        return redirect()
            ->route('admin.users.sub-areas.index', ['area_id' => $subArea->area_id ?? null])
            ->with('success', 'Sub Area deleted successfully.');
    }
}
