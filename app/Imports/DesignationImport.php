<?php
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

class DesignationImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {

        return new Designations_model([
            'created_by'=>'admin',
            'updated_by'=>'admin',
            'designation_name' => $row['designation_name'],
            'is_active' => 1
        ]);
    }

    public function rules(): array
    {
        return [
            'designation_name' => ['required', 'string','unique:designations,designation_name'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'designation_name.required' => 'Designation name is required.',
            'designation_name.unique' => 'Designation name is already taken.',
        ];
    }
}
