<?php

namespace App\Exports;

use App\Models\Designations_model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class DesignationExport implements FromCollection, WithHeadings, WithEvents
{
    public function collection()
    {
        return Designations_model::select('designation_name')->limit(1)->get();
    }

    public function headings(): array
    {
        return [
            'designation_name',
            // Add other column headings as necessary
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

            },
        ];
    }
}
