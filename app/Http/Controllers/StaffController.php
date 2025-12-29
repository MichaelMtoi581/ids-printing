<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class StaffController extends Controller
{
   public function index()
{
    $staff = Staff::with(['department', 'designation'])->get();
    return view('staff.index', compact('staff'));
}


    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();

        return view('staff.create', compact('departments', 'designations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_no' => 'required|unique:staff',
            'full_name' => 'required',
            'email' => 'required|email|unique:staff',
            'department_id' => 'required',
            'designation_id' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

       $data = $request->all();

    if ($request->hasFile('photo')) {
        $data['photo_path'] =
            $request->file('photo')->store('staff_photos', 'public');
    }

    Staff::create($data);

    return redirect()->route('staff.index')
        ->with('success', 'Staff added successfully');
    }

    public function edit(Staff $staff)
    {
        $departments = Department::all();
        $designations = Designation::all();

        return view('staff.edit', compact('staff', 'departments', 'designations'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'file_no' => 'required|unique:staff,file_no,' . $staff->id,
            'email' => 'required|email|unique:staff,email,' . $staff->id,
        ]);

        $staff->update($request->all());

        return redirect()->route('staff.index')
            ->with('success', 'Staff updated successfully');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')
            ->with('success', 'Staff deleted successfully');
    }
}
