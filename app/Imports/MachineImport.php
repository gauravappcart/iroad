<?php
namespace App\Imports;

use App\Models\Machine_types_model;
use App\Models\Machines_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class MachineImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        // Ensure related data is fetched correctly
        $machineTypes = Machine_types_model::where('machine_type', $row['machine_type'])->first();
        // $material_types = Material_types_model::where('material_type', $row['material_type'])->first();

        return new Machines_model([
            'machine_type' => $machineTypes->mach_type_id,
            'machine_name' => $row['machine_name'],
            'machine_number'=> $row['machine_number'],
            'machine_uid'=> $row['machine_uid'],
            'machine_hrs'=> $row['machine_hrs'],
            'machine_cost'=> $row['machine_cost'],
            'machine_cost_per_hrs'=> $row['machine_cost']/$row['machine_hrs'],
            'is_active' => 1
        ]);
    }

    public function rules(): array
    {
        return [
            'machine_name' => ['required', 'string',],
            'machine_type' => ['required', 'exists:machine_types,machine_type'],
            'machine_number' => ['required', 'unique:machines,machine_number'],
            'machine_uid' => ['required', 'unique:machines,machine_number'],
            // 'machine_number' => ['required', 'exists:machines,machine_number'],
            // 'machine_uid' => ['required', 'exists:machines,machine_uid'],
            'machine_hrs' => ['required'],
            'machine_cost' => ['required'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'machine_name.required' => 'Machine name is required.',
            'machine_type.required' => 'Machine type is required.',
            'machine_type.exists' => 'Machine type must exist in the machine types table.',
            'machine_number.required' => 'Machine number is required.',
            'machine_uid.required' => 'Machine uid is required.',
            'machine_hrs.required' => 'Machine hrs is required.',
            'machine_cost.required' => 'Machine cost is required.',
        ];
    }
}
