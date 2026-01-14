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
        'qr_token',
        'id_card_prints',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function generateCardNumber(): string
{
    $departmentCode = $this->department
        ? strtoupper(collect(explode(' ', preg_replace('/[^A-Za-z ]/', '', $this->department->name)))
            ->map(fn ($w) => substr($w, 0, 1))
            ->implode(''))
        : 'GEN';

    $designationCode = $this->designation
        ? strtoupper(collect(explode(' ', preg_replace('/[^A-Za-z ]/', '', $this->designation->name)))
            ->map(fn ($w) => substr($w, 0, 1))
            ->implode(''))
        : 'GEN';

    $serial = str_pad($this->id, 6, '0', STR_PAD_LEFT);

    return "KMC-{$departmentCode}-{$designationCode}-{$serial}";
}

}

