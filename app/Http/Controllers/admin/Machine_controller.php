<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MachineImport;

use App\Scopes\GlobeScope;
use App\Models\Machines_model;
use App\Models\Machine_types_model;
use App\Exports\MachineExport;
use PDF;

class Machine_controller extends Controller
{
    //

    public function index(Request $request)
    {
             $result['machines']=Machines_model::select('machines.*','machine_types.machine_type')
                                                ->leftJoin("machine_types", "machines.machine_type", "=", "machine_types.mach_type_id")
                                                ->get()->toArray();

             $result['machine_types']=Machine_types_model::get()->toArray();
            //  $pdf = PDF::loadView('admin/demo_mailer', $result);
            //  $output = $pdf->output();
            //  file_put_contents('assets/invoice.pdf', $output);
            // return $pdf->download('invoice.pdf');   //download in the desktop
             return view('admin/machines',$result);
    }

    public function import_machine(Request $request){
        return view('admin/import_machine');
    }

    public function export_machine()
    {
        return Excel::download(new MachineExport, 'MachineExport.xlsx');
    }

    public function machines_import(Request $request)
    {
        // $machine_import=Excel::import(new MachineImport,request()->file('file'));
        // echo json_encode(array());

        {
            $request->validate([
                'file' => 'required|mimes:xlsx,csv',
            ]);
            try {
                $import = new MachineImport();
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
    }

    public function add_machines(Request $request)
    {
        $id=$request['machine_id']??false;

            $request->validate([
                'machine_no' => ['required', $id ? 'unique:machines,machine_number,' . $id .',machine_id': 'unique:machines,machine_number'],
                'machine_uid' => ['required', $id ? 'unique:machines,machine_uid,' . $id .',machine_id': 'unique:machines,machine_uid'],
               ]);
        // $request->validate([
        //     'machine_no' => 'required|unique:machines,machine_number',
        //     'machine_uid' => 'required|unique:machines,machine_uid',
        // ]);
        $machine_type = !empty($request['machine_type']) ? (Machine_types_model::firstOrCreate(
            [
                'machine_type' => $request['machine_type']
            ],
            [
                 'machine_type' => $request['machine_type']
            ]
        )) : "";


        $machine_data=array();
        $machine_data['machine_name']=!empty($request['machine_name']) ? $request['machine_name'] : "";
        $machine_data['machine_type']=!empty($machine_type) ? ($machine_type->vd_id ? $machine_type->vd_id : $machine_type->mach_type_id) : "" ;
        $machine_data['machine_number']=!empty($request['machine_no']) ? $request['machine_no'] : "";
        $machine_data['machine_uid']=!empty($request['machine_uid']) ? $request['machine_uid'] : "";
        $machine_data['machine_hrs']=!empty($request['machine_hr']) ? $request['machine_hr'] : "";
        $machine_data['machine_cost']=!empty($request['machine_cost']) ? $request['machine_cost'] : "";

        $machine_data['machine_cost_per_hrs']=!empty($request['machine_cost']) ? round($request['machine_cost'] / $request['machine_hr']) : "";
        $machine_data['is_active']=!empty($request['is_active']) ? ($request['is_active']=="Yes" ? 1 : 0) : 1;

        if(empty($request['machine_id']))
        {

            $machine_added = Machines_model::firstOrCreate(
                [
                    'machine_type' => $machine_data['machine_type'],
                    'machine_name'=>$request['machine_name']
                ],
                $machine_data
            );

            if($machine_added->wasRecentlyCreated)
            {
                $result=array('status'=>true,'msg'=>'Machine added successfully');
            } else {
                $result=array('status'=>false,'msg'=>'Machines already exists');
            }

        } else {

            if(!empty($request['delete']))
                {
                            $deleted_data = Machines_model::find($request['machine_id'])->delete();

                            $result=array('status'=>true,'msg'=>'Machine deleted successfully');

                } else {

                $machine_update=Machines_model::where('machine_id', $request['machine_id'])->update($machine_data);

                if($machine_update)
                {
                    $result=array('status'=>true,'msg'=>'Machine updated successfully','machine_update'=>$machine_update);
                } else {
                    $result=array('status'=>false,'msg'=>'Something went wrong');
                }

            }
        }


    echo json_encode($result);

    }
}
