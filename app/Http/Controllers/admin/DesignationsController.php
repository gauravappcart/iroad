<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Designations_model;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DesignationImport;
use App\Exports\DesignationExport;


class DesignationsController extends Controller
{
    public function designations_list(Request $request){

        $result['designations']=Designations_model::orderBy('created_at','desc')->get();

        return view('admin/designation_list',$result);
    }
    public function add_designations(Request $request) {
        $designationsData = array();
        $designationsData['designation_name'] = !empty($request['designation_name']) ? strip_tags($request['designation_name']) : "";
        $designationsData['is_active'] = $request['is_active'];
        $designationsData['created_by'] = ($request['role']);
        $designationsData['updated_by'] = ($request['role']);



        // $designationsData['is_active']=!empty($request['is_active']) ? ($request['is_active']=="Yes" ? 1 : 0) : 1;
        $designationsData = array_filter($designationsData, function ($a) {
            return $a != '';
        });
        if (empty($request['designation_id'])) {
            $componentAdded = Designations_model::firstOrCreate(
                [ 'designation_name'=> $designationsData['designation_name'],
                ],
                $designationsData
            );

            if ($componentAdded->wasRecentlyCreated) {
                $result = array('status' => true, 'msg' => 'Designation added successfully');
            } else {
                $result = array('status' => false, 'msg' => 'Designation already exists');
            }
        } else {

            if (!empty($request['delete'])) {
                $deleted_data = Designations_model::find($request['designation_id'])->delete();
                $result = array('status' => true, 'msg' => 'Designations deleted successfully');
            } else {
                // $TenderItemsUpdate = Designations_model::where('designation_id', $request['designation_id'])->update($designationsData);
                // if ($TenderItemsUpdate) {
                //     $result = array('status' => true, 'msg' => 'Designations updated successfully');
                // } else {
                //     $result = array('status' => false, 'msg' => 'Something went wrong');
                // }


                $existingUnit = Designations_model::where('designation_name', $request->input('designation_name'))
                ->where('designation_id', '!=', $request['designation_id']) // Exclude the current record being updated
                // ->withTrashed() // Include soft-deleted records in the check
                ->first();
                if ($existingUnit) {
                    $result = array('status' => false, 'msg' => 'Designations already exists');
                }else{
                    $TenderItemsUpdate = Designations_model::where('designation_id', $request['designation_id'])->update($designationsData);
                     if ($TenderItemsUpdate) {
                    $result = array('status' => true, 'msg' => 'Designations updated successfully');
                } else {
                    $result = array('status' => false, 'msg' => 'Something went wrong');
                }
                }
            }
        }

        echo json_encode($result);
    }



    public function designations_import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);
        try {
            $import = new DesignationImport();
            Excel::import($import, $request->file('file'));
            // Check if there are any failures
            if ($import->failures()->isNotEmpty()) {
                return back()->withFailures($import->failures());
            }
            $request->session()->flash('success', 'Designations imported successfully.');
            return back()->with('success', 'Designations imported successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function import_designations(Request $request){
        return view('admin/import_designations');
    }
    public function export_designations()
    {
        return Excel::download(new DesignationExport, 'DesignationExport.xlsx');
    }

    }
