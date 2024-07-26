<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VehicleTypesModel;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types=[['name' => 'HYVA'],
                ['name' => 'TM'],
                ['name' => 'TRAILER'],
                ['name' => 'PICKUP'],
                ['name' => 'TANKER'],
                ['name' => 'EXCAVATOR'],
                ['name' => 'BACKHOE LOADER'],
                ['name' => 'BACKHOE'],
                ['name' => 'TRACTOR'],
                ['name' => 'AJAX'],
                ['name' => 'JCB3DX'],
                ['name' => 'HYDRA'],
                ['name' => 'FARANA'],
                ['name' => 'JCB-JS-205'],
                ['name' => 'XCMGXE500LR'],
                ['name' => 'ROLAR'],
                ['name' => 'CAMPER'],
                ['name' => 'BREAKER'],
                ['name' => 'BUCKET'],
                ['name' => 'CAR-ERTIGA'],
                ['name' => 'TATA-HITACHI-370'],
                ['name' => 'TOWER LIGHT DG'],
                ['name' => 'DG-125KV'],
                ['name' => '82 HP PUMP'],
                ['name' => 'DG-500KV'],
                ['name' => 'BLASTING'],
                ['name' => 'APPE'],
                ['name' => 'CAR-BOLERO'],
                ['name' => 'CAR-MARAZZO'],
                ['name' => 'CAR-SWIFT'],
                ['name' => 'CAR-SCALA'],
                ['name' => 'CAR-CRETA'],
                ['name' => 'CAR-SCROSS'],
                ['name' => 'TATA HARRIEAR'],
                ['name' => 'XUV 500'],
                ['name' => 'SCORPIO S5'],
                ['name' => 'GENRATOR'],
                ['name' => 'COMP-VIBRATOR'],
                ['name' => 'AIR-COMPRESSOR'],
                ['name' => 'CONCRETE-PUMP'],
                ['name' => 'GROOVE CUTTER'],
                ['name' => 'LIFT'],
                ['name' => 'STOVE-FOOD (MISC.)'],
                ['name' => 'JCB'],
            ];

        foreach($types as $key=>$data)
        {
            VehicleTypesModel::updateOrCreate(['name' => $data['name']], $data);
        }
    }
}
