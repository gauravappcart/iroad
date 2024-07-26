<?php

namespace App\Exports;


use App\Models\Roles_model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class RoleExport implements FromCollection, WithHeadings, WithEvents
{
    public function collection()
    {
        return Roles_model::select('role_name')->limit(1)->get();
    }

    public function headings(): array
    {
        return [
            'role_name',
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
