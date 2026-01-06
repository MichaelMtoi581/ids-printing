<?php

namespace App\Imports;

use App\Models\Staff;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StaffImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            if (
                empty($row['file_no']) ||
                empty($row['full_name']) ||
                empty($row['email']) ||
                empty($row['department']) ||
                empty($row['designation'])
            ) {
                continue; // skip incomplete rows
            }

            $department = Department::where('name', trim($row['department']))->first();
            $designation = Designation::where('name', trim($row['designation']))->first();

            if (!$department || !$designation) {
                continue; // skip invalid department/designation
            }

            $staff = Staff::where('file_no', $row['file_no'])
                          ->orWhere('email', $row['email'])
                          ->first();

            if ($staff) {
                // UPDATE EXISTING STAFF
                $staff->update([
                    'full_name'      => $row['full_name'],
                    'department_id'  => $department->id,
                    'designation_id' => $designation->id,
                    'phone_number'   => $row['phone_number'] ?? $staff->phone_number,
                    'staff_type'     => $row['staff_type'] ?? $staff->staff_type,
                    'status'         => $row['status'] ?? $staff->status,
                ]);
            } else {
                // CREATE NEW STAFF
                Staff::create([
                    'file_no'        => $row['file_no'],
                    'full_name'      => $row['full_name'],
                    'email'          => $row['email'],
                    'department_id'  => $department->id,
                    'designation_id' => $designation->id,
                    'phone_number'   => $row['phone_number'] ?? null,
                    'staff_type'     => $row['staff_type'] ?? 'permanent',
                    'status'         => $row['status'] ?? 'active',
                ]);
            }
        }
    }
}
