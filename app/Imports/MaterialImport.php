<?php
namespace App\Imports;

use App\Models\Material_model;
use App\Models\Material_types_model;
use App\Models\Sites_model;
use App\Models\Units;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class MaterialImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
// {
//     use Importable, SkipsFailures;
//     // private $rows = [];
//     public function model(array $row)
//     {
//         // $this->rows[] = $row;
//         // dd($this->rows);
//         // Ensure related data is fetched correctly
//         $unitData = Units::where('unit_name', $row['material_unit'])->first();
//         $material_types = Material_types_model::where('material_type', $row['material_type'])->first();
//         if($row['site_id']){

//             $sites = Sites_model::where('site_name', $row['site_id'])->first();
//             $site_id=$sites->site_id;
//         }else{
//             $site_id=0;
//         }

//         return new Material_model([
//             'material_type' => $material_types->mtype_id,
//             'material_unit' => $unitData->unit_id,
//             'site_id' => $site_id,
//             'material_name' => $row['material_name'],
//             'is_active' => 1
//         ]);
//     }

//     public function rules(): array
//     {
//         $companyId=session()->get('company_id');

//         return [
//             // 'material_name' => ['required', 'string','unique:materials,material_name,company_id'],
//             'material_name' => ['required', 'string',
//             //  Rule::unique('materials','material_name')->where('company_id', session()->get('comapny_id')),],
//             Rule::unique('materials', 'material_name')->where(function ($query) use ($companyId) {
//                 return $query->where('company_id',$companyId);
//             }),

//         ],
//             'material_type' => ['required', 'exists:material_types,material_type'],
//             'material_unit' => ['required', 'exists:units,unit_name']
//         ];
//     }

//     // public function rules(): array
//     // {
//     //     $rules = [];
//     //     $companyId = session()->get('company_id');

//     //     foreach ($this->rows as $index => $row) {

//     //         $site = Sites_model::where('site_name', $row['site_id'])->first();

//     //         if ($site) {
//     //             $siteId = $site->site_id;

//     //             $rules["{$index}.material_name"] = [
//     //                 'required',
//     //                 'string',
//     //                 Rule::unique('materials', 'material_name')
//     //                     ->where(function ($query) use ($companyId, $siteId) {
//     //                         return $query->where('company_id', $companyId)
//     //                                      ->where('site_id', $siteId);
//     //                     })
//     //             ];
//     //         }

//     //         $rules["{$index}.material_type"] = ['required', 'exists:material_types,material_type'];
//     //         $rules["{$index}.material_unit"] = ['required', 'exists:units,unit_name'];
//     //     }

//     //     return $rules;
//     // }

//     public function customValidationMessages()
//     {
//         return [
//             'material_name.required' => 'Material name is required.',
//             'material_type.required' => 'Material type is required.',
//             'material_type.exists' => 'Material type must exist in the material types table.',
//             'material_unit.required' => 'Material unit is required.',
//             'material_unit.exists' => 'Material unit must exist in the units table.',
//         ];
//     }
// }
{
    use Importable, SkipsFailures;

    private $rows = [];

    public function model(array $row)
    {
        // Ensure related data is fetched correctly
        $unitData = Units::where('unit_name', $row['material_unit'])->first();
        $material_types = Material_types_model::where('material_type', $row['material_type'])->first();
        $site = Sites_model::where('site_name', $row['site_id'])->first();
        $site_id = $site ? $site->site_id : 0;

        return new Material_model([
            'material_type' => $material_types->mtype_id,
            'material_unit' => $unitData->unit_id,
            'site_id' => $site_id,
            'material_name' => $row['material_name'],
            'created_by'=>session()->get('user_id'),
            'is_active' => 1
        ]);
    }

    public function rules(): array
    {
        $companyId = session()->get('company_id');
        $rules = [];

        foreach ($this->rows as $index => $row) {
            $site = Sites_model::where('site_name', $row['site_id'])->first();
            $siteId = $site ? $site->site_id : 0;

            $rules["material_name"] = [
                'required',
                'string',
                Rule::unique('materials', 'material_name')
                    ->where(function ($query) use ($companyId, $siteId) {
                        return $query->where('company_id', $companyId)
                                     ->where('site_id', $siteId);
                    })
            ];

            $rules["material_type"] = ['required', 'exists:material_types,material_type'];
            $rules["material_unit"] = ['required', 'exists:units,unit_name'];
            $rules["site_id"] = ['required', 'exists:sites,site_name'];
        }

        return $rules;
    }

    public function customValidationMessages()
    {
        return [
            'material_name.required' => 'Material name is required.',
            'material_name.unique' => 'The material name already exists in the specified site.',
            'material_type.required' => 'Material type is required.',
            'material_type.exists' => 'Material type must exist in the material types table.',
            'material_unit.required' => 'Material unit is required.',
            'material_unit.exists' => 'Material unit must exist in the units table.',
            'site_id.required' => 'Site name is required.',
            'site_id.exists' => 'Site name must exist in the sites table.',
        ];
    }

    public function prepareForValidation($data)
    {
        $this->rows[] = $data;
        return $data;
    }
}
