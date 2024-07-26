<?php

namespace App\Exports;

// use App\Models\Units;
use App\Models\Machine_types_model;
use App\Models\Machines_model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class MachineExport implements FromCollection, WithHeadings, WithEvents
{
    public function collection()
    {
        return Machines_model::select('machine_name','machine_type')->limit(0)->get();
    }

    public function headings(): array
    {
        return [
            'machine_type', // Column 1 with dropdown
            'machine_name',
            'machine_number',
            'machine_uid',
            'machine_hrs',
            'machine_cost',
            // 'machine_cost_per_hrs'
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
                $dropdownOptionsData = Machine_types_model::select('machine_type')->get()->toArray();
                $dropdownOptions=array_column($dropdownOptionsData,'machine_type');
                // Convert options to a comma-separated string
                $dropdownString = implode(',', $dropdownOptions);

                // Apply dropdown to the first column (A)
                $validation = $sheet->getCell('A2')->getDataValidation();
                $validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                $validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
                $validation->setAllowBlank(false);
                $validation->setShowInputMessage(true);
                $validation->setShowErrorMessage(true);
                $validation->setShowDropDown(true);
                $validation->setFormula1('"' . $dropdownString . '"');

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
