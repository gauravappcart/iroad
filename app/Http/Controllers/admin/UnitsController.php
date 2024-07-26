<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Units;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function units_list(Request $request){

        $result['units']=Units::orderBy('created_at','desc')->get();

        $result['selectedUnitId']=Units::all();

        return view('admin/unit_list',$result);
    }
    public function add_units(Request $request) {
        // dd($request->all());
        $unitsData = array();
        $unitsData['unit_name'] = !empty($request['unit_name']) ? strip_tags($request['unit_name']) : "";
        $unitsData['is_active'] = $request['is_active'];
        $unitsData['unit_for'] = $request['unit_for'];
        $unitsData['unit_id'] = !empty($request['unit_id']) ? ($request['unit_id']) : "";


        $unitsData['created_by'] = ($request['role']);
        $unitsData['updated_by'] = ($request['role']);



        // $unitsData['is_active']=!empty($request['is_active']) ? ($request['is_active']=="Yes" ? 1 : 0) : 1;
        $unitsData = array_filter($unitsData, function ($a) {
            return $a != '';
        });
        if (empty($request['unit_id'])) {
            $componentAdded = Units::firstOrCreate(
                [ 'unit_name'=> $unitsData['unit_name'],
                ],
                $unitsData
            );

            if ($componentAdded->wasRecentlyCreated) {
                $result = array('status' => true, 'msg' => 'Unit added successfully');
            } else {
                $result = array('status' => false, 'msg' => 'Unit already exists');
            }
        } else {

            if (!empty($request['delete'])) {
                $deleted_data = Units::find($request['unit_id'])->delete();
                $result = array('status' => true, 'msg' => 'Unit deleted successfully');
            } else {
                // $TenderItemsUpdate = Units::where('unit_id', $request['unit_id'])->update($unitsData);
                  // if ($TenderItemsUpdate) {
                //     $result = array('status' => true, 'msg' => 'Unit updated successfully');
                // } else {
                //     $result = array('status' => false, 'msg' => 'Something went wrong');
                // }


                $existingUnit = Units::where('unit_name', $request->input('unit_name'))
                ->where('unit_id', '!=', $request['unit_id']) // Exclude the current record being updated
                // ->withTrashed() // Include soft-deleted records in the check
                ->first();
                if ($existingUnit) {
                    $result = array('status' => false, 'msg' => 'Unit already exists');
                }else{

                    $TenderItemsUpdate = Units::where('unit_id', ($request['unit_id']))->update($unitsData);
                     if ($TenderItemsUpdate) {
                    $result = array('status' => true, 'msg' => 'Unit updated successfully');
                } else {
                    $result = array('status' => false, 'msg' => 'Something went wrong');
                }
                }

            }
        }

        echo json_encode($result);
    }
}
