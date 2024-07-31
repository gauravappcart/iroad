<?php

namespace App\Exports;

use App\Models\Units;
use App\Models\Material_model;
use App\Models\Material_types_model;
use App\Models\Sites_model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class MaterialExport implements FromCollection, WithHeadings, WithEvents
{
    public function collection()
    {
        return Material_model::select('material_name','material_type','material_unit')->limit(0)->get();
    }

    public function headings(): array
    {
        return [
            'material_type', // Column 1 with dropdown
            'material_unit',
            'material_name',
            'site_id',
            'material_cost',
            // Add other column headings as necessary
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                //For Material Units
                // Define dropdown options
                $dropdownOptionsData = Units::where('unit_for',1)->select('unit_name')->get()->toArray();
                $dropdownOptions=array_column($dropdownOptionsData,'unit_name');
                // Convert options to a comma-separated string
                $dropdownString = implode(',', $dropdownOptions);




                // Apply dropdown to the first column (A)
                $validation = $sheet->getCell('B2')->getDataValidation();
                $validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                $validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
                $validation->setAllowBlank(false);
                $validation->setShowInputMessage(true);
                $validation->setShowErrorMessage(true);
                $validation->setShowDropDown(true);
                $validation->setFormula1('"' . $dropdownString . '"');


                 //For Material Type

                 $dropdownOptionsData2 = Material_types_model::select('material_type')->get()->toArray();
                 $dropdownOptions2=array_column($dropdownOptionsData2,'material_type');
                 // Convert options to a comma-separated string
                 $dropdownString2 = implode(',', $dropdownOptions2);

                 // Apply dropdown to the first column (A)
                 $validation2 = $sheet->getCell('A2')->getDataValidation();
                 $validation2->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                 $validation2->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
                 $validation2->setAllowBlank(false);
                 $validation2->setShowInputMessage(true);
                 $validation2->setShowErrorMessage(true);
                 $validation2->setShowDropDown(true);
                 $validation2->setFormula1('"' . $dropdownString2 . '"');



                  // Define dropdown options
                  if(session()->get('company_id')){
                    $company_id=session()->get('company_id');
                  }else{
                    $company_id=1;
                  }
                  $dropdownOptionsData3 = Sites_model::where('company_id',$company_id)->get()->toArray();
                  $dropdownOptions3=array_column($dropdownOptionsData3,'site_name');
                  // Convert options to a comma-separated string
                  $dropdownString3 = implode(',', $dropdownOptions3);

                   // Apply dropdown to the first column (A)
                 $validation2 = $sheet->getCell('D2')->getDataValidation();
                 $validation2->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                 $validation2->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
                 $validation2->setAllowBlank(false);
                 $validation2->setShowInputMessage(true);
                 $validation2->setShowErrorMessage(true);
                 $validation2->setShowDropDown(true);
                 $validation2->setFormula1('"' . $dropdownString3 . '"');

                // Apply the same validation to a range of cells (e.g., A2:A100)
                // for ($i = 2; $i <= 100; $i++) {
                //     $sheet->getCell("B$i")->setDataValidation(clone $validation);
                // }
                // for ($i = 2; $i <= 100; $i++) {
                //     $sheet->getCell("A$i")->setDataValidation(clone $validation2);
                // }
                // $sheet->getCell("A2")->setDataValidation(clone $validation);
            },
        ];
    }
}
