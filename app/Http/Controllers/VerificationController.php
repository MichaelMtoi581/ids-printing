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
        $verifications = Verification::latest('attempted_at')->paginate(10);

        return view('verifications.index', compact('verifications'));
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