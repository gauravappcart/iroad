<?php

namespace App\Services;

use App\Models\VehicleTypesModel;
use App\Models\AssetGroup;
use App\Models\ProfitCenter;
use App\Models\VehicleModel;
use App\Models\Asset;
use App\Services\VehicleService;
use Illuminate\Support\Carbon;



class AssetService
{
    protected $vehicleservice;
    public function __construct(VehicleService $vehicleservice)
    {
        $this->vehicleservice = $vehicleservice;
    }

    public function get_assets($request)
    {
        if(empty($request['fields']))
        {
            $request['fields']=request()->input('fields', ['assets.*','assets_group.group_name','profit_center.location','vehicles.registration_end','vehicles.fitness_end']);
        }
         $assets=Asset::select($request['fields']);
         $assets->leftjoin('assets_group', 'assets.asset_group', '=', 'assets_group.id');
         $assets->leftjoin('profit_center', 'assets.assetLocation', '=', 'profit_center.id');
         $assets->leftjoin('vehicles', 'assets.id', '=', 'vehicles.asset_id');
         $assets->with(['vehicle_details' => function ($vehicle_details) use ($request) {
            $vehicle_details->select('vehicles.*');
            // $vehicle_details->with(['job_details' => function ($job_details) use ($request) {
            //     $job_details->select('jobs_assign.*','jobs.site_address','crews.first_name','crews.last_name');
            //     $job_details->leftjoin('jobs', 'jobs_assign.job_id', '=', 'jobs.id');
            //     $job_details->leftjoin('crews', 'jobs.supervisor', '=', 'crews.id');
            // }]);
         }]);
         $assets->with(['sub_group' => function ($sub_group) use ($request) {
            $sub_group->select('assets_sub_group.id','assets_sub_group.group_id','assets_sub_group.sub_group_name');
         }]);
        //  $assets->with(['supplier' => function ($supplier) use ($request) {
        //     $supplier->select('suppliers.id','suppliers.supplier_name');
        //  }]);

        //  if(!empty($request['asset_transactions'])) //from asset table
        //  {
        //      $assets->with(['asset_transactions' => function ($asset_transactions) use ($request) {
        //         $asset_transactions->select('asset_transactions.id','asset_transactions.asset_id','asset_transactions.gross_value_start','asset_transactions.gross_value_end','asset_transactions.gross_value_start_date');
        //         !empty($request['fy']) ? $asset_transactions->where('asset_transactions.gross_value_start_date',$request['fy']) :'';

        //      }]);
        //  }

         if(!empty($request['check_end_of_life'])) //from asset table
         {
            empty($request['is_today']) ? $assets->where('assets.end_life_date','<=',Carbon::now()->addMonths(3)) : $assets->where('assets.end_life_date',date('Y-m-d'));
         }
         if(!empty($request['check_upcoming_maintenance'])) //from asset table
         {
            empty($request['is_today']) ? $assets->where('assets.upcoming_maintenance','<=',Carbon::now()->addMonths(1)) : $assets->where('assets.upcoming_maintenance',date('Y-m-d'));
         }
         if(!empty($request['check_insurance_end']))  //from asset table
         {
            empty($request['is_today']) ? $assets->where('assets.insurance_end','<=',Carbon::now()->addMonths(6)) : $assets->where('assets.insurance_end',date('Y-m-d'));
         }
         if(!empty($request['check_registration_end']))  //from asset table
         {
            empty($request['is_today']) ? $assets->where('vehicles.registration_end','<=',Carbon::now()->addMonths(6)) : $assets->where('vehicles.registration_end',date('Y-m-d'));
         }
         if(!empty($request['check_fitness_end']))  //from asset table
         {
            empty($request['is_today']) ? $assets->where('vehicles.fitness_end','<=',Carbon::now()->addMonths(6)) : $assets->where('vehicles.fitness_end',date('Y-m-d'));
         }
         if(!empty($request['check_reschedule_payment']))  //from asset table
         {
            $assets->where('assets.id',0);
            // $assets->where('vehicles.emi_date','<=',Carbon::now()->addMonths(6));
         }

         if(!empty($request['only_loan'])) //from asset table
         {
            $assets->whereNotNull('assets.loan_amount')->Where('assets.loan_amount', '!=', 0);
         }

         !empty($request['asset_id']) ? $assets->where('assets.id',$request['asset_id']) : '';
         !empty($request['asset_group_id']) ? $assets->where('assets.asset_group',$request['asset_group_id']) : '';
         $assets=!empty($request['asset_id']) ? $assets->first()->toArray() : $assets->get()->toArray();


         return $assets;
    }

    public function get_asset_group($request)
    {
         $asset_groups=AssetGroup::select('*');

         $asset_groups->with(['assets_sub_group' => function ($assets_sub_group) use ($request) {
            $assets_sub_group->select('assets_sub_group.*');
         }]);

         $asset_groups->withCount(['assets' => function ($rocking) use ($request) {
         }]);


         if(!empty($request['assets'])) //from asset table
         {
             $asset_groups->with(['assets' => function ($asset_groups) use ($request) {
                 $asset_groups->select('assets.id','assets.asset_group','assets.purchase_value');
                if(!empty($request['asset_transactions'])) //from asset table
                {
                    $asset_groups->with(['asset_transactions' => function ($asset_transactions) use ($request) {
                        $asset_transactions->select('asset_transactions.id','asset_transactions.asset_id','asset_transactions.gross_value_start','asset_transactions.gross_value_end','asset_transactions.gross_value_start_date');
                        !empty($request['fy']) ? $asset_transactions->where('asset_transactions.gross_value_start_date',$request['fy']) :'';
                    }]);
                }
            }]);
        }

         $asset_groups=$asset_groups->get()->toArray();

        //  echo "<pre>";
        //  print_r($asset_groups);
        //  exit;

         return $asset_groups;

    }


    public function get_profit_center($request)
    {
         $profit_centers=ProfitCenter::select('profit_center.*');

         if(!empty($request['status']))
         {
              $profit_centers->with(['vehicles' => function ($vehicles) use ($request) {
                     $vehicles->select('vehicles.id','vehicles.profit_center','vehicles.status',DB::raw('COUNT(vehicles.status) as status_count'));
                     $vehicles->groupBy('vehicles.profit_center','vehicles.status');
               }]);
         }
         if(!empty($request['site_address']))
         {
            $profit_centers->with(['site_address' => function ($site_address) use ($request) {
                $site_address->select('site_address.*');
            }]);
         }
         if(!empty($request['petroleum']))
         {
            $profit_centers->with(['petroleum' => function ($petroleum) use ($request) {
                $petroleum->select('petroleum.*');
             }]);
         }

         $profit_centers=$profit_centers->get()->toArray();

         return $profit_centers;
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


    public function create_asset($request)
    {
                $response = ['status'=>false,'msg'=>'Data not found.'];

                // $asset=Asset::firstOrCreate(
                //             [
                //                 'asset_name' => $request['asset_name'],
                //             ],


                $asset=Asset::Create(
                            [
                                'asset_name' => $request['asset_name'],
                                'put_to_use' => $request['put_to_use']?? NULL,
                                'asset_group' => $request['asset_group']?? NULL,
                                'asset_sub_group' => $request['asset_sub_group']?? NULL,
                                'assetLocation' => $request['assetLocation']?? NULL,
                                'profit_center' => $request['assetLocation']?? NULL,
                                'asset_life_years' => $request['asset_life_years']?? NULL,
                                'end_life_date' => $request['end_life_date']?? NULL,
                                'insurance_end' => $request['insurance_end']?? NULL,
                                'upcoming_maintenance' => $request['upcoming_maintenance']?? NULL,
                                'maintenance_frequency' => $request['maintenance_frequency']?? NULL,
                                'asset_quantity' => $request['asset_quantity']?? NULL,
                                'purchase_value' => $request['purchase_value']?? NULL,
                                'purchase_description' => $request['purchase_description']?? NULL,
                                'sale_date' => $request['sale_date']?? NULL,
                                'sale_value' => $request['sale_value']?? NULL,
                                'sale_description' => $request['sale_description']?? NULL,
                                'supplier' => 1,
                                'invoice_number' => $request['invoice_number']?? NULL,
                                'invoice_date' => $request['invoice_date']?? NULL,
                                'finance_bank_name' => $request['finance_bank_name']?? NULL,
                                'account_no' => $request['account_no']?? NULL,
                                'loan_amount' => $request['loan_amount']?? NULL,
                                'loan_start_date' => $request['loan_start_date']?? NULL,
                                'loan_end_date' => $request['loan_end_date']?? NULL,
                                'roi' => $request['roi']?? NULL,
                                'emi_amount' => $request['emi_amount']?? NULL,
                                'emi_date' => $request['emi_date']?? NULL,
                                'first_gross_value' => $request['first_gross_value']?? NULL,
                                'addition_during_period' => $request['addition_during_period']?? NULL,
                                'deduction' => $request['deduction']?? NULL,
                                'second_gross_value' => $request['second_gross_value']?? NULL,
                                'acc_dep' => $request['acc_dep']?? NULL,
                                'dep_deduction' => $request['dep_deduction']?? NULL
                            ]
                        );


                    if ($asset->wasRecentlyCreated) {

                        if(!empty($request['insurance_cert']))
                        {
                            $filename = sha1(time().$asset->id.mt_rand(11111,99999)).'.'.$request['insurance_cert']->extension();

                            $request['insurance_cert']->move(public_path('insurance_cert/'.$asset->id), $filename);

                            $asset->insurance_cert='public/insurance_cert/'.$asset->id.'/'.$filename;
                            $asset->save();

                            $request['vehicle_path']='public/insurance_cert/'.$asset->id.'/'.$filename;
                        }

                        if(!empty($request['vehicle_photo']))
                        {
                            $filename = sha1(time().$asset->id.mt_rand(11111,99999)).'.'.$request['vehicle_photo']->extension();

                            $request['vehicle_photo']->move(public_path('asset_photo/'.$asset->id), $filename);

                            $asset->asset_photo='public/asset_photo/'.$asset->id.'/'.$filename;
                            $asset->save();

                            $request['vehicle_path']='public/asset_photo/'.$asset->id.'/'.$filename;
                        }

                        if(!empty($request['vehicle_no']))
                        {
                            $request['asset_id']=$asset->id;
                            $request['profit_center']=$request['assetLocation'];
                            $createVehicleResponse=$this->vehicleservice->create_vehicle($request);
                        }

                        if(!empty($request['invoice_file']))
                        {
                            $filename = sha1(time().$asset->id.mt_rand(11111,99999)).'.'.$request['invoice_file']->extension();

                            $request['invoice_file']->move(public_path('asset_invoice_file/'.$asset->id), $filename);

                            $asset->invoice_file='public/asset_invoice_file/'.$asset->id.'/'.$filename;
                            $asset->save();
                        }

                        $response = ['status'=>true,'msg'=>'Asset created successfully.'];

                    } else {

                            $response = ['status'=>false,'msg'=>'Asset Name already exists.'];
                    }

            return $response;
        }


    public function update_asset($request)
    {
        $response = ['status'=>false,'msg'=>'Data not found.'];

        // echo "<pre>";
        // print_r($request);
        // exit;
        if(!empty($request['asset_id']))
        {
            $isassetExists=Asset::where('asset_name',$request['asset_name'])->where('id','!=',$request['asset_id'])->first();

            if(empty($isassetExists))
            {
            $asset=Asset::where('id',$request['asset_id'])->first();

            $asset->asset_name=$request['asset_name'];
            $asset->put_to_use=$request['put_to_use'] ?? NULL;
            $asset->asset_group=$request['asset_group'] ?? NULL;
            $asset->asset_sub_group=$request['asset_sub_group'] ?? NULL;
            $asset->assetLocation=$request['assetLocation'] ?? NULL;
            $asset->asset_life_years=$request['asset_life_years'] ?? NULL;
            $asset->insurance_end=$request['insurance_end'] ?? NULL;
            $asset->upcoming_maintenance=$request['upcoming_maintenance'] ?? NULL;
            $asset->maintenance_frequency=$request['maintenance_frequency'] ?? NULL;
            $asset->asset_quantity=$request['asset_quantity'] ?? NULL;
            $asset->purchase_value=$request['purchase_value'] ?? NULL;
            $asset->purchase_description=$request['purchase_description'] ?? NULL;
            $asset->sale_date=$request['sale_date'] ?? NULL;
            $asset->sale_value=$request['sale_value'] ?? NULL;
            $asset->sale_description=$request['sale_description'] ?? NULL;
            $asset->supplier=1;
            $asset->invoice_number=$request['invoice_number'] ?? NULL;
            $asset->invoice_date=$request['invoice_date'] ?? NULL;
            $asset->finance_bank_name=$request['finance_bank_name'] ?? NULL;
            $asset->account_no=$request['account_no'] ?? NULL;
            $asset->loan_amount=$request['loan_amount'] ?? NULL;

            $asset->end_life_date=$request['end_life_date'] ?? NULL;
            $asset->loan_start_date=$request['loan_start_date'] ?? NULL;
            $asset->loan_end_date=$request['loan_end_date'] ?? NULL;
            $asset->roi=$request['roi'] ?? NULL;
            $asset->emi_amount=$request['emi_amount'] ?? NULL;
            $asset->emi_date=$request['emi_date'] ?? NULL;
            $asset->first_gross_value=$request['first_gross_value'] ?? NULL;
            $asset->addition_during_period=$request['addition_during_period'] ?? NULL;
            $asset->deduction=$request['deduction'] ?? NULL;
            $asset->second_gross_value=$request['second_gross_value'] ?? NULL;
            $asset->acc_dep=$request['acc_dep'] ?? NULL;
            $asset->dep_deduction=$request['dep_deduction'] ?? NULL;

            if(!empty($request['vehicle_photo']))
            {

                $filename = sha1(time().$request['asset_id'].mt_rand(11111,99999)).'.'.$request['vehicle_photo']->extension();

                $request['vehicle_photo']->move(public_path('asset_photo/'.$request['asset_id']), $filename);

                $asset->asset_photo='public/asset_photo/'.$request['asset_id'].'/'.$filename;

                $request['vehicle_path']='public/asset_photo/'.$request['asset_id'].'/'.$filename;

            }


            if(!empty($request['vehicle_id']))
            {
                $request['profit_center']=$request['assetLocation'];
                $createVehicleResponse=$this->vehicleservice->update_vehicle($request);
            }


            if ($asset->save()) {

                if(!empty($request['insurance_cert']))
                {

                    if (file_exists($asset->insurance_cert)) {
                        unlink($asset->insurance_cert);
                    }

                    $filename = sha1(time().$asset->id.mt_rand(11111,99999)).'.'.$request['insurance_cert']->extension();

                    $request['insurance_cert']->move(public_path('insurance_cert/'.$asset->id), $filename);

                    $asset->insurance_cert='public/insurance_cert/'.$asset->id.'/'.$filename;
                    $asset->save();

                    $request['vehicle_path']='public/insurance_cert/'.$asset->id.'/'.$filename;
                }

                    if(!empty($request['invoice_file']))
                    {
                        if (file_exists($asset->invoice_file)) {
                            unlink($asset->invoice_file);
                        }

                        $filename = sha1(time().$request['asset_id'].mt_rand(11111,99999)).'.'.$request['invoice_file']->extension();

                        $request['invoice_file']->move(public_path('asset_invoice_file/'.$request['asset_id']), $filename);

                        $asset->invoice_file='public/asset_invoice_file/'.$request['asset_id'].'/'.$filename;
                        $asset->save();
                    }

                $response = ['status'=>true,'msg'=>'Asset updated successfully.'];
            } else {
                $response = ['status'=>false,'msg'=>'Nothing updated.'];
            }
        } else {
            $response = ['status'=>false,'msg'=>'Asset Name already exists.'];
        }

        }

        return $response;
    }
    public function delete_asset($request)
        {
            $response = ['status'=>false,'msg'=>'Data not found.'];


            if(!empty($request['asset_id']))
            {
                Asset::where('id',$request['asset_id'])->delete();
                VehicleModel::where('asset_id',$request['asset_id'])->delete();

                $response = ['status'=>true,'msg'=>'Asset deleted successfully.'];
            }

            return $response;
        }
}
