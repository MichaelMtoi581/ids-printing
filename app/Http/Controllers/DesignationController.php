<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;



class DesignationController extends Controller
{
    public function index()
    {
        // $designations = Designation::latest()->get();
        $designations = Designation::withCount('staff')->orderBy('name')->get();
        return view('designations.index', compact('designations'));
    }

    public function create()
    {
        return view('designations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:designations,name'
        ]);

        Designation::create($request->all());

        return redirect()->route('designations.index')
            ->with('success', 'Designation added');
    }

    public function edit(Designation $designation)
    {
        return view('designations.edit', compact('designation'));
    }

    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'name' => 'required|unique:designations,name,' . $designation->id
        ]);

        $designation->update($request->all());

        return redirect()->route('designations.index')
            ->with('success', 'Designation updated');
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();
        return back()->with('success', 'Designation deleted');
    }
}