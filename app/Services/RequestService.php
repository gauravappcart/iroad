<?Php
// app/Services/RequestService.php

namespace App\Services;

use App\Models\MaterialRequest;
use App\Models\LabourRequest;
use App\Models\AssetRequest;
use App\Models\AssignRequestMaterial;
use App\Models\SitePlanMaterial;

class RequestService
{
    public function getMaterialRequests()
    {
        return MaterialRequest::with(['material', 'material_type', 'site', 'site_plan_material'])
            ->where('is_active', 1)
            ->orderBy('material_requests.created_at', 'desc')
            ->get()
            ->toArray();
    }

    public function getLabourRequests()
    {
        return LabourRequest::with(['labour_type', 'site', 'site_plan_labour'])
            ->where('is_active', 1)
            ->orderBy('labour_requests.created_at', 'desc')
            ->get()
            ->toArray();
    }

    public function getAssetRequests()
    {
        return AssetRequest::with(['vehical_type', 'site', 'site_plan_asset'])
            ->where('is_active', 1)
            ->orderBy('asset_requests.created_at', 'desc')
            ->get()
            ->toArray();
    }

    public function assignRequiredMaterial($data,$request){
        // dd($request);
        // dd($data);

        // "_token" => "g24X3tMhTM7yYZpnxWdArFnRsUcRPQ9MOP9sT6Fp"
        // "material_request_id" => "1"
        // "material_required_quantity" => "50"
        // "material_available_quantity" => "80"
        // "assign_quantity" => "33"
        // "role" => "admin"


        if($request['material_request_id']){
            $reqest_data=MaterialRequest::where('material_request_id',$request['material_request_id'])->where('is_active',1)->get()->toArray();
            if($reqest_data){
                // dd($reqest_data[0]['material_id']);
                // $query=SitePlanMaterial::select('*');
                // $query->with(['material' => function ($material) use ($request) {
                //     $material->select('*');
                //     $material->with(['unit' => function ($unit) use ($request) {
                //         $unit->select('*');
                //     }]);
                //  }]);
                //  $query->where('material_id',$reqest_data[0]['material_id']);
                //  $site_plan_material_data=$query->get()->toArray();

                 $site_plan_material_data=SitePlanMaterial::with(['material.unit'])->where('material_id',$reqest_data[0]['material_id'])->get()->toArray();
                // dd($site_plan_material_data);
                // dd($site_plan_material_data[0]['material']['unit']['unit_name']);
                if($request['assign_quantity']>$site_plan_material_data[0]['quantity']){
                    return [
                        'status' => false,
                        'message' => 'Assign quantity exceeds the material available quantity.There is only '.$site_plan_material_data[0]['quantity'].' '. $site_plan_material_data[0]['material']['unit']['unit_name'] .' material available.',
                    ];

                }
            }
        }


        if($request['material_request_id']){
            $totalReceivedQuantity = AssignRequestMaterial::where('material_request_id', $request['material_request_id'])->where('is_active',1)
                ->sum('received_quantity');
        }

        // Check if the total received quantity plus the new assign quantity exceeds the required quantity
        if ($totalReceivedQuantity +  $request['assign_quantity'] > $request['material_required_quantity']) {
            return [
                'status' => false,
                'message' => 'Assign quantity exceeds the material required quantity.',
            ];
        }else{

            $assignRequestMaterial = new AssignRequestMaterial();
            $assignRequestMaterial->material_request_id = $request['material_request_id'];
            $assignRequestMaterial->request_quantity = $request['material_required_quantity'];
            $assignRequestMaterial->received_quantity = $request['assign_quantity'];
            $assignRequestMaterial->received_by =  $request['role']; // Adjust this if you have a user role or name
            $assignRequestMaterial->created_by =  $request['role']; // Adjust this if you have a user role or name
            $assignRequestMaterial->updated_by =  $request['role']; // Adjust this if you have a user role or name
            $assignRequestMaterial->received_date = now();
            $assignRequestMaterial->save();



            SitePlanMaterial::where('material_id',$reqest_data[0]['material_id'])
                            ->update(['quantity'=>$site_plan_material_data[0]['quantity']-$request['assign_quantity']]);
            return [
                'status' => true,
                'message' => 'Success',
            ];
        }
    }
}
