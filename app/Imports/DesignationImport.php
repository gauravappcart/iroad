<?php
// namespace App\Imports;

// use App\Models\Departments;
// use App\Models\Designations_model;
// use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithValidation;
// use Maatwebsite\Excel\Concerns\SkipsOnFailure;
// use Illuminate\Validation\Rule;
// use Maatwebsite\Excel\Concerns\Importable;
// use Maatwebsite\Excel\Concerns\SkipsFailures;

// class DesignationImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
// {
//     use Importable, SkipsFailures;

//     public function model(array $row)
//     {

//         return new Designations_model([
//             'created_by'=>'admin',
//             'updated_by'=>'admin',
//             'designation_name' => $row['designation_name'],
//             'is_active' => 1
//         ]);
//     }

//     public function rules(): array
//     {
//         return [
//             'designation_name' => ['required', 'string','unique:designations,designation_name'],
//         ];
//     }

//     public function customValidationMessages()
//     {
//         return [
//             'designation_name.required' => 'Designation name is required.',
//             'designation_name.unique' => 'Designation name is already taken.',
//         ];
//     }
// }


namespace App\Imports;

use App\Models\Departments;
use App\Models\Designations_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Illuminate\Support\Facades\DB;

class DesignationImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        DB::transaction(function () use ($row) {
            // Check if the designation_name exists and is soft deleted
            $existingDesignation = Designations_model::withTrashed()->where('designation_name', $row['designation_name'])->first();

            if ($existingDesignation && $existingDesignation->trashed()) {
                // Create a new record since the existing one is soft deleted
                Designations_model::create([
                    'created_by' => 'admin',
                    'updated_by' => 'admin',
                    'designation_name' => $row['designation_name'],
                    'is_active' => 1
                ]);
            } elseif (!$existingDesignation) {
                // Create a new designation if no existing designation is found
                Designations_model::create([
                    'created_by' => 'admin',
                    'updated_by' => 'admin',
                    'designation_name' => $row['designation_name'],
                    'is_active' => 1
                ]);
            }
        });

        // Since we are handling the creation inside the transaction, return null to avoid creating another record
        return null;
    }

    public function rules(): array
    {
        return [
            'designation_name' => ['required', 'string'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'designation_name.required' => 'Designation name is required.',
        ];
    }
}
