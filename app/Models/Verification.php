<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    public function index()
{
    $verifications = Verification::with(['staff.department', 'staff.designation'])
        ->orderByDesc('attempted_at')
        ->paginate(10);

    return view('verifications.index', compact('verifications'));
}

}
