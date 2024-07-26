<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\TenderItems;
use App\Models\Units;
use App\Models\ComponentChainageModel;
use Illuminate\Http\Request;
use App\Services\SiteService;
use App\Exports\TenderItemExport;
use App\Imports\TenderItemImport;

use Maatwebsite\Excel\Facades\Excel;

class TenderItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $siteservice;
     public function __construct(SiteService $siteservice)
     {
         $this->siteservice = $siteservice;
     }
    public function tender_item_list(Request $request){
            // dd($request->all());
            $result= $this->siteservice->get_site_tender_item($request->all());
            $result['site']= $this->siteservice->get_site($request->all());

        //     $result['component_id']='';
        // $result['chainage_id']=$request->chainage_id;
        // $result['site_id']=$request->site_id;
        // $result['component_info']=ComponentChainageModel::where('chainage_id',base64_decode($request->chainage_id))->first();
        // $result['tender_items_info']=TenderItems::where('chainage_id',base64_decode($request->chainage_id))->get();
        // if($result['tender_items_info']){
        //     $result['component_id']=$result['component_info']['component_id'];
        // }

        // $result['tender_items']=TenderItems::with('associated_unit_type')->where('site_id',base64_decode($request->site_id))
        // // ->where('chainage_id',base64_decode($request->chainage_id))->get();
        // ->where('component_id', $result['component_id'])->get();
        // // dd($request->tender_items);
        // $result['units']=Units::all();
        // $result['selectedUnitId']='';
        // dd($result['tender_items']);
        return view('admin/tender_item_list',$result);
    }
    public function add_tender_item(Request $request) {
        // dd($request->all());
        $tenderItemData = array();
        $tenderItemData['tender_item_info'] = !empty($request['tender_item_info']) ? strip_tags($request['tender_item_info']) : "";
        $tenderItemData['tender_item_qty'] = !empty($request['tender_item_qty']) ? $request['tender_item_qty'] : "";
        $tenderItemData['tender_item_cost'] = !empty($request['tender_item_cost']) ? $request['tender_item_cost'] : "";
        $tenderItemData['tender_item_unit'] = !empty($request['tender_item_unit']) ? $request['tender_item_unit'] : "";
        $tenderItemData['is_active'] = !empty($request['is_active']) ? $request['is_active'] : 0 ;
        $tenderItemData['chainage_id'] = !empty($request['chainage_id']) ? base64_decode($request['chainage_id']) : "";
        $tenderItemData['site_id'] = !empty($request['site_id']) ? base64_decode($request['site_id']) : "";
        $tenderItemData['component_id'] = !empty($request['component_id']) ? ($request['component_id']) : "";
        $tenderItemData['created_by'] = $request['role'] ? $request['role'] : "";
        $tenderItemData['updated_by'] = $request['role'] ? $request['role'] : "";

        // dd($tenderItemData);
        // $tenderItemData['is_active']=!empty($request['is_active']) ? ($request['is_active']=="Yes" ? 1 : 0) : 1;
        $tenderItemData = array_filter($tenderItemData, function ($a) {
            return $a != '';
        });
        if (empty($request['tender_item_id'])) {
            $componentAdded = TenderItems::firstOrCreate(
                [ 'tender_item_info'=> $tenderItemData['tender_item_info'],
                    'chainage_id' => $tenderItemData['chainage_id'],
                    'site_id' => $request['site_id']
                ],
                $tenderItemData
            );

            if ($componentAdded->wasRecentlyCreated) {
                $result = array('status' => true, 'msg' => 'Tender Item added successfully');
            } else {
                $result = array('status' => false, 'msg' => 'Tender Item already exists');
            }
        } else {

            if (!empty($request['delete'])) {
                $deleted_data = TenderItems::find($request['tender_item_id'])->delete();
                $result = array('status' => true, 'msg' => 'Tender Item deleted successfully');
            } else {
                $TenderItemsUpdate = TenderItems::where('tender_item_id', $request['tender_item_id'])->update($tenderItemData);
                if ($TenderItemsUpdate) {
                    $result = array('status' => true, 'msg' => 'Tender Items updated successfully');
                } else {
                    $result = array('status' => false, 'msg' => 'Something went wrong');
                }
            }
        }

        echo json_encode($result);
    }

    public function export()
    {
        return Excel::download(new TenderItemExport, 'TenderItemExport.xlsx');
    }
    public function import_tender_items(Request $request){

        $result['chainage_id']=$request->chainage_id;
        $result['site_id']=$request->site_id;
        $result['site']= $this->siteservice->get_site($request->all());
        return view('admin/tender_item_import',$result);
    }
    public function import(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);


        $result=ComponentChainageModel::where('chainage_id',base64_decode($request->chainage_id))->first();
        $component_id='';
        if($result){
            $component_id=$result['component_id'];
        }
        // Example of additional data to be passed
        $additionalData = [
            'site_id' => base64_decode($request->input('site_id')),
            'chainage_id' => base64_decode($request->input('chainage_id')),
            'component_id' => $component_id,

        ];

        // dd($additionalData);
        try {
            $import = new TenderItemImport($additionalData);
            Excel::import($import, $request->file('file'));

            // Check if there are any failures
            if ($import->failures()->isNotEmpty()) {
                return back()->withFailures($import->failures());
            }
            $request->session()->flash('success', 'Tender Items imported successfully.');
            return back()->with('success', 'Tender Items imported successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
