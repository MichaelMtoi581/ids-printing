<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Department;
use App\Models\Designation;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalStaff' => Staff::count(),
            'activeStaff' => Staff::where('status', 'active')->count(),
            'inactiveStaff' => Staff::where('status', 'inactive')->count(),
            'departments' => Department::count(),
            'designations' => Designation::count(),
        ]);
    }
}
