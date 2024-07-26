<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity_model;
use App\Models\TenderItems;
use App\Models\Units;
use App\Models\ComponentChainageModel;
use App\Models\MonitorTender;
use App\Models\Component_monitering_activity_mapping_model;
use App\Models\ActivityTenderItemComponentMapping;
use App\Services\SiteService;


class Monitoring_controller extends Controller
{

    protected $siteservice;
    public function __construct(SiteService $siteservice)
    {
        $this->siteservice = $siteservice;
    }
    public function index()
    {
        $result['activities'] = Activity_model::get()->toArray();
        return view('admin/activities', $result);
    }


    public function add_activity(Request $request)
    {
        if (empty($request['activity_id'])) {
            if (empty($exist_activities)) {
                $exist_activities = Activity_model::select('*')->whereIn('activity_name', $request['activity_name'])->get()->toArray();

                foreach ($request['activity_name'] as $key => $act) {

                    Activity_model::create(
                        [
                            'activity_name' => $act,
                            'activity_description' => $request['activity_description'][$key]
                        ]
                    );
                }
                $result = array('status' => true, 'msg' => 'Monitoring activities added successfully');
            } else {

                $result = array('status' => false, 'msg' => implode(', ', array_column($exist_activities, 'activity_name')) . ' already exists');
            }
        } else {

            if (!empty($request['delete'])) {
                $deleted_data = Activity_model::find($request['activity_id'])->forceDelete();

                $result = array('status' => true, 'msg' => 'Monitoring activity deleted successfully');
            } else {

                $activity_update = Activity_model::where('activity_id', $request['activity_id'])->update([
                    'activity_name' => $request['activity_name'][0],
                    'activity_description' => $request['activity_description'][0],
                ]);

                if ($activity_update) {
                    $result = array('status' => true, 'msg' => 'Monitoring activity details updated successfully');
                } else {
                    $result = array('status' => false, 'msg' => 'Something went wrong');
                }
            }
        }

        echo json_encode($result);
    }


    public function site_monitor_activity_list(Request $request)
    {

        $result = $this->siteservice->get_site_tender_item($request->all());
        $result['chainage_id'] = $request->chainage_id;
        $result['component_info'] = ComponentChainageModel::where('chainage_id', base64_decode($request->chainage_id))->first();
        // dd($result['component_info']);
        $data = ActivityTenderItemComponentMapping::where('site_id', base64_decode($request->site_id))->where('chainage_id', base64_decode($request->chainage_id))->get()->toArray();
        //    dd($data);
        $selected_monitor_activity_id_array = [];
        $selected_tender_item_id_array = [];
        if ($data) {
            $selected_monitor_activity_id_array = (array_column($data, 'monitor_activity_id'));
            $selected_tender_item_id_array = (array_column($data, 'tender_item_id'));
        }
        // dd(base64_decode($request->chainage_id));
        $result['tender_items_info'] = TenderItems::where('chainage_id', base64_decode($request->chainage_id))
            ->whereNotIn('tender_item_id', $selected_tender_item_id_array)
            ->where('is_active',1)
            ->get();
        // dd($result['tender_items_info']);
        // dd( $selected_monitor_activity_id_array);

        // dd($result['tender_items_info']);
        // dd($result['component_info']['component_id']);
        $result['component_id'] = '';
        if ($result['tender_items_info']) {

            $result['component_id'] = $result['component_info']['component_id'];
        }
        // dd( $result['component_id']);
        $result['site_id'] = $request->site_id;
        $result['activity_list'] = [];
        $result['site'] = $this->siteservice->get_site($request->all());
        $component_monitoring_activity = Component_monitering_activity_mapping_model::where('component_id', $result['component_info']['component_id'])->whereNotIn('monitoring_activity_id', $selected_monitor_activity_id_array)->get()->toArray();
        // dd($component_monitoring_activity);
        // dd($result['component_id']);
        if ($component_monitoring_activity) {
            $component_monitoring_activity_array = (array_column($component_monitoring_activity, 'monitoring_activity_id'));
            $result['activity_list'] = Activity_model::whereIn('activity_id', $component_monitoring_activity_array)->get();
            // dd($result['activity_list']);

        }
        $result['activity_tender_list'] = MonitorTender::with('associated_monitering_tenders')
            ->leftJoin('monitoring_activities', 'monitor_tenders.monitor_activity_id', 'monitoring_activities.activity_id')
            ->leftJoin('units', 'units.unit_id', 'monitor_tenders.monitor_item_unit')
            ->where('site_id', base64_decode($result['site_id']))->where('chainage_id', base64_decode($result['chainage_id']))
            ->where('component_id', $result['component_id'])
            ->select('monitoring_activities.activity_name', 'monitoring_activities.activity_description', 'units.unit_name', 'monitor_tenders.*')
            ->get();
        // dd($result['activity_tender_list']);
        $result['monitoer_units'] = Units::where('unit_for', 2)->get();

        // dd( $result['activity_list']);
        // $result['units']=Units::all();
        $result['monitoring_activity'] = Activity_model::all();
        $result['selectedActivityId'] = '';
        $result['selectedTenderItemId'] = [];
        // dd($request->all());
        // dd($result['component_id']);

        return view('admin/monitoring_activity_list', $result);
    }
}
