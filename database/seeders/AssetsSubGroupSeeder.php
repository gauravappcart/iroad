<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssetSubGroup;
use App\Models\AssetGroup;

class AssetsSubGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $subgroups=[
            ['group_name' => 'Electrical Installations',],
            ['group_name' => 'End User Devices'],
            ['group_name' => 'Furniture & Fixtures'],
            ['group_name' => 'Land & Building',
             'sub_groups'=>['Temporary Structure']],
            ['group_name' => 'Office Equipments'],
            ['group_name' => 'Plant & Machinery',
            'sub_groups'=>[
                           'Comm. Constrution Equip',
                           'Comm. Vehicle',
                           'Earth Moving Equip'
                           ]],
            ['group_name' => 'Vehicles'],
            ['group_name' => 'C-WIP P&M',
             'sub_groups'=>[
                'Asset Palletizing Plant and Machinery',
                'Asset Waste to Energy Plant',
                'Asset EOT Crane 15 Ton Cap ( CWIP)',
                'Asset Ms Pipe Hydro Testing Machine CWIP'
                ]]
        ];

        foreach($subgroups as $key=>$data)
        {
            if(!empty($data['sub_groups']))
            {
                $asset_group=AssetGroup::where('group_name',$data['group_name'])->first();
                if(!empty($asset_group))
                {
                    foreach($data['sub_groups'] as $key1=>$sub)
                    {
                        AssetSubGroup::updateOrCreate([
                            'group_id' => $asset_group->id,
                            'sub_group_name' => $sub
                        ], [
                            'group_id' => $asset_group->id,
                            'sub_group_name' => $sub
                        ]);
                    }
                }

            }
         }

    }
}
