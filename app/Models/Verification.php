<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_token',
        'card_number',
        'staff_id',
        'file_no',
        'status',
        'attempted_at',
    ];

    public $timestamps = false;

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
