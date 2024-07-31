<?php
// namespace App\Imports;

// use App\Models\Roles_model;

// use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithValidation;
// use Maatwebsite\Excel\Concerns\SkipsOnFailure;
// use Illuminate\Validation\Rule;
// use Maatwebsite\Excel\Concerns\Importable;
// use Maatwebsite\Excel\Concerns\SkipsFailures;

// class RoleImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
// {
//     use Importable, SkipsFailures;

//     public function model(array $row)
//     {

//         return new Roles_model([
//             'created_by'=>'admin',
//             'updated_by'=>'admin',
//             'role_name' => $row['role_name'],
//             'is_active' => 1
//         ]);
//     }

//     public function rules(): array
//     {
//         return [
//             'role_name' => ['required', 'string','unique:roles,role_name'],
//         ];
//     }

//     public function customValidationMessages()
//     {
//         return [
//             'role_name.required' => 'Role name is required.',
//             'role_name.unique' => 'Role name is already taken.',
//         ];
//     }
// }
namespace App\Imports;

use App\Models\Roles_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class RoleImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        // Check if the role_name exists and is soft deleted
        $existingRole = Roles_model::withTrashed()->where('role_name', $row['role_name'])->first();

        if ($existingRole && $existingRole->trashed()) {
            // Restore the soft deleted record
            $existingRole->restore();
            // Update the record with new data if needed
            $existingRole->update([
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'is_active' => 1,
            ]);
            return $existingRole;
        } else {
            // Create a new role record
            return new Roles_model([
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'role_name' => $row['role_name'],
                'is_active' => 1,
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'role_name' => [
                'required',
                'string',
                // Custom rule to ignore soft-deleted records
                Rule::unique('roles', 'role_name')->whereNull('deleted_at')
            ],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'role_name.required' => 'Role name is required.',
            'role_name.unique' => 'Role name is already taken.',
        ];
    }
}
