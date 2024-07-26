<?php




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MonitorTender;
use App\Models\ActivityTenderItemComponentMapping;
use App\Models\Road_components_model;
use Illuminate\Http\Request;
use App\Services\SiteService;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MonitorTenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attach_tender_items_to_monitoring_activity(Request $request){
        // dd($request->all());

        $activityTenderData = array();
        $activityTenderData['site_id'] = $request['site_id'] ? base64_decode($request['site_id']) : "";
        $activityTenderData['chainage_id'] = $request['chainage_id'] ? base64_decode($request['chainage_id']) : "";
        $activityTenderData['component_id'] = $request['component_id'] ? ($request['component_id']) : "";
        $activityTenderData['monitor_activity_id'] = $request['monitering_activity'] ? $request['monitering_activity'] : "";
        // $activityTenderData['monitored_tender_item'] = $request['monitored_tender_item'] ? $request['monitored_tender_item'] : "";
        $activityTenderData['monitored_tender_item'] = $request['monitor_item'] ? $request['monitor_item'] : "";
        $activityTenderData['monitor_item_unit'] = $request['monitor_item_unit'] ? $request['monitor_item_unit'] : "";
        $activityTenderData['created_by'] = $request['role'] ? $request['role'] : "";
        $activityTenderData['updated_by'] = $request['role'] ? $request['role'] : "";
        $activityTenderData['is_active']= $request['is_active'] ? ($request['is_active']=="1" ? 1 : 0) : 1;
        // $activityTenderData = array_filter($activityTenderData, function ($a) {
        //     return $a != '';
        // });
        // dd($activityTenderData);
        if (empty($request['monitor_tender_id'])) {

            $monitorTenderData = MonitorTender::firstOrCreate(
                [
                    'monitor_activity_id' => $activityTenderData['monitor_activity_id'],
                    'site_id' =>  $activityTenderData['site_id'] ,
                    'chainage_id' =>  $activityTenderData['chainage_id'] ,
                    'component_id' =>  $activityTenderData['component_id'] ,
                ],
                $activityTenderData
            );
            // dd('here');
            if (!empty($request['tender_items']) &&  $monitorTenderData->monitor_tender_id) {

                foreach ($request['tender_items'] as $row) {
                    ActivityTenderItemComponentMapping::create(
                        [
                            'monitor_tender_id' => $monitorTenderData->monitor_tender_id,
                            'tender_item_id' => $row,
                            'site_id'=> $request['site_id'] ? base64_decode($request['site_id']) : "",
                            'chainage_id'=> $request['chainage_id'] ? base64_decode($request['chainage_id']) : "",
                            'component_id'=> $request['component_id'] ? ($request['component_id']) : "",
                            'monitor_activity_id'=> $request['monitering_activity'] ? $request['monitering_activity'] : "",
                            'created_by'=> $request['role'] ? $request['role'] : "",
                            'updated_by'=> $request['role'] ? $request['role'] : "",
                            'is_active'=> $request['is_active'] ? ($request['is_active']=="1" ? 1 : 0) : 1,

                   ]
                    );
              }
            }

            if ($monitorTenderData->wasRecentlyCreated) {
                $result = array('status' => true, 'msg' => 'Tender items attached to monitoring activity successfully');
            } else {
                $result = array('status' => false, 'msg' => 'Tender items already attached to monitoring activity');
            }
        } else {

            if (!empty($request['delete'])) {
                $deleted_data = MonitorTender::find($request['monitor_tender_id'])->delete();
                $deleted_data = ActivityTenderItemComponentMapping::where('monitor_tender_id', $request['monitor_tender_id'])->update(['deleted_at' => Carbon::now()->format('Y-m-d H:i:s')]);
                $result = array('status' => true, 'msg' => 'Record deleted successfully');
            } else {

                $material_update = MonitorTender::where('monitor_tender_id', $request['monitor_tender_id'])->update($activityTenderData);
                $data = ActivityTenderItemComponentMapping::where('monitor_tender_id', $request['monitor_tender_id']);
                $data->delete();
                foreach ($request['monitering_activity'] as $row) {
                    ActivityTenderItemComponentMapping::create(
                        [
                            'monitor_tender_id' => $request['monitor_tender_id'],
                            'tender_item_id' => $row,
                            'site_id'=> $request['site_id'] ? base64_decode($request['site_id']) : "",
                            'chainage_id'=> $request['chainage_id'] ? base64_decode($request['chainage_id']) : "",
                            'component_id'=> $request['component_id'] ? ($request['component_id']) : "",
                            'monitor_activity_id'=> $request['monitering_activity'] ? base64_decode($request['monitering_activity']) : "",
                            'created_by'=> $request['role'] ? $request['role'] : "",
                            'updated_by'=> $request['role'] ? $request['role'] : "",
                            'is_active'=> $request['is_active'] ? ($request['is_active']=="1" ? 1 : 0) : 1,
                        ]
                    );
                }


                if ($material_update) {
                    $result = array('status' => true, 'msg' => 'Record updated successfully');
                } else {
                    $result = array('status' => false, 'msg' => 'Something went wrong');
                }
            }
        }

        echo json_encode($result);
    }
}
