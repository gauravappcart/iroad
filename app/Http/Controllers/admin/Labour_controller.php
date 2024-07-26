<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Labour;

class Labour_controller extends Controller
{
    public function index()
    {
        // return view('admin/labours',['user_role'=>1]);

        // $result['labours']=Labour::withTrashed()->get();
        $result['labours']=Labour::orderBy('created_at','desc')->get();

        $result['selectedUnitId']='';

        return view('admin/labours',$result);

    }
    public function add_labour_type(Request $request) {
        // dd($request->all());


        // $request->validate([
        //     'labour_type' => 'required|unique:labours,labour_type',

        // ]);
        $unitsData = array();
        $unitsData['labour_type'] = !empty($request['labour_type']) ? strip_tags($request['labour_type']) : "";
        $unitsData['is_active'] = $request['is_active'];
        $unitsData['created_by'] = ($request['role']);
        $unitsData['updated_by'] = ($request['role']);



        if (empty($request['labour_id'])) {
            $componentAdded = Labour::firstOrCreate(
                [ 'labour_type'=> $unitsData['labour_type'],
                ],
                $unitsData
            );

            if ($componentAdded->wasRecentlyCreated) {
                $result = array('status' => true, 'msg' => 'Labour Type added successfully');
            } else {
                $result = array('status' => false, 'msg' => 'Labour Type already exists');
            }
        } else {

            if (!empty($request['delete'])) {
                $deleted_data = Labour::find($request['labour_id'])->delete();
                $result = array('status' => true, 'msg' => 'Labour Type deleted successfully');
            } else {
                // $TenderItemsUpdate = Labour::where('labour_id', $request['labour_id'])->update($unitsData);
                // if ($TenderItemsUpdate) {
                //     $result = array('status' => true, 'msg' => 'Labour Type updated successfully');
                // } else {
                //     $result = array('status' => false, 'msg' => 'Something went wrong');
                // }

                $existingUnit = Labour::where('labour_type', $request['labour_type'])
                ->where('labour_id', '!=', $request['labour_id']) // Exclude the current record being updated
                // ->withTrashed() // Include soft-deleted records in the check
                ->first();
                if ($existingUnit) {
                    $result = array('status' => false, 'msg' => 'Labour Type already exists');
                }else{
                    $TenderItemsUpdate = Labour::where('labour_id', $request['labour_id'])->update($unitsData);
                     if ($TenderItemsUpdate) {
                    $result = array('status' => true, 'msg' => 'Labour Type updated successfully');
                } else {
                    $result = array('status' => false, 'msg' => 'Something went wrong');
                }
                }


            }
        }

        echo json_encode($result);
    }
}
