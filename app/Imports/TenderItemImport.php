<?php

namespace App\Imports;

use App\Models\TenderItems;
use App\Models\Units;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Validators\Failure;


        class TenderItemImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    protected $additionalData;

    public function __construct($additionalData)
    {
        $this->additionalData = $additionalData;
    }


    public function model(array $row)
    {
        // dd($row[1]);
        $unitData = Units::where('unit_name', $row['tender_item_unit'])->first();

        return new TenderItems([
            'tender_item_info' => $row['tender_item_info'],
            'tender_item_qty' => $row['tender_item_qty'],
            'tender_item_cost' => $row['tender_item_cost_per_unit'],
            'site_id' => $this->additionalData['site_id'],
            'chainage_id' => $this->additionalData['chainage_id'],
            'component_id' => $this->additionalData['component_id'],
            'tender_item_unit' => $unitData->unit_id,
            'is_active'=>1
            // Add other columns as necessary
        ]);
    }





    public function rules(): array
    {
        return [
            // '*.email' => ['email', 'unique:users,email'],
            // '*.name' => ['required', 'string'],
            // '*.password' => ['required', 'string', 'min:8'],

            'tender_item_info' => ['required',],
            'tender_item_qty' => ['required',],
            'tender_item_cost_per_unit' => ['required',],
            'tender_item_unit' =>'required|exists:units,unit_name' // Role column

            // 'site_id' => ['required',],
            // 'chaninage_id' =>['required',],
        ];
    }
}
