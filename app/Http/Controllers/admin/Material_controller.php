<?php

namespace App\Http\Controllers\admin;
use App\GlobalFacades\Facades\UserFacades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Material_model;
use App\Models\Material_types_model;
use App\Models\Companies_model;
use App\Models\Units;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MaterialImport;
use App\Exports\MaterialExport;
use App\Models\Sites_model;
use Illuminate\Support\Facades\DB;

class Material_controller extends Controller
{

    public function index(Request $request)
    {
        // $objects = Material_types_model::with(
        //     ['materials' => function($q) use($request) {
        //         // Query the name field in status table
        //         // $q->where('material_id', '!=', 9); // '=' is optional
        //     }]
        // )->get()->toArray();
        // $materials = Material_model::select('*','materials.material_type as mat_type')->with(
        // ['material_type','companies' => function($q) use($request) {
        //     // Query the name field in status table
        //     // $q->where('material_id', '!=', 9); // '=' is optional
        // }])->get()->toArray();
        // echo "<pre>" ;
        // print_r($materials);
        // exit;
        $result['materials']=Material_model::select('materials.*','material_types.material_type','units.unit_name','materials.site_id as material_site_id','sites.site_name')
        ->leftJoin('sites','sites.site_id','materials.site_id')
                            ->leftJoin("material_types", "materials.material_type", "=", "material_types.mtype_id")
                            ->leftJoin("units", "units.unit_id", "=", "materials.material_unit")
                            ->orderBy('created_at','desc')
                            ->get()->toArray();
        //  dd($result['materials']);
        $result['material_types']=Material_types_model::withTrashed()->get()->toArray();
        $result['units']=Units::where('unit_for',1)->withTrashed()->get();
        $result['sites']=Sites_model::get();
        $result['material_sites_data']=Material_model::distinct()->select('site_id')->get()->toArray();
        // dd(array_column($result['material_sites_data'],'site_id'));
        $result['sites_having_data']=Sites_model::whereIn('site_id',array_column($result['material_sites_data'],'site_id'))->where('company_id',session()->get('company_id'))->get();
        // dd($result['sites_having_data']);
        // dd($result['material_types']);
        $result['selectedUnitId']='';
        $result['selectedSitetId']='';

        return view('admin/materials',$result);
    }

    public function upload_file_old(Request $request)
    {
        Excel::import(new MaterialImport,request()->file('file'));
    }

    public function upload_file(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);
        try {
            $import = new MaterialImport();
            Excel::import($import, $request->file('file'));
            // Check if there are any failures
            if ($import->failures()->isNotEmpty()) {
                return back()->withFailures($import->failures());
            }
            $request->session()->flash('success', 'Materials imported successfully.');
            return back()->with('success', 'Materials imported successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function import_materials(Request $request){

        return view('admin/import_materials');
    }
    public function copy_site_materials(Request $request){

        if($request->from_site==$request->to_site){
            $result=array('status'=>false,'msg'=>'Both From and To Sites can not be same');
            echo json_encode($result);
        }
                // Get the rows you want to copy
                $toMaterial = Material_model::select('material_name')->where('site_id',$request->to_site)->get()->toArray();

                if(count($toMaterial)){
                    $rowsToCopy = Material_model::where('site_id',$request->from_site)->whereNotIn('material_name',array_column($toMaterial,'material_name'))->get();
                }else{
                    $rowsToCopy = Material_model::where('site_id',$request->from_site)->get();
                }
                $to_site=$request->to_site;


                // Prepare the new rows with the necessary changes
                $newRows = $rowsToCopy->map(function ($row) use($to_site){
                    $newRow = $row->replicate(); // Copy the row
                    $newRow->site_id = $to_site; // Modify necessary fields
                    $newRow->material_cost = Null; // Modify necessary fields
                    $newRow->material_cost_per_unit	 = Null; // Modify necessary fields
                    $newRow->created_at = now(); // Modify necessary fields
                    $newRow->updated_at = now(); // Modify necessary fields
                    $newRow->created_by = session()->get('user_id'); // Modify necessary fields
                    $newRow->updated_by = session()->get('user_id'); // Modify necessary fields
                    // Add any other modifications here
                    return $newRow->toArray();
                });

                // Step 3: Insert the new rows into the table
                DB::table('materials')->insert($newRows->toArray());

                return response()->json(['status'=>true,'message' => 'Material copied successfully']);

    }
    public function export_material()
    {
        return Excel::download(new MaterialExport, 'MaterialExport.xlsx');
    }
    public function add_materials(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit;
        $material_type = !empty($request['material_type']) ? (Material_types_model::firstOrCreate(
            [
                'material_type' => $request['material_type']
            ],
            [
                'material_type' => $request['material_type']
            ]
        ) ) : '' ;

        $material_data=array();
        $material_data['material_name']=!empty($request['material_name']) ? $request['material_name'] : "";
        $material_data['material_type']= !empty($material_type) ? ($material_type->vd_id ? $material_type->vd_id : $material_type->mtype_id) : 0 ;  //first time return vd_id then mtype_id
        $material_data['material_unit']=!empty($request['material_unit']) ? $request['material_unit'] : "";
        $material_data['site_id']=!empty($request['material_site']) ? $request['material_site'] : "0";
        $material_data['material_cost']=!empty($request['material_cost']) ? $request['material_cost'] : "";
        $material_data['is_active']=!empty($request['is_active']) ? ($request['is_active']=="Yes" ? 1 : 0) : 1;
        $material_data['created_by'] = session()->get('user_id'); // Modify necessary fields
        $material_data['updated_by']='';
        $material_data = array_filter($material_data, function($a) {
            return $a != '';
        });


        if(empty($request['material_id']))
        {

            $material_added = Material_model::firstOrCreate(
                [
                    'material_type' => $material_data['material_type'],
                    'material_name'=>$request['material_name']
                ],
                $material_data
            );


            if($material_added->wasRecentlyCreated)
            {
                $result=array('status'=>true,'msg'=>'Material added successfully');
            } else {
                $result=array('status'=>false,'msg'=>'Material name already exists');
            }

        } else {

                if(!empty($request['delete']))
                {
                            $deleted_data = Material_model::find($request['material_id'])->delete();

                            $result=array('status'=>true,'msg'=>'Material deleted successfully');

                } else {
                $material_data['updated_by'] = session()->get('user_id'); // Modify necessary fields
                $material_update=Material_model::where('material_id', $request['material_id'])->update($material_data);

                if($material_update)
                {
                    $result=array('status'=>true,'msg'=>'Material updated successfully');
                } else {
                    $result=array('status'=>false,'msg'=>'Something went wrong');
                }
            }

        }

        echo json_encode($result);
    }
}
