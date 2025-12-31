<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Verification;


class VerificationController extends Controller
{
    // ADMIN LIST (your screenshot)
 public function index()
{
    $verifications = Verification::with(['staff.department', 'staff.designation'])
        ->orderByDesc('attempted_at')
        ->paginate(10);

    $total = Verification::count();
    $valid = Verification::where('status', 'found')->count();
    $invalid = Verification::where('status', 'not_found')->count();
    $today = Verification::whereDate('attempted_at', today())->count();

    return view('verifications.index', compact(
        'verifications',
        'total',
        'valid',
        'invalid',
        'today'
    ));
}


    // PUBLIC QR VERIFY
    public function verify($token)
    {
        $staff = Staff::where('qr_token', $token)->first();

        Verification::create([
            'qr_token' => $token,
            'card_number' => $staff->card_number ?? null,
            'staff_id' => $staff->id ?? null,
            'file_no' => $staff->file_no ?? null,
            'status' => $staff ? 'found' : 'not_found',
            'attempted_at' => now(),
        ]);

        return view('verifications.result', compact('staff'));
    }
}