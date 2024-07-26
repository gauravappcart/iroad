<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfitCenter;

class ProfitCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $centers=[['location' => 'Mulund'],
                      ['location' => 'Aurangabad']
                     ];

        foreach($centers as $key=>$center)
        {
            ProfitCenter::updateOrCreate(['location' => $center['location']], $center);
        }
    }
}
