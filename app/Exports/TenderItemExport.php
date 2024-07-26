<?php

namespace App\Exports;

use App\Models\Units;
use App\Models\TenderItems;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class TenderItemExport implements FromCollection, WithHeadings, WithEvents
{
    public function collection()
    {
        return TenderItems::select('tender_item_info','tender_item_qty','tender_item_cost')->limit(0)->get();
    }

    public function headings(): array
    {
        return [
            'tender_item_unit', // Column 1 with dropdown
            'tender_item_info',
            'tender_item_qty',
            'tender_item_cost_per_unit',
            // Add other column headings as necessary
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Define dropdown options
                $dropdownOptionsData = Units::where('unit_for',1)->select('unit_name')->get()->toArray();
        $dropdownOptions=array_column($dropdownOptionsData,'unit_name');
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
                //     $sheet->getCell("A$i")->setDataValidation(clone $validation);
                // }
                // $sheet->getCell("A2")->setDataValidation(clone $validation);
            },
        ];
    }
}
