<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
// use App\Models\Asset_model;
// use App\Models\Asset;
// use App\Models\AssetGroup;
// use App\Models\AssetSubGroup;
// use App\Models\ProfitCenter;
// use App\Models\VehicleTypesModel;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AssetImport;
use Illuminate\Support\Facades\Redirect;

use App\Services\AssetService;
use App\Services\VehicleService;
use App\Services\UserService;
use Illuminate\Support\Carbon;



class Assets_controller extends Controller
{

    protected $assetservice,$vehicleservice,$userservice;
    public function __construct(AssetService $assetservice,VehicleService $vehicleservice,UserService $userservice)
    {
        $this->assetservice = $assetservice;
        $this->vehicleservice = $vehicleservice;
        $this->userservice = $userservice;

    }

    public function assets_list(Request $request){

        $request=$request->all();
        $data['assets']=$this->assetservice->get_assets($request);

        return view('admin/fixed-assets',$data);
    }


    public function add_asset(Request $request){
        $request=$request->all();
         $data['asset_groups']=$this->assetservice->get_asset_group($request);
        //  dd($data);
         $data['profit_centers']=$this->assetservice->get_profit_center($request);
         $data['vehicles_types']=$this->assetservice->get_vehicle_types([]);


         $data['currentYear'] = Carbon::now()->year;
         $data['marchEndDate'] = Carbon::create($data['currentYear'], 3, 31)->toDateString();
         $data['aprilStartDate'] = Carbon::create($data['currentYear'], 4, 1)->toDateString();

        return view('admin/add-assets',$data);

    }

    public function create_asset(Request $request)
    {
         $request=$request->all();
         $assetResposne=$this->assetservice->create_asset($request);

         return response()->json($assetResposne);
    }
    public function update_asset(Request $request)
    {
         $request=$request->all();
        //  dd($request);
         $assetResposne=$this->assetservice->update_asset($request);

         return response()->json($assetResposne);
    }

    public function import_asset_old(Request $request)
    {
         $request=$request->all();
         if(request()->file('import_asset')->extension()=='xlsx')
         {
              Excel::import(new AssetImport, request()->file('import_asset'));
              return Redirect::back()->with(['msg' => 'File imported successfully.']);
         } else {
               return Redirect::back()->withErrors(['msg' => 'Only .xlsx extension allowed.']);
         }
    }
    public function import_asset(Request $request)
{
    // Validate the file extension
    if ($request->file('import_asset')->extension() == 'xlsx') {
        try {
            // Perform the import
            Excel::import(new AssetImport, $request->file('import_asset'));
            return Redirect::back()->with(['msg' => 'File imported successfully.']);
        } catch (\Exception $e) {
            // Handle the custom exception for missing columns
            // return Redirect::back()->withErrors(['msg' => 'Wrong File Imported: ' . $e->getMessage()]);
            return Redirect::back()->withErrors(['msg' => 'Wrong File Imported,Please Download File Before Importing ']);
        }
    } else {
        return Redirect::back()->withErrors(['msg' => 'Only .xlsx extension allowed.']);
    }
}
    public function edit_asset(Request $request)
     {
          $request=$request->all();
          $data['asset_groups']=$this->assetservice->get_asset_group($request);
          $data['profit_centers']=$this->assetservice->get_profit_center($request);
          $data['assets']=$this->assetservice->get_assets($request);
          $data['vehicles_types']=$this->vehicleservice->get_vehicle_types([]);
          $data['suppliers']=$this->userservice->get_suppliers($request);

          // echo "<pre>";
          // print_r($data['assets']);
          // exit;



         return view('admin/add-assets',$data);
    }



    public function delete_asset(Request $request)
    {
         $request=$request->all();
         $assetResposne=$this->assetservice->delete_asset($request);
         return response()->json($assetResposne);
    }



    // public function add_designations(Request $request) {
    //     $designationsData = array();
    //     $designationsData['designation_name'] = !empty($request['designation_name']) ? strip_tags($request['designation_name']) : "";
    //     $designationsData['is_active'] = $request['is_active'];
    //     $designationsData['created_by'] = ($request['role']);
    //     $designationsData['updated_by'] = ($request['role']);



    //     // $designationsData['is_active']=!empty($request['is_active']) ? ($request['is_active']=="Yes" ? 1 : 0) : 1;
    //     $designationsData = array_filter($designationsData, function ($a) {
    //         return $a != '';
    //     });
    //     if (empty($request['designation_id'])) {
    //         $componentAdded = Designations_model::firstOrCreate(
    //             [ 'designation_name'=> $designationsData['designation_name'],
    //             ],
    //             $designationsData
    //         );

    //         if ($componentAdded->wasRecentlyCreated) {
    //             $result = array('status' => true, 'msg' => 'Designation added successfully');
    //         } else {
    //             $result = array('status' => false, 'msg' => 'Designation already exists');
    //         }
    //     } else {

    //         if (!empty($request['delete'])) {
    //             $deleted_data = Designations_model::find($request['designation_id'])->delete();
    //             $result = array('status' => true, 'msg' => 'Designations deleted successfully');
    //         } else {
    //             // $TenderItemsUpdate = Designations_model::where('designation_id', $request['designation_id'])->update($designationsData);
    //             // if ($TenderItemsUpdate) {
    //             //     $result = array('status' => true, 'msg' => 'Designations updated successfully');
    //             // } else {
    //             //     $result = array('status' => false, 'msg' => 'Something went wrong');
    //             // }


    //             $existingUnit = Designations_model::where('designation_name', $request->input('designation_name'))
    //             ->where('designation_id', '!=', $request['designation_id']) // Exclude the current record being updated
    //             // ->withTrashed() // Include soft-deleted records in the check
    //             ->first();
    //             if ($existingUnit) {
    //                 $result = array('status' => false, 'msg' => 'Designations already exists');
    //             }else{
    //                 $TenderItemsUpdate = Designations_model::where('designation_id', $request['designation_id'])->update($designationsData);
    //                  if ($TenderItemsUpdate) {
    //                 $result = array('status' => true, 'msg' => 'Designations updated successfully');
    //             } else {
    //                 $result = array('status' => false, 'msg' => 'Something went wrong');
    //             }
    //             }
    //         }
    //     }

    //     echo json_encode($result);
    // }



    // public function designations_import(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:xlsx,csv',
    //     ]);
    //     try {
    //         $import = new DesignationImport();
    //         Excel::import($import, $request->file('file'));
    //         // Check if there are any failures
    //         if ($import->failures()->isNotEmpty()) {
    //             return back()->withFailures($import->failures());
    //         }
    //         $request->session()->flash('success', 'Designations imported successfully.');
    //         return back()->with('success', 'Designations imported successfully.');
    //     } catch (\Exception $e) {
    //         return back()->with('error', $e->getMessage());
    //     }
    // }


    // public function import_designations(Request $request){
    //     return view('admin/import_designations');
    // }
    // public function export_designations()
    // {
    //     return Excel::download(new DesignationExport, 'DesignationExport.xlsx');
    // }

    }
