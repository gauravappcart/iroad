<?php

namespace App\Imports;

use App\Models\Machines_model;
use App\Models\machine_types_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MachineImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {     
    
            $machine_type = machine_types_model::firstOrCreate(
                [
                    'machine_type' => $row['machine_type']
                ],
                [
                    'machine_type' => $row['machine_type']              
                ]
            );
       
            $row['machine_type']=$machine_type->vd_id ? $machine_type->vd_id : $machine_type->mach_type_id;
            $row['machine_cost_per_hrs']=!empty($request['machine_cost']) ? round($request['machine_cost'] / $request['machine_hr']) : "";

            $machine_added = Machines_model::firstOrCreate(
                [
                    'machine_type' => $row['machine_type'],
                    'machine_name'=>$row['machine_name']
                ],
                $row
            );
        
            // return array('name'=>"import");

        // return new Machines_model([ 
        //     'machine_name'=>$row['machine_name'],
        //     'machine_number'=>$row['machine_number'],
        //     'machine_type'=>$row['machine_type'],
        //     'machine_uid'=>$row['machine_uid'],
        //     'machine_hrs'=>$row['machine_hours'],
        //     'machine_cost'=>$row['machine_cost'],
        //     'machine_cost_per_hrs'=>!empty($request['machine_cost']) ? round($request['machine_cost'] / $request['machine_hr']) : ""
        // ]);
    }
}
