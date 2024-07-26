<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssetGroup;

class AssessGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups=[['group_name' => 'Electrical Installations'],
                ['group_name' => 'End User Devices'],
                ['group_name' => 'Furniture & Fixtures'],
                ['group_name' => 'Land & Building'],
                ['group_name' => 'Office Equipments'],
                ['group_name' => 'Plant & Machinery'],
                ['group_name' => 'Vehicles'],
                ['group_name' => 'C-WIP P&M']
            ];

        foreach($groups as $key=>$data)
        {
            AssetGroup::updateOrCreate(['group_name' => $data['group_name']], $data);
        }
    }
}
