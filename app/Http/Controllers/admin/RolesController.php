<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\roles;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RoleImport;
use App\Exports\RoleExport;
use App\Models\Roles_model;

class RolesController extends Controller
{
    public function roles_list(Request $request){

        // $result['roles']=Roles_model::withTrashed()->get();
        $result['roles']=Roles_model::orderBy('created_at','desc')->get();

        return view('admin/role_list',$result);
    }
    public function add_roles(Request $request) {
        // dd($request->all());

        $rolesData = array();
        $rolesData['role_name'] = !empty($request['role_name']) ? strip_tags($request['role_name']) : "";
        $rolesData['is_active'] = $request['is_active'];
        $rolesData['created_by'] = ($request['role']);
        $rolesData['updated_by'] = ($request['role']);



        // $rolesData['is_active']=!empty($request['is_active']) ? ($request['is_active']=="Yes" ? 1 : 0) : 1;
        $rolesData = array_filter($rolesData, function ($a) {
            return $a != '';
        });

        if (empty($request['role_id'])) {

            $componentAdded = Roles_model::firstOrCreate(
                [ 'role_name'=> $rolesData['role_name'],
                ],
                $rolesData
            );

            if ($componentAdded->wasRecentlyCreated) {
                $result = array('status' => true, 'msg' => 'Role added successfully');
            } else {
                $result = array('status' => false, 'msg' => 'Role already exists');
            }
        } else {
            // dd('else');
            if (!empty($request['delete'])) {
                // dd((int)$request['role_id']);
                $role_id=(int)$request['role_id'];
                $deleted_data = Roles_model::find($role_id)->delete();
                $result = array('status' => true, 'msg' => 'Role deleted successfully');
            } else {
                // $TenderItemsUpdate = Roles_model::where('role_id', $request['role_id'])->update($rolesData);
                // if ($TenderItemsUpdate) {
                //     $result = array('status' => true, 'msg' => 'Role updated successfully');
                // } else {
                //     $result = array('status' => false, 'msg' => 'Something went wrong');
                // }

                $existingUnit = Roles_model::where('role_name', $request->input('role_name'))
                ->where('role_id', '!=', $request['role_id']) // Exclude the current record being updated
                // ->withTrashed() // Include soft-deleted records in the check
                ->first();
                if ($existingUnit) {
                    $result = array('status' => false, 'msg' => 'Role already exists');
                }else{
                    $TenderItemsUpdate = Roles_model::where('role_id', $request['role_id'])->update($rolesData);
                     if ($TenderItemsUpdate) {
                    $result = array('status' => true, 'msg' => 'Role updated successfully');
                } else {
                    $result = array('status' => false, 'msg' => 'Something went wrong');
                }
                }
            }
        }

        echo json_encode($result);
    }



    public function roles_import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);
        try {
            $import = new RoleImport();
            Excel::import($import, $request->file('file'));
            // Check if there are any failures
            if ($import->failures()->isNotEmpty()) {
                return back()->withFailures($import->failures());
            }
            $request->session()->flash('success', 'Role imported successfully.');
            return back()->with('success', 'Role imported successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function import_roles(Request $request){
        return view('admin/import_roles');
    }
    public function export_roles()
    {
        return Excel::download(new RoleExport, 'RoleExport.xlsx');
    }

    }
