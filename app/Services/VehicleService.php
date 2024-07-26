<?php

namespace App\Services;

use App\Models\VehicleTypesModel;
// use App\Models\AssetGroup;
// use App\Models\ProfitCenter;
use App\Models\VehicleModel;


class VehicleService
{

public function create_vehicle($request)
    {
        $response = ['status'=>false,'msg'=>'Data not found.'];

               $vehicle=VehicleModel::firstOrCreate(
                        [
                            'vehicle_no' => $request['vehicle_no'],
                        ],
                        [
                            'type' => $request['type'],
                            'asset_id' => $request['asset_id'] ?? NULL,
                            'vehicle_no' => $request['vehicle_no'],
                            'make_type' => $request['make_type'],
                            'model_name' => $request['model_name'],
                            'asset_group' => $request['asset_group'] ?? NULL,
                            'registration_end' => $request['registration_end'] ?? NULL,
                            'fitness_end' => $request['fitness_end'] ?? NULL,
                            'vehicle_type' => $request['vehicle_type'] ?? NULL,
                            'operator' => $request['operator'] ?? NULL,
                            // 'profit_center' => $request['profit_center'] ?? NULL,
                            'profit_center' => $request['assetLocation']?? NULL,
                            'owner' => $request['owner'] ?? NULL,
                            'book_value' => $request['book_value'] ?? NULL,
                            'depreciation_value' => $request['depreciation_value'] ?? NULL,
                            'reading_in' => $request['reading_in'] ?? NULL,
                            'expected_reading' => $request['expected_reading'] ?? NULL,
                            'min_urea_alert' => $request['min_urea_alert'] ?? NULL,
                            'serv_repair' => $request['serv_repair'] ?? NULL,
                            'status' => $request['status'] ?? NULL,
                            'notes' => $request['notes'] ?? NULL,
                            'description' => $request['description'] ?? NULL,
                            'vehicle_photo' => $request['vehicle_path'] ?? NULL,
                        ]
                    );

                if ($vehicle->wasRecentlyCreated) {

                    if(!empty($request['vehicle_photo']) && empty($request['vehicle_path']))
                    {
                        $filename = sha1(time().$vehicle->id.mt_rand(11111,99999)).'.'.$request['vehicle_photo']->extension();

                        $request['vehicle_photo']->move(public_path('vehicle_photo/'.$vehicle->id), $filename);

                        $vehicle->vehicle_photo='public/vehicle_photo/'.$vehicle->id.'/'.$filename;
                        $vehicle->save();
                    }

                    if(!empty($request['fitness_certificate']))
                    {
                        $filename = sha1(time().$vehicle->id.mt_rand(11111,99999)).'.'.$request['fitness_certificate']->extension();

                        $request['fitness_certificate']->move(public_path('fitness_certificate/'.$vehicle->id), $filename);

                        $vehicle->fitness_certificate='public/fitness_certificate/'.$vehicle->id.'/'.$filename;
                        $vehicle->save();
                    }

                    $response = ['status'=>true,'msg'=>'Vehicle created successfully.'];

                } else {

                        $response = ['status'=>false,'msg'=>'Vehicle No already exists.'];
                }

        return $response;
    }

    public function update_vehicle($request)
    {
        $response = ['status'=>false,'msg'=>'Data not found.'];

        if(!empty($request['vehicle_id']))
        {
            $isvehicleExists=VehicleModel::where('vehicle_no',$request['vehicle_no'])->where('id','!=',$request['vehicle_id'])->first();


            if(empty($isvehicleExists))
            {
            $vehicle=VehicleModel::where('id',$request['vehicle_id'])->first();


            $vehicle->type=$request['type'];
            $vehicle->vehicle_no=$request['vehicle_no'];
            $vehicle->make_type=$request['make_type'];
            $vehicle->model_name=$request['model_name'];
            $vehicle->asset_group=$request['asset_group'] ?? NULL;
            $vehicle->registration_end=$request['registration_end'] ?? NULL;
            $vehicle->fitness_end=$request['fitness_end'] ?? NULL;
            $vehicle->vehicle_type=$request['vehicle_type'] ?? NULL;
            $vehicle->operator=$request['operator'] ?? NULL;
            $vehicle->profit_center=$request['profit_center'] ?? NULL;
            $vehicle->owner=$request['owner'] ?? NULL;
            $vehicle->book_value=$request['book_value'] ?? NULL;
            $vehicle->depreciation_value=$request['depreciation_value'] ?? NULL;
            $vehicle->reading_in=$request['reading_in'] ?? NULL;
            $vehicle->expected_reading=$request['expected_reading'] ?? NULL;
            $vehicle->min_urea_alert=$request['min_urea_alert'] ?? NULL;
            $vehicle->serv_repair=$request['serv_repair'] ?? NULL;
            $vehicle->status=$request['status'] ?? NULL;
            $vehicle->notes=$request['notes'] ?? NULL;
            $vehicle->description=$request['description'] ?? NULL;
            !empty($request['vehicle_path']) ? $vehicle->vehicle_photo=$request['vehicle_path'] : '';

            if ($vehicle->save()) {


                    if(!empty($request['vehicle_photo']) && empty($request['vehicle_path']))
                    {
                        if (file_exists($vehicle->vehicle_photo)) {
                            unlink($vehicle->vehicle_photo);
                        }

                        $filename = sha1(time().$request['vehicle_id'].mt_rand(11111,99999)).'.'.$request['vehicle_photo']->extension();

                        $request['vehicle_photo']->move(public_path('vehicle_photo/'.$request['vehicle_id']), $filename);

                        $vehicle->vehicle_photo='public/vehicle_photo/'.$request['vehicle_id'].'/'.$filename;
                        $vehicle->save();
                    }

                    if(!empty($request['fitness_certificate']))
                    {

                        if (file_exists($vehicle->fitness_certificate)) {
                            unlink($vehicle->fitness_certificate);
                        }

                        $filename = sha1(time().$request['vehicle_id'].mt_rand(11111,99999)).'.'.$request['fitness_certificate']->extension();

                        $request['fitness_certificate']->move(public_path('fitness_certificate/'.$request['vehicle_id']), $filename);

                        $vehicle->fitness_certificate='public/fitness_certificate/'.$request['vehicle_id'].'/'.$filename;
                        $vehicle->save();
                    }

                $response = ['status'=>true,'msg'=>'Vehicle updated successfully.'];
            } else {
                $response = ['status'=>false,'msg'=>'Nothing updated.'];
            }
        } else {
            $response = ['status'=>false,'msg'=>'Vehicle No already exists.'];
        }

        }

        return $response;
    }

    public function get_vehicle_types($request)
    {
        $query= VehicleTypesModel::select('*');

        // if(!empty($request['last_fifteen_days']))
        // {
        //      $profit_centers->with(['vehicles' => function ($vehicles) use ($request) {
        //             $vehicles->select('vehicles.id','vehicles.profit_center','vehicles.status',DB::raw('COUNT(vehicles.status) as status_count'));
        //             $vehicles->groupBy('vehicles.profit_center','vehicles.status');
        //       }]);
        // }

        $vehcleTypes=$query->get()->toArray();
        return $vehcleTypes;
    }
}
