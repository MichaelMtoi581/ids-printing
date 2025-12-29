<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
     use HasFactory, SoftDeletes;
    protected $fillable = [
        'file_no',
        'full_name',
        'email',
        'department_id',
        'designation_id',
        'phone_number',
        'staff_type',
        'educational_level',
        'residential_address',
        'photo_path',
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}

