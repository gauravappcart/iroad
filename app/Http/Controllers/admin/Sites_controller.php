<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Activity_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Sites_model;
use App\Models\Coordinates_model;
use App\Models\ComponentChainageModel;
use App\Models\Road_components_model;
use App\Models\Component_monitering_activity_mapping_model;
use App\Models\MonitorTender;
use App\Models\ActivityTenderItemComponentMapping;
use App\Models\Labour;
use App\Models\Machine_types_model;
use App\Models\Machines_model;
use App\Models\TenderItems;
use App\Models\SitePlanActivity;
use App\Models\SitePlanLabour;
use App\Models\Material_types_model;
use App\Models\Material_model;
use App\Models\Roles_model;
use App\Models\SitePlanMaterial;
use App\Models\SitePlanMachine;
use App\Models\Users_model;
use App\Models\SitePlanDepartment;
use App\Models\VehicleTypesModel;
use App\Models\SitePlanAsset;
use App\Models\SiteWeeklyPlan;
use App\Models\SiteWeeklyPlanExtraFields;

use App\Models\SiteWeeklyPlanMaterial;
use App\Models\SiteWeeklyPlanMachine;
use App\Models\SiteWeeklyPlanLabour;

use App\Services\SiteService;
use App\Services\AssetService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class Sites_controller extends Controller
{
    protected $siteservice, $assetservice;
    public function __construct(SiteService $siteservice, AssetService $assetservice)
    {
        $this->siteservice = $siteservice;
        $this->assetservice = $assetservice;
    }

    public function index(Request $request)
    {
        $result['sites'] = $this->siteservice->getall_sites($request->all());

        return view('admin/sites', $result);
    }

    public function project_datails(Request $request)
    {
    }

    public function add_component_chainage(Request $request)
    {
        // dd($request->all());
        $chainageResponse = $this->siteservice->add_component_chainage($request->all());

        return response()->json($chainageResponse);
    }

    public function update_road_compenet(Request $request)
    {

        $chainageResponse = $this->siteservice->update_road_compenet($request->all());
        return response()->json($chainageResponse);
    }
    public function remove_road_compenet(Request $request)
    {
        //    dd($request->all());
        $data = $this->siteservice->remove_road_compenet($request->all());
        echo json_encode($data);
    }

    public function add_project_datails(Request $request)
    {
        $result['road_components'] = $this->siteservice->get_road_components($request->all());
        // dd( $result['road_components']);
        //associated_extra_fields
        $result['site'] = $this->siteservice->get_site($request->all());
        // dd($result['site']);
        $result['site_components'] = $this->siteservice->get_site_components($request->all()); // Not Used

        // dd($result);

        return view('admin/add-site-details', $result);
    }

    public function add_site(Request $request)
    {
        $site_data = array();
        $site_data['site_name'] = !empty($request['site_name']) ? $request['site_name'] : "";
        $site_data['road_name'] = !empty($request['road_name']) ? $request['road_name'] : "";
        $site_data['no_of_junction'] = !empty($request['no_of_junction']) ? $request['no_of_junction'] : "";
        $site_data['road_length'] = !empty($request['road_length']) ? $request['road_length'] : "";
        $site_data['tender_budget'] = !empty($request['tender_budget']) ? $request['tender_budget'] : "";
        $site_data['project_start_date'] = !empty($request['project_start_date']) ? $request['project_start_date'] : "";
        $site_data['project_end_date'] = !empty($request['project_end_date']) ? $request['project_end_date'] : "";
        $site_data['design_chainage'] = !empty($request['design_chainage']) ? $request['design_chainage'] : "";


        if (empty($request['site_id'])) {
            $site_added = Sites_model::firstOrCreate(
                [
                    'site_name' => $request['site_name']
                ],
                $site_data
            );

            if ($site_added->wasRecentlyCreated) {
                Coordinates_model::where('site_id', $site_added->site_id)->forceDelete();
                foreach (json_decode($request['coordinates']) as $coordkey => $val) {
                    $temp = (array)$val;
                    $temp['site_id'] = $site_added->site_id;

                    Coordinates_model::create($temp);
                }
                $result = array('status' => true, 'msg' => 'Site added successfully');
            } else {
                $result = array('status' => false, 'msg' => 'Site already exists');
            }
        } else {

            if (!empty($request['delete'])) {
                $deleted_data = Sites_model::find($request['site_id'])->delete();

                $result = array('status' => true, 'msg' => 'Site deleted successfully');
            } else {

                $site_update = Sites_model::where('site_id', $request['site_id'])->update($site_data);

                if ($site_update) {
                    $result = array('status' => true, 'msg' => 'Site updated successfully', 'site_update' => $site_update);
                } else {
                    $result = array('status' => false, 'msg' => 'Something went wrong');
                }
            }
        }


        echo json_encode($result);
    }

    public function sendMail()
    {
        // $testMail=Mail::send(["suraj@appcartsystems.com"], function ($message) {
        //     $message->to("suraj@appcartsystems.com")
        //       ->subject("Mail Test")
        //       // here comes what you want
        //     //   ->setBody('Hi, welcome user!'); // assuming text/plain
        //       // or:
        //       ->setBody('<h1>Hi, welcome user!</h1>', 'text/html'); // for HTML rich messages
        //   });

        $to = 'suraj@appcartsystems.com';
        $subject = 'Test Email';
        $message = 'This is a test email message.';

        // Send email
        Mail::raw($message, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });

        //   echo "<pre>";
        //   print_r($testMail);
    }


    public function plan_project(Request $request)
    {
        // dd($request->all());
        $result['component_id'] = '';
        $result['chainage_id'] = $request->chainage_id;
        $result['site_id'] = $request->site_id;
        $result['activity_list'] = [];
        $component_monitoring_activity = [];
        $result['site'] = $this->siteservice->get_site($request->all());
        $result['component_info'] = ComponentChainageModel::where('chainage_id', base64_decode($request->chainage_id))->first();
        $data = ActivityTenderItemComponentMapping::where('site_id', base64_decode($request->site_id))->where('chainage_id', base64_decode($request->chainage_id))->get()->toArray();
        $selected_monitor_activity_id_array = [];
        // $selected_tender_item_id_array=[];
        if ($data) {
            $selected_monitor_activity_id_array = (array_column($data, 'monitor_activity_id'));
            // $selected_tender_item_id_array=(array_column($data,'tender_item_id'));
        }
        $result['tender_items_info'] = TenderItems::where('chainage_id', base64_decode($request->chainage_id))->get();
        $result['component_id'] = '';
        if ($result['tender_items_info']) {
            $result['component_id'] = $result['component_info']['component_id'];
        }
        $result['site'] = $this->siteservice->get_site($request->all());
        $component_monitoring_activity = Component_monitering_activity_mapping_model::where('component_id', $result['component_info']['component_id'])->whereNotIn('monitoring_activity_id', $selected_monitor_activity_id_array)->get()->toArray();
        //         $component_monitoring_activity = Component_monitering_activity_mapping_model::whereNotIn('monitoring_activity_id', $selected_monitor_activity_id_array)->get()->toArray();
        // dd($component_monitoring_activity);
        if ($component_monitoring_activity) {
            $component_monitoring_activity_array = (array_column($component_monitoring_activity, 'monitoring_activity_id'));
            $result['activity_list'] = Activity_model::whereIn('activity_id', $component_monitoring_activity_array)->get();
        }
        // dd($result['activity_list']);
        // dd( base64_decode($result['site_id']));
        $result['activity_tender_list'] = MonitorTender::with('associated_monitering_tenders')
            ->leftJoin('monitoring_activities', 'monitor_tenders.monitor_activity_id', 'monitoring_activities.activity_id')
            ->leftJoin('road_components_chainage', 'road_components_chainage.chainage_id', 'monitor_tenders.chainage_id') // added on 10-06-2024
            // ->leftJoin('site_plan_activities', 'site_plan_activities.activity_id', 'monitor_tenders.monitor_activity_id')
            ->leftJoin('site_plan_activities', 'site_plan_activities.chainage_id', 'monitor_tenders.chainage_id')
            ->where('monitor_tenders.site_id', base64_decode($result['site_id']))
            // ->where('road_components_chainage.site_id', base64_decode($result['site_id']))
            // ->where('site_plan_activities.site_id', base64_decode($result['site_id']))

            // ->where('monitor_tenders.chainage_id', base64_decode($result['chainage_id']))   // removed on 10-06-2024
            // ->where('monitor_tenders.component_id', $result['component_id'])                // removed on 10-06-2024
            ->select('monitoring_activities.activity_name', 'monitoring_activities.activity_description', 'site_plan_activities.numbers_of_days', 'monitor_tenders.*', 'road_components_chainage.from_length', 'road_components_chainage.to_length') // added on 10-06-2024
            // ->select('monitoring_activities.activity_name', 'monitoring_activities.activity_description', 'site_plan_activities.numbers_of_days', 'monitor_tenders.*') // removed on 10-06-2024
            ->orderBy('road_components_chainage.from_length')
            ->get()->toArray();
        // dd($result['activity_tender_list'] );
        $result['labour'] = Labour::all();

        $result['site_plan_labour'] = SitePlanLabour::where('site_plan_labours.site_id', base64_decode($result['site_id']))
            ->select('site_plan_labours.*')
            ->get();


        $result['site_plan_material'] = SitePlanMaterial::where('site_plan_materials.site_id', base64_decode($result['site_id']))
            ->select('site_plan_materials.*')
            ->get();

        $result['material_type'] = Material_types_model::all();
        $result['materials'] = Material_model::leftjoin('units', 'units.unit_id', 'materials.material_unit')
            // ->whereIn('materials.site_id',[0,base64_decode($result['site_id'])])
            ->where('materials.is_active',1)
            ->select('materials.*', 'units.unit_name')->get();
        // dd(($result['materials']));
        $result['site_plan_machines'] = SitePlanMachine::where('site_plan_machines.site_id', base64_decode($result['site_id']))
            ->select('site_plan_machines.*')
            ->get();
        $result['machine_type'] = Machine_types_model::all();
        $result['machines'] = Machines_model::leftjoin('machine_types', 'machine_types.mach_type_id', 'machines.machine_type')->select('machines.*', 'machine_types.machine_type as machine_type_name')->get();

        // dd($result['machines']);
        // $result['machine'] = Machines_model::with('machine_type')->select('machines.*')->get()->toArray();

        // dd($result['machine']);
        // dd($result['activity_tender_list']);
        // $result['site_activities'] = $this->siteservice->site_activities($request->all());

        $site_labour_budget = SitePlanLabour::where('site_id', base64_decode($result['site_id']))->sum('total');
        //  $site_machine_budget=SitePlanMachine::where('site_id',base64_decode($result['site_id']))->sum('estimated_total');
        $site_vehicle_budget = SitePlanAsset::where('site_id', base64_decode($result['site_id']))->sum('estimated_total');
        $site_material_budget = SitePlanMaterial::where('site_id', base64_decode($result['site_id']))->selectRaw('SUM(quantity * rate) as total_material_budget')->value('total_material_budget');
        $result['site_total_estimated_budget'] = $site_labour_budget + $site_vehicle_budget + $site_material_budget;

        // dd($site_labour_budget);140000
        // dd($site_vehicle_budget);29000
        // dd($site_material_budget);540000

        $result['site_plan_departments'] = SitePlanDepartment::where('site_plan_departments.site_id', base64_decode($result['site_id']))
            ->select('site_plan_departments.*')
            ->get();
        $result['departments'] = Roles_model::all();
        $result['users'] = Users_model::all();



        //New Machines -- Assets

        $result['site_plan_assets'] = SitePlanAsset::where('site_plan_assets.site_id', base64_decode($result['site_id']))
            ->select('site_plan_assets.*')
            ->get();
        //  $result['site_plan_assets'] =[];
        $result['vehicle_types'] = VehicleTypesModel::all();





        return view('admin/add-project-plan', $result);
    }

    public function add_project_plan_activity_old(Request $request)
    {
        // dd($request->all());
        $array1 = $request->input('monitor_activity_id');
        $array2 = $request->input('numbers_of_days');

        if (count($array1) == count($array2)) {

            foreach ($array1 as $index => $value) {
                $monitor_activity_id = $value;
                $numbers_of_days = $array2[$index] ?? null;

                $site_plan_activity_array['activity_id'] = $monitor_activity_id;
                $site_plan_activity_array['numbers_of_days'] = $numbers_of_days;
                $site_plan_activity_array['component_id'] = $request->input('component_id');
                $site_plan_activity_array['site_id'] = base64_decode($request->input('site_id'));
                $site_plan_activity_array['chainage_id'] = base64_decode($request->input('chainage_id'));
                // DB::connection()->enableQueryLog();
                $site_plan_activity = SitePlanActivity::updateOrCreate(
                    [
                        'component_id' => $request->input('component_id'),
                        'site_id' => base64_decode($request->input('site_id')),
                        'chainage_id' => base64_decode($request->input('chainage_id')),
                        'activity_id' => $monitor_activity_id,
                    ],
                    $site_plan_activity_array
                );
                // $queries = DB::getQueryLog();
                if ($site_plan_activity->wasRecentlyCreated) {
                    $result = array('status' => true, 'msg' => 'Estimated days added successfully');
                } else {
                    $result = array('status' => true, 'msg' => 'Estimated days updated successfully');
                }
            }
        } else {
            $result = array('status' => false, 'msg' => 'Something went wrong');
        }
        // dd($data);


        echo json_encode($result);
    }
    public function add_project_plan_activity(Request $request)
    {
        // dd($request->all());
        $array1 = $request->input('monitor_activity_id');
        $array2 = $request->input('numbers_of_days');
        $array3 = $request->input('ass_chainage_id');
        if (count($array1) == count($array2)) {

            foreach ($array3 as $index => $value) {
                $chainage_id = $value;
                $monitor_activity_id = $array1[$index] ?? null;
                $numbers_of_days = $array2[$index] ?? null;

                $site_plan_activity_array['activity_id'] = $monitor_activity_id;
                $site_plan_activity_array['numbers_of_days'] = $numbers_of_days;
                $site_plan_activity_array['component_id'] = $request->input('component_id');
                $site_plan_activity_array['site_id'] = base64_decode($request->input('site_id'));
                $site_plan_activity_array['chainage_id'] = $chainage_id;


                // DB::connection()->enableQueryLog();
                $site_plan_activity = SitePlanActivity::updateOrCreate(
                    [
                        'component_id' => $request->input('component_id'),
                        'site_id' => base64_decode($request->input('site_id')),
                        'chainage_id' => $chainage_id,
                        'activity_id' => $monitor_activity_id,
                    ],
                    $site_plan_activity_array
                );
                // $queries = DB::getQueryLog();
                if ($site_plan_activity->wasRecentlyCreated) {
                    $result = array('status' => true, 'msg' => 'Estimated days added successfully');
                } else {
                    $result = array('status' => true, 'msg' => 'Estimated days updated successfully');
                }
            }
        } else {
            $result = array('status' => false, 'msg' => 'Something went wrong');
        }
        // dd($data);


        echo json_encode($result);
    }
    public function add_project_plan_labour(Request $request)
    {
        // dd($request->all());

        if ($request->delete == 1) {

            $deleted_data = SitePlanLabour::find($request->site_plan_labour_id)->delete();
            $result = array('status' => true, 'msg' => 'Record deleted successfully');
        } else {


            $data = $request->input('labour_type', []);
            foreach ($data as $key => $item) {
                $site_plan_labour =   SitePlanLabour::updateOrCreate(
                    ['site_plan_labour_id' =>  count($request->site_plan_labour_id) > $key ? $request->site_plan_labour_id[$key] : ''],  // Condition to check for existing record
                    [
                        'site_id' => base64_decode($request->site_id),
                        'labour_id' => $item,
                        'no_of_worker' => $request->no_of_worker[$key],
                        'no_of_work_days' => $request->work_days[$key],
                        'cost_per_day' => $request->cost_days[$key],
                        'total' => $request->no_of_worker[$key] * $request->work_days[$key] * $request->cost_days[$key],
                        'created_by' => $request->role,
                        'updated_by' => $request->role,
                        'is_active' => 1,
                    ]   // Data to update or create
                );
            }

            if ($site_plan_labour->wasRecentlyCreated) {
                $result = array('status' => true, 'msg' => 'Labours data added successfully');
            } else {
                $result = array('status' => true, 'msg' => 'Labours data updated successfully');
            }
        }
        echo json_encode($result);
    }
    public function add_project_plan_vehicle_type(Request $request)
    {
        // dd($request->all());

        if ($request->delete == 1) {

            $deleted_data = SitePlanAsset::find($request->site_plan_vehical_type_id)->delete();
            $result = array('status' => true, 'msg' => 'Record deleted successfully');
        } else {
            $data = $request->input('vehicle_type', []);
            foreach ($data as $key => $item) {
                $site_plan_asset =   SitePlanAsset::updateOrCreate(
                    ['site_plan_vehical_type_id' =>  count($request->site_plan_vehical_type_id) > $key ? $request->site_plan_vehical_type_id[$key] : ''],  // Condition to check for existing record
                    [
                        'site_id' => base64_decode($request->site_id),
                        'vehicle_type_id' => $item,
                        'vehical_quantity' => $request->vehical_quantity[$key],
                        'time_hours' => $request->time_hours[$key],
                        'cost_per_hour' => $request->cost_per_hour[$key],
                        'estimated_total' => $request->vehical_quantity[$key] * $request->time_hours[$key] * $request->cost_per_hour[$key],
                        'created_by' => $request->role,
                        'updated_by' => $request->role,
                        'is_active' => 1,
                    ]   // Data to update or create
                );
            }

            if ($site_plan_asset->wasRecentlyCreated) {
                $result = array('status' => true, 'msg' => 'Vehicle data added successfully');
            } else {
                $result = array('status' => true, 'msg' => 'Vehicle data updated successfully');
            }
        }
        echo json_encode($result);
    }
    public function add_project_plan_material(Request $request)
    {
        // dd($request->all());

        if ($request->delete == 1) {

            $deleted_data = SitePlanMaterial::find($request->site_plan_material_id)->delete();
            $result = array('status' => true, 'msg' => 'Record deleted successfully');
        } else {

            // print_r('ddd');
            $data = $request->input('material_type', []);
            foreach ($data as $key => $item) {
                // print_r('ddd');
                $material_data = Material_model::where('material_id', $request->material[$key])->get()->first();

                $site_plan_material =   SitePlanMaterial::updateOrCreate(
                    ['site_plan_material_id' =>  count($request->site_plan_material_id) > $key ? $request->site_plan_material_id[$key] : ''],  // Condition to check for existing record
                    [
                        // 'site_id' => base64_decode($request->site_id),
                        'material_type_id' => $item,
                        'material_id' => $request->material[$key],
                        'material_unit_id' => $material_data->material_unit,
                        'quantity' => $request->quantity[$key],
                        'rate' => $request->rate[$key],
                        'site_id' => base64_decode($request->site_id),
                        // 'total' => $request->no_of_worker[$key] * $request->work_days[$key] * $request->cost_days[$key],
                        'created_by' => $request->role,
                        'updated_by' => $request->role,
                        'is_active' => 1,
                    ]   // Data to update or create
                );
                // dd($site_plan_labour);
                // print_r($request->site_plan_material_id);

            }
            // dd();
            // $site_plan_labour;
            if ($site_plan_material->wasRecentlyCreated) {
                $result = array('status' => true, 'msg' => 'Material data added successfully');
            } else {
                $result = array('status' => true, 'msg' => 'Material data updated successfully');
            }
        }
        echo json_encode($result);
    }



    public function add_project_plan_machine(Request $request)
    {

        if ($request->delete == 1) {

            $deleted_data = SitePlanMachine::find($request->site_plan_machine_id)->delete();
            $result = array('status' => true, 'msg' => 'Record deleted successfully');
        } else {

            // print_r('ddd');
            $data = $request->input('machine_type', []);
            foreach ($data as $key => $item) {
                // print_r('ddd');
                $material_data = Machines_model::where('machine_id', $request->machine[$key])->get()->first();

                $site_plan_machine =   SitePlanMachine::updateOrCreate(
                    ['site_plan_machine_id' =>  count($request->site_plan_machine_id) > $key ? $request->site_plan_machine_id[$key] : ''],  // Condition to check for existing record
                    [
                        'machine_type_id' => $item,
                        'machine_id' => $request->machine[$key],
                        'no_of_machines' => $request->quantity[$key],
                        'no_of_hours' => $request->estimated_time[$key],
                        'machine_cost_pr_hrs' => $request->machine_cost_pr_hrs[$key],
                        'estimated_total' => $request->machine_total_cost[$key],
                        'site_id' => base64_decode($request->site_id),
                        'created_by' => $request->role,
                        'updated_by' => $request->role,
                        'is_active' => 1,
                    ]   // Data to update or create
                );
            }
            // $site_plan_labour;
            if ($site_plan_machine->wasRecentlyCreated) {
                $result = array('status' => true, 'msg' => 'Machine data added successfully');
            } else {
                $result = array('status' => true, 'msg' => 'Machine data updated successfully');
            }
        }
        echo json_encode($result);
    }
    public function add_project_plan_department(Request $request)
    {
        // dd($request->all());
        if ($request->delete == 1) {

            $deleted_data = SitePlanDepartment::find($request->site_plan_department_id)->delete();
            $result = array('status' => true, 'msg' => 'Record deleted successfully');
        } else {

            // print_r('ddd');
            $data = $request->input('department', []);
            foreach ($data as $key => $item) {
                // print_r('ddd');
                $material_data = Roles_model::where('role_id', $request->department[$key])->get()->first();

                $site_plan_department =   SitePlanDepartment::updateOrCreate(
                    ['site_plan_department_id' =>  count($request->site_plan_department_id) > $key ? $request->site_plan_department_id[$key] : ''],  // Condition to check for existing record
                    [
                        'site_id' => base64_decode($request->site_id),
                        'department_id' => $item,
                        'user_id' => $request->user[$key],
                        'created_by' => $request->role,
                        'updated_by' => $request->role,
                        'is_active' => 1,
                    ]   // Data to update or create
                );
            }
            // $site_plan_labour;
            if ($site_plan_department->wasRecentlyCreated) {
                $result = array('status' => true, 'msg' => 'Department data added successfully');
            } else {
                $result = array('status' => true, 'msg' => 'Department data updated successfully');
            }
        }
        echo json_encode($result);
    }

    public function get_material_options(Request $request, $material_type)
    {

        // dd($request->selectedOptions);
        if ($request->selectedOptions) {
            $options = Material_model::leftjoin('units', 'units.unit_id', 'materials.material_unit')
                ->where('material_type', $material_type)->whereNotIn('materials.material_id', $request->selectedOptions)
                ->whereIn('materials.site_id', [0, base64_decode($request->site_id)])
                ->where('materials.is_active',1)
                ->select('materials.*', 'units.unit_name')->get();
        } else {

            $options = Material_model::leftjoin('units', 'units.unit_id', 'materials.material_unit')
                ->where('material_type', $material_type)
                ->whereIn('materials.site_id', [0, base64_decode($request->site_id)])
                ->where('materials.is_active',1)
                ->select('materials.*', 'units.unit_name')->get();
        }
        // dd($options);
        return response()->json($options);
    }

    public function get_machine_options(Request $request, $machine_type)
    {

        // dd($request->selectedOptions);
        if ($request->selectedOptions) {

            $options = Machines_model::leftjoin('machine_types', 'machine_types.mach_type_id', 'machines.machine_type')->where('machines.machine_type', $machine_type)->whereNotIn('machines.machine_id', $request->selectedOptions)->select('machines.*', 'machine_types.machine_type')->get();
        } else {

            $options = Machines_model::leftjoin('machine_types', 'machine_types.mach_type_id', 'machines.machine_type')->where('machines.machine_type', $machine_type)->select('machines.*', 'machine_types.machine_type')->get();
        }
        // dd($options);
        return response()->json($options);
    }
    public function get_user_options(Request $request, $department_id)
    {
        // dd($request->selectedOptions);
        if ($request->selectedOptions) {

            $options = Users_model::leftjoin('roles', 'roles.role_id', 'users.user_role')->where('users.user_role', $department_id)->whereNotIn('users.user_id', $request->selectedOptions)->select('users.*', 'roles.role_name')->get();
        } else {

            $options = Users_model::leftjoin('roles', 'roles.role_id', 'users.user_role')->where('users.user_role', $department_id)->select('users.*', 'roles.role_name')->get();
        }
        // dd($options);
        return response()->json($options);
    }



    public function get_machine_cost(Request $request)
    {
        // dd($request->all());
        // dd($request->selectedOptions);
        // if ($request->selectedOptions) {

        //     $options = Machines_model::leftjoin('machine_types', 'machine_types.mach_type_id', 'machines.machine_type')->where('machines.machine_type', $machine_type)->whereNotIn('machines.machine_id', $request->selectedOptions)->select('machines.*', 'machine_types.machine_type')->get();
        // } else {

        //     $options = Machines_model::leftjoin('machine_types', 'machine_types.mach_type_id', 'machines.machine_type')->where('machines.machine_type', $machine_type)->select('machines.*', 'machine_types.machine_type')->get();
        // }
        $machine_cost = Machines_model::where('machines.machine_id', $request->machine_id)->select('machines.machine_cost_per_hrs')->get();
        return response()->json($machine_cost);
    }


    public function weekly_plan(Request $request)
    {

        $result = [];
        $result['site_id'] = $request->site_id;
        $result['chainage_id'] = $request->chainage_id;

        $result['weeklyplan_data'] = SiteWeeklyPlan::leftJoin('road_components', 'road_components.component_id', 'site_weekly_plans.component_id')->where('chainage_id', base64_decode($request->chainage_id))->select('site_weekly_plans.*', 'road_components.component_name')->get();
        // dd($result['weeklyplan_data']);

        $result['site'] = $this->siteservice->get_site($request->all());
        return view('admin/weekly_plan_list', $result);
    }

    public function add_weekly_plan(Request $request)
    {
        // dd($request->all());
        $result['site_id_decoded'] = base64_decode($request->site_id);
        $result['chainage_id_decoded'] = base64_decode($request->chainage_id);
        $result['site_id'] = $request->site_id;
        $result['chainage_id'] = $request->chainage_id;

        // $result['site_chainage'] =  ComponentChainageModel::where('site_id',base64_decode($result['site_id']))->get()->toArray();
        // dd($result['site_chainage']);
        $result['site'] = $this->siteservice->get_site($request->all());
        // dd($result['site']);

        //if minValue and maxValue is provided by user then we use this if condition
        if ((!empty($request->minValue) || $request->minValue == "0") && !empty($request->maxValue)) {
            // dd($result['site_id_decoded']);
            $result['site_chainages'] = ComponentChainageModel::select('road_components_chainage.*', 'road_components.component_name')
                ->leftjoin('road_components', 'road_components.component_id', 'road_components_chainage.component_id')
                ->where('road_components_chainage.site_id', $result['site_id_decoded'])
                ->where('road_components_chainage.to_length', '<=', $request->maxValue)
                ->where('road_components_chainage.from_length', '>=', $request->minValue)
                // ->orWhereNull('road_components_chainage.from_length')
                ->get()->toArray();
        // dd( $result['site_chainages']);
            if ($result['site_chainages']) {
                $result['chainage_id_decoded'] = $result['site_chainages'][0]['chainage_id'];
                $result['chainage_id'] = base64_encode($result['site_chainages'][0]['chainage_id']);
            } else {
                $result['chainage_id_decoded'] = "";
                $result['chainage_id'] = "";
            }
        } else {
            $result['site_chainages'] = ComponentChainageModel::select('road_components_chainage.*', 'road_components.component_name')
                ->leftjoin('road_components', 'road_components.component_id', 'road_components_chainage.component_id')
                ->where('site_id', $result['site_id_decoded'])->get()->toArray();
            // dd($result['site_chainages']);
        }



        $result['min_from_max_to'] = DB::table('road_components_chainage')->select(DB::raw('MIN(CAST(from_length AS int)) AS min_from_length, MAX(CAST(to_length AS int)) AS max_to_length'))->where('site_id', $result['site_id_decoded'])->get();
        // dd($result['min_from_max_to']);

        $result['materials'] = Material_model::select('materials.*', 'material_types.material_type', 'units.unit_name')
            ->leftJoin("material_types", "materials.material_type", "=", "material_types.mtype_id")
            ->leftJoin("units", "units.unit_id", "=", "materials.material_unit")
            ->get()->toArray();
        $result['labours'] = Labour::get()->toArray();
        $request = $request->all();
        $result['assets'] = $this->assetservice->get_assets($request);
        // dd($result['labours']);

        $result['monitering_activity_attached_to_chainage'] = MonitorTender::select('monitor_tenders.*', 'monitoring_activities.activity_name')
            ->leftJoin("monitoring_activities", "monitoring_activities.activity_id", "=", "monitor_tenders.monitor_activity_id")
            ->where('chainage_id', $result['chainage_id_decoded'])
            ->get()->toArray();
        // dd($result['monitering_activity_attached_to_chainage']);
        return view('admin/add_weekly_plan', $result);
    }


    public function view_weekly_plan(Request $request)
    {
        // dd($request->all());
        $result['site_id_decoded'] = base64_decode($request->site_id);
        $result['chainage_id_decoded'] = base64_decode($request->chainage_id);
        $result['site_weekly_plan_id'] = ($request->site_weekly_plan_id);
        $result['site_id'] = $request->site_id;
        $result['chainage_id'] = $request->chainage_id;
        $result['chainage_id_decoded'] = base64_decode($request->chainage_id);
        $result['site'] = $this->siteservice->get_site($request->all());
        // dd($result['site']);


        $result['weeklyplan_data'] = SiteWeeklyPlan::with('materials')->with('machines')->with('labours')->with('extrafields')->leftJoin('road_components', 'road_components.component_id', 'site_weekly_plans.component_id')
            ->leftJoin('road_components_chainage', 'road_components_chainage.chainage_id', 'site_weekly_plans.chainage_id')
            ->leftJoin('monitoring_activities', 'monitoring_activities.activity_id', 'site_weekly_plans.monitor_activity_id')
            ->where('site_weekly_plans.chainage_id', base64_decode($request->chainage_id))
            ->where('site_weekly_plan_id', $result['site_weekly_plan_id'])
            ->select(
                'site_weekly_plans.*',
                'road_components.component_name',
                'road_components_chainage.from_length',
                'road_components_chainage.to_length',
                'road_components_chainage.chainage_foundation_height as road_chainage_foundation_height',
                'road_components_chainage.chainage_pier_height as road_chainage_pier_height',
                'road_components_chainage.chainage_pier_cap_height as road_chainage_pier_cap_height',
                'road_components_chainage.chainage_max_elevation_height as road_chainage_max_elevation_height',
                'road_components_chainage.chainage_max_depth_at_center as road_chainage_max_depth_at_center',
                'road_components_chainage.chainage_width as road_chainage_width',
                'road_components_chainage.chainage_thickness as road_chainage_thickness',
                'road_components_chainage.chainage_height as road_chainage_height',
                'monitoring_activities.activity_name'
            )
            ->get()->toArray();
        // dd($result['weeklyplan_data']);
        return view('admin/view_weekly_plan', $result);
    }
    function save_weekly_plan_old(Request $request)
    {
        // dd($request->all());
        $data = 0;
        $component_id_data = ComponentChainageModel::select('component_id')->where('chainage_id', base64_decode($request->chainage_list))->get()->first();
        // $site_plan_machine =   SiteWeeklyPlan::updateOrCreate(
        //     // ['site_plan_machine_id' =>  count($request->site_plan_machine_id) > $key ? $request->site_plan_machine_id[$key] : ''],  // Condition to check for existing record
        //     [
        //         'site_id'=> base64_decode($request->site_id),
        //         'component_id'=> $component_id_data->component_id,
        //         'chainage_id'=> base64_decode($request->chainage_list)
        //     ],
        //     [

        //         'site_id'=> base64_decode($request->site_id),
        //         'component_id'=> $component_id_data->component_id,
        //         'chainage_id'=> base64_decode($request->chainage_list),
        //         'chainage_from_length' =>$request->chainage_from,
        //         'chainage_to_length'=>$request->chainage_to,
        //         'chainage_height'=>$request->chainage_height?$request->chainage_height:Null,
        //         'chainage_max_elevation_height'=>$request->chainage_max_elevation_height?$request->chainage_max_elevation_height:Null,
        //         'chainage_max_depth_at_center'=>$request->chainage_max_depth_at_center?$request->chainage_max_depth_at_center:Null,
        //         'chainage_foundation_height'=>$request->chainage_foundation_height?$request->chainage_foundation_height:Null,
        //         'chainage_pier_height'=>$request->chainage_pier_height?$request->chainage_pier_height:Null,
        //         'chainage_pier_cap_height'=>$request->chainage_pier_cap_height?$request->chainage_pier_cap_height:Null,
        //         'chainage_width'=>$request->chainage_width?$request->chainage_width:Null,
        //         'chainage_thickness'=>$request->chainage_thickness?$request->chainage_thickness:Null,
        //         'plan_start_date' =>$request->plan_start,
        //         'plan_end_date'=>$request->plan_end,
        //         'monitor_activity_id' =>$request->activity_list,
        //         'plain_or_lhs_rhs' =>$request->options,      // if 1= REGULAR PLAIN ROAD. 2= EITHER LHS ROAD OR RHS ROAD
        //         'lhs_rhs_both' =>$request->lhs_and_rhs,      // if 1= LHS ROAD. 2= RHS ROAD. 3= BOTH(LHS and RHS)
        //         'lhs_start_date'=> $request->lhs_start2,
        //         'lhs_end_date'=> $request->lhs_start2,
        //         'rhs_start_date' => $request->rhs_start3,
        //         'rhs_end_date'=> $request->rhs_end3,
        //         'created_by' => $request->role,
        //         'updated_by' => $request->role,
        //         'is_active'=> 1,

        //     ]   // Data to update or create
        // );
        $site_plan_machine =   SiteWeeklyPlan::Create(
            [

                'site_id' => base64_decode($request->site_id),
                'component_id' => $component_id_data->component_id,
                'chainage_id' => base64_decode($request->chainage_list),
                'chainage_from_length' => $request->chainage_from,
                'chainage_to_length' => $request->chainage_to,
                'chainage_height' => $request->chainage_height ? $request->chainage_height : Null,
                'chainage_max_elevation_height' => $request->chainage_max_elevation_height ? $request->chainage_max_elevation_height : Null,
                'chainage_max_depth_at_center' => $request->chainage_max_depth_at_center ? $request->chainage_max_depth_at_center : Null,
                'chainage_foundation_height' => $request->chainage_foundation_height ? $request->chainage_foundation_height : Null,
                'chainage_pier_height' => $request->chainage_pier_height ? $request->chainage_pier_height : Null,
                'chainage_pier_cap_height' => $request->chainage_pier_cap_height ? $request->chainage_pier_cap_height : Null,
                'chainage_width' => $request->chainage_width ? $request->chainage_width : Null,
                'chainage_thickness' => $request->chainage_thickness ? $request->chainage_thickness : Null,
                'plan_start_date' => $request->plan_start,
                'plan_end_date' => $request->plan_end,
                'monitor_activity_id' => $request->activity_list,
                'plain_or_lhs_rhs' => $request->options,      // if 1= REGULAR PLAIN ROAD. 2= EITHER LHS ROAD OR RHS ROAD
                'lhs_rhs_both' => $request->lhs_and_rhs,      // if 1= LHS ROAD. 2= RHS ROAD. 3= BOTH(LHS and RHS)
                'lhs_start_date' => $request->lhs_start2,
                'lhs_end_date' => $request->lhs_end2,
                'rhs_start_date' => $request->rhs_start3,
                'rhs_end_date' => $request->rhs_end3,
                'created_by' => $request->role,
                'updated_by' => $request->role,
                'is_active' => 1,

            ]   // Data to update or create
        );
        // dd( $site_plan_machine->site_weekly_plan_id);
        if (!empty($request->extra) && !empty($request->extra_field_id)) {

            foreach ($request->extra_field_id as $key => $value) {
                // $site_plan_machine =   SiteWeeklyPlanExtraFields::updateOrCreate(
                //     // ['site_plan_machine_id' =>  count($request->site_plan_machine_id) > $key ? $request->site_plan_machine_id[$key] : ''],  // Condition to check for existing record
                //     [
                //         'site_weekly_plan_id'=> $site_plan_machine->site_weekly_plan_id,
                //         'site_id'=> base64_decode($request->site_id),
                //         'component_id'=> $component_id_data->component_id,
                //         'chainage_id'=> base64_decode($request->chainage_list),
                //     ],
                //     [
                //         'site_weekly_plan_id'=> $site_plan_machine->site_weekly_plan_id,
                //         'site_id'=> base64_decode($request->site_id),
                //         'component_id'=> $component_id_data->component_id,
                //         'chainage_id'=> base64_decode($request->chainage_list),
                //         'component_extra_field_id'=>$value,
                //         'quantity'=>$request->extra[$key],
                //         'created_by' => $request->role,
                //         'updated_by' => $request->role,
                //         'is_active'=> 1,

                //     ]   // Data to update or create
                // );
                $site_plan_machine =   SiteWeeklyPlanExtraFields::Create(
                    [
                        'site_weekly_plan_id' => $site_plan_machine->site_weekly_plan_id,
                        'site_id' => base64_decode($request->site_id),
                        'component_id' => $component_id_data->component_id,
                        'chainage_id' => base64_decode($request->chainage_list),
                        'component_extra_field_id' => $value,
                        'quantity' => $request->extra[$key],
                        'created_by' => $request->role,
                        'updated_by' => $request->role,
                        'is_active' => 1,

                    ]   // Data to update or create
                );
            }
        }


        // options Values =>  '1:plan road|2:lhs road or rhs road'
        //  if option 1 then get data from
        //  material_name array ,material_quantity array
        //  machine_name array,machine_quantity array
        //  labours_name array,labours_quantity array
        if ($request->options == "1") {
            foreach ($request->material_name as $key => $value) {
                $material_weekly_data = SiteWeeklyPlanMaterial::create([
                    'site_id' => base64_decode($request->site_id),
                    'site_weekly_plan_id' => $site_plan_machine->site_weekly_plan_id,
                    'component_id' => $component_id_data->component_id,
                    'chainage_id' => base64_decode($request->chainage_list),
                    'material_id' => $value,
                    'material_quantity' => $request->material_quantity[$key],
                    'plain_or_lhs_rhs' => $request->options,      // if 1= REGULAR PLAIN ROAD. 2= EITHER LHS ROAD OR RHS ROAD
                    'lhs_rhs_both' => $request->lhs_and_rhs,      // if 1= LHS ROAD. 2= RHS ROAD. 3= BOTH(LHS and RHS)
                    'lhs_start_date' => $request->lhs_start2,
                    'lhs_end_date' => $request->lhs_end2,
                    'rhs_start_date' => $request->rhs_start3,
                    'rhs_end_date' => $request->rhs_end3,
                    'created_by' => $request->role,
                    'updated_by' => $request->role,
                    'is_active' => 1,
                ]);
            }

            foreach ($request->machine_name as $key => $value) {
                $machine_weekly_data = SiteWeeklyPlanMachine::create([
                    'site_id' => base64_decode($request->site_id),
                    'site_weekly_plan_id' => $site_plan_machine->site_weekly_plan_id,
                    'component_id' => $component_id_data->component_id,
                    'chainage_id' => base64_decode($request->chainage_list),
                    'machine_id' => $value,
                    'machine_quantity' => $request->machine_quantity[$key],
                    'plain_or_lhs_rhs' => $request->options,      // if 1= REGULAR PLAIN ROAD. 2= EITHER LHS ROAD OR RHS ROAD
                    'lhs_rhs_both' => $request->lhs_and_rhs,      // if 1= LHS ROAD. 2= RHS ROAD. 3= BOTH(LHS and RHS)
                    'lhs_start_date' => $request->lhs_start2,
                    'lhs_end_date' => $request->lhs_end2,
                    'rhs_start_date' => $request->rhs_start3,
                    'rhs_end_date' => $request->rhs_end3,
                    'created_by' => $request->role,
                    'updated_by' => $request->role,
                    'is_active' => 1,
                ]);
            }


            foreach ($request->labours_name as $key => $value) {
                $labours_weekly_data = SiteWeeklyPlanLabour::create([
                    'site_id' => base64_decode($request->site_id),
                    'site_weekly_plan_id' => $site_plan_machine->site_weekly_plan_id,
                    'component_id' => $component_id_data->component_id,
                    'chainage_id' => base64_decode($request->chainage_list),
                    'labour_id' => $value,
                    'labour_quantity' => $request->labours_quantity[$key],
                    'plain_or_lhs_rhs' => $request->options,      // if 1= REGULAR PLAIN ROAD. 2= EITHER LHS ROAD OR RHS ROAD
                    'lhs_rhs_both' => $request->lhs_and_rhs,      // if 1= LHS ROAD. 2= RHS ROAD. 3= BOTH(LHS and RHS)
                    'lhs_start_date' => $request->lhs_start2,
                    'lhs_end_date' => $request->lhs_end2,
                    'rhs_start_date' => $request->rhs_start3,
                    'rhs_end_date' => $request->rhs_end3,
                    'created_by' => $request->role,
                    'updated_by' => $request->role,
                    'is_active' => 1,
                ]);
            }
            $data = 1;
        }



        //  options Values =>  '1:plan road|2:lhs road or rhs road'
        //  lhs_and_rhs Values=> '1:lhs road|2:rhs road|3:both(lhs and rhs)'
        //  if option 2 and lhs_and_rhs is 1 then get data from
        //  material_name2 array ,material_quantity2 array
        //  machine_name2 array,machine_quantity2 array
        //  labours_name2 array,labours_quantity2 array

        //  options Values =>  '1:plan road|2:lhs road or rhs road'
        //  lhs_and_rhs Values=> '1:lhs road|2:rhs road|3:both(lhs and rhs)'
        //  if option 2 and lhs_and_rhs is 2 then get data from
        //  material_name3 array ,material_quantity3 array
        //  machine_name3 array,machine_quantity3 array
        //  labours_name3 array,labours_quantity3 array


        //  options Values =>  '1:plan road|2:lhs road or rhs road'
        //  lhs_and_rhs Values=> '1:lhs road|2:rhs road|3:both(lhs and rhs)'
        //  if option 2 and lhs_and_rhs is 3 then get data from
        //  material_name2 array ,material_quantity2 array
        //  machine_name2 array,machine_quantity2 array
        //  labours_name2 array,labours_quantity2 array
        //  material_name3 array ,material_quantity3 array
        //  machine_name3 array,machine_quantity3 array
        //  labours_name3 array,labours_quantity3 array

        if ($request->options == "2") {
            if ($request->lhs_and_rhs == "1" || $request->lhs_and_rhs == "3") {
                foreach ($request->material_name2 as $key => $value) {
                    $material_weekly_data = SiteWeeklyPlanMaterial::create([
                        'site_id' => base64_decode($request->site_id),
                        'site_weekly_plan_id' => $site_plan_machine->site_weekly_plan_id,
                        'component_id' => $component_id_data->component_id,
                        'chainage_id' => base64_decode($request->chainage_list),
                        'material_id' => $value,
                        'material_quantity' => $request->material_quantity2[$key],
                        'plain_or_lhs_rhs' => $request->options,      // if 1= REGULAR PLAIN ROAD. 2= EITHER LHS ROAD OR RHS ROAD
                        'lhs_rhs_both' => $request->lhs_and_rhs,      // if 1= LHS ROAD. 2= RHS ROAD. 3= BOTH(LHS and RHS)
                        'lhs_or_rhs_material' => 1,
                        'lhs_start_date' => $request->lhs_start2,
                        'lhs_end_date' => $request->lhs_end2,
                        'rhs_start_date' => $request->rhs_start3,
                        'rhs_end_date' => $request->rhs_end3,
                        'created_by' => $request->role,
                        'updated_by' => $request->role,
                        'is_active' => 1,
                    ]);
                }

                foreach ($request->machine_name2 as $key => $value) {
                    $machine_weekly_data2 = SiteWeeklyPlanMachine::create([
                        'site_id' => base64_decode($request->site_id),
                        'site_weekly_plan_id' => $site_plan_machine->site_weekly_plan_id,
                        'component_id' => $component_id_data->component_id,
                        'chainage_id' => base64_decode($request->chainage_list),
                        'machine_id' => $value,
                        'machine_quantity' => $request->machine_quantity2[$key],
                        'plain_or_lhs_rhs' => $request->options,      // if 1= REGULAR PLAIN ROAD. 2= EITHER LHS ROAD OR RHS ROAD
                        'lhs_rhs_both' => $request->lhs_and_rhs,      // if 1= LHS ROAD. 2= RHS ROAD. 3= BOTH(LHS and RHS)
                        'lhs_or_rhs_machine' => 1,
                        'lhs_start_date' => $request->lhs_start2,
                        'lhs_end_date' => $request->lhs_end2,
                        'rhs_start_date' => $request->rhs_start3,
                        'rhs_end_date' => $request->rhs_end3,
                        'created_by' => $request->role,
                        'updated_by' => $request->role,
                        'is_active' => 1,
                    ]);
                }


                foreach ($request->labours_name2 as $key => $value) {
                    $labours_weekly_data2 = SiteWeeklyPlanLabour::create([
                        'site_id' => base64_decode($request->site_id),
                        'site_weekly_plan_id' => $site_plan_machine->site_weekly_plan_id,
                        'component_id' => $component_id_data->component_id,
                        'chainage_id' => base64_decode($request->chainage_list),
                        'labour_id' => $value,
                        'labour_quantity' => $request->labours_quantity2[$key],
                        'plain_or_lhs_rhs' => $request->options,      // if 1= REGULAR PLAIN ROAD. 2= EITHER LHS ROAD OR RHS ROAD
                        'lhs_rhs_both' => $request->lhs_and_rhs,      // if 1= LHS ROAD. 2= RHS ROAD. 3= BOTH(LHS and RHS)
                        'lhs_or_rhs_labour' => 1,
                        'lhs_start_date' => $request->lhs_start2,
                        'lhs_end_date' => $request->lhs_end2,
                        'rhs_start_date' => $request->rhs_start3,
                        'rhs_end_date' => $request->rhs_end3,
                        'created_by' => $request->role,
                        'updated_by' => $request->role,
                        'is_active' => 1,
                    ]);
                }
            }
            if ($request->lhs_and_rhs == "2" || $request->lhs_and_rhs == "3") {
                foreach ($request->material_name3 as $key => $value) {
                    $material_weely_data3 = SiteWeeklyPlanMaterial::create([
                        'site_id' => base64_decode($request->site_id),
                        'site_weekly_plan_id' => $site_plan_machine->site_weekly_plan_id,
                        'component_id' => $component_id_data->component_id,
                        'chainage_id' => base64_decode($request->chainage_list),
                        'material_id' => $value,
                        'material_quantity' => $request->material_quantity3[$key],
                        'plain_or_lhs_rhs' => $request->options,      // if 1= REGULAR PLAIN ROAD. 2= EITHER LHS ROAD OR RHS ROAD
                        'lhs_rhs_both' => $request->lhs_and_rhs,      // if 1= LHS ROAD. 2= RHS ROAD. 3= BOTH(LHS and RHS)
                        'lhs_or_rhs_material' => 2,
                        'lhs_start_date' => $request->lhs_start2,
                        'lhs_end_date' => $request->lhs_end2,
                        'rhs_start_date' => $request->rhs_start3,
                        'rhs_end_date' => $request->rhs_end3,
                        'created_by' => $request->role,
                        'updated_by' => $request->role,
                        'is_active' => 1,
                    ]);
                }


                foreach ($request->machine_name3 as $key => $value) {
                    $machine_weekly_data3 = SiteWeeklyPlanMachine::create([
                        'site_id' => base64_decode($request->site_id),
                        'site_weekly_plan_id' => $site_plan_machine->site_weekly_plan_id,
                        'component_id' => $component_id_data->component_id,
                        'chainage_id' => base64_decode($request->chainage_list),
                        'machine_id' => $value,
                        'machine_quantity' => $request->machine_quantity3[$key],
                        'plain_or_lhs_rhs' => $request->options,      // if 1= REGULAR PLAIN ROAD. 2= EITHER LHS ROAD OR RHS ROAD
                        'lhs_rhs_both' => $request->lhs_and_rhs,      // if 1= LHS ROAD. 2= RHS ROAD. 3= BOTH(LHS and RHS)
                        'lhs_or_rhs_machine' => 2,
                        'lhs_start_date' => $request->lhs_start2,
                        'lhs_end_date' => $request->lhs_end2,
                        'rhs_start_date' => $request->rhs_start3,
                        'rhs_end_date' => $request->rhs_end3,
                        'created_by' => $request->role,
                        'updated_by' => $request->role,
                        'is_active' => 1,
                    ]);
                }


                foreach ($request->labours_name3 as $key => $value) {
                    $labours_weekly_data = SiteWeeklyPlanLabour::create([
                        'site_id' => base64_decode($request->site_id),
                        'site_weekly_plan_id' => $site_plan_machine->site_weekly_plan_id,
                        'component_id' => $component_id_data->component_id,
                        'chainage_id' => base64_decode($request->chainage_list),
                        'labour_id' => $value,
                        'labour_quantity' => $request->labours_quantity3[$key],
                        'plain_or_lhs_rhs' => $request->options,      // if 1= REGULAR PLAIN ROAD. 2= EITHER LHS ROAD OR RHS ROAD
                        'lhs_rhs_both' => $request->lhs_and_rhs,      // if 1= LHS ROAD. 2= RHS ROAD. 3= BOTH(LHS and RHS)
                        'lhs_or_rhs_labour' => 2,
                        'lhs_start_date' => $request->lhs_start2,
                        'lhs_end_date' => $request->lhs_end2,
                        'rhs_start_date' => $request->rhs_start3,
                        'rhs_end_date' => $request->rhs_end3,
                        'created_by' => $request->role,
                        'updated_by' => $request->role,
                        'is_active' => 1,
                    ]);
                }
            }
            $data = 1;
        }
        if ($data == 1) {
            $result = array('status' => true, 'msg' => 'Weekly plan added successfully');
        } else {
            $result = array('status' => false, 'msg' => 'Something went wrong');
        }

        echo json_encode($result);
    }

    function save_weekly_plan(Request $request)
    {
        $data = 0;
        $component_id_data = ComponentChainageModel::select('component_id')
            ->where('chainage_id', base64_decode($request->chainage_list))
            ->first();

        $site_plan_machine = SiteWeeklyPlan::create([
            'site_id' => base64_decode($request->site_id),
            'component_id' => $component_id_data->component_id,
            'chainage_id' => base64_decode($request->chainage_list),
            'chainage_from_length' => $request->chainage_from,
            'chainage_to_length' => $request->chainage_to,
            'chainage_height' => $request->chainage_height ?: null,
            'chainage_max_elevation_height' => $request->chainage_max_elevation_height ?: null,
            'chainage_max_depth_at_center' => $request->chainage_max_depth_at_center ?: null,
            'chainage_foundation_height' => $request->chainage_foundation_height ?: null,
            'chainage_pier_height' => $request->chainage_pier_height ?: null,
            'chainage_pier_cap_height' => $request->chainage_pier_cap_height ?: null,
            'chainage_width' => $request->chainage_width ?: null,
            'chainage_thickness' => $request->chainage_thickness ?: null,
            'plan_start_date' => $request->plan_start,
            'plan_end_date' => $request->plan_end,
            'monitor_activity_id' => $request->activity_list,
            'plain_or_lhs_rhs' => $request->options,
            'lhs_rhs_both' => $request->lhs_and_rhs,
            'lhs_start_date' => $request->lhs_start2,
            'lhs_end_date' => $request->lhs_end2,
            'rhs_start_date' => $request->rhs_start3,
            'rhs_end_date' => $request->rhs_end3,
            'created_by' => $request->role,
            'updated_by' => $request->role,
            'is_active' => 1,
        ]);
        function call_user_func($table, $data, $tablename)
        {
            // dd($tablename);
            if ($tablename === 'material') {
                // dd($data);
                SiteWeeklyPlanMaterial::create($data);
            } elseif ($tablename === 'machine') {
                SiteWeeklyPlanMachine::create($data);
            } elseif ($tablename === 'labour') {
                SiteWeeklyPlanLabour::create($data);
            }
        }


        if (!empty($request->extra) && !empty($request->extra_field_id)) {
            foreach ($request->extra_field_id as $key => $value) {
                $site_plan_machine = SiteWeeklyPlanExtraFields::create([
                    'site_weekly_plan_id' => $site_plan_machine->site_weekly_plan_id,
                    'site_id' => base64_decode($request->site_id),
                    'component_id' => $component_id_data->component_id,
                    'chainage_id' => base64_decode($request->chainage_list),
                    'component_extra_field_id' => $value,
                    'quantity' => $request->extra[$key],
                    'created_by' => $request->role,
                    'updated_by' => $request->role,
                    'is_active' => 1,
                ]);
            }
        }

        // Helper function to aggregate quantities
        function aggregateItems($names, $quantities)
        {
            $aggregated = [];
            foreach ($names as $key => $value) {
                if (isset($aggregated[$value])) {
                    $aggregated[$value] += $quantities[$key];
                } else {
                    $aggregated[$value] = $quantities[$key];
                }
            }
            // dd( $aggregated);
            return $aggregated;
        }

        // Aggregating and inserting items
        function insertAggregatedItems($request, $site_plan_machine, $component_id_data, $names, $quantities, $table, $extraFields = [])
        {
            $aggregated = aggregateItems($names, $quantities);
            foreach ($aggregated as $id => $quantity) {
                $data = array_merge([
                    'site_id' => base64_decode($request->site_id),
                    'site_weekly_plan_id' => $site_plan_machine->site_weekly_plan_id,
                    'component_id' => $component_id_data->component_id,
                    'chainage_id' => base64_decode($request->chainage_list),
                    $table . '_id' => $id,
                    $table . '_quantity' => $quantity,
                    'plain_or_lhs_rhs' => $request->options,
                    'lhs_rhs_both' => $request->lhs_and_rhs,
                    'lhs_start_date' => $request->lhs_start2,
                    'lhs_end_date' => $request->lhs_end2,
                    'rhs_start_date' => $request->rhs_start3,
                    'rhs_end_date' => $request->rhs_end3,
                    'created_by' => $request->role,
                    'updated_by' => $request->role,
                    'is_active' => 1,
                ], $extraFields);

                call_user_func("SiteWeeklyPlan" . ucfirst($table) . "::create", $data, $table);
            }
        }



        if ($request->options == "1") {
            insertAggregatedItems($request, $site_plan_machine, $component_id_data, $request->material_name, $request->material_quantity, 'material');
            insertAggregatedItems($request, $site_plan_machine, $component_id_data, $request->machine_name, $request->machine_quantity, 'machine');
            insertAggregatedItems($request, $site_plan_machine, $component_id_data, $request->labours_name, $request->labours_quantity, 'labour');
            $data = 1;
        }

        if ($request->options == "2") {
            if ($request->lhs_and_rhs == "1" || $request->lhs_and_rhs == "3") {
                insertAggregatedItems($request, $site_plan_machine, $component_id_data, $request->material_name2, $request->material_quantity2, 'material', ['lhs_or_rhs_material' => 1]);
                insertAggregatedItems($request, $site_plan_machine, $component_id_data, $request->machine_name2, $request->machine_quantity2, 'machine', ['lhs_or_rhs_machine' => 1]);
                insertAggregatedItems($request, $site_plan_machine, $component_id_data, $request->labours_name2, $request->labours_quantity2, 'labour', ['lhs_or_rhs_labour' => 1]);
            }
            if ($request->lhs_and_rhs == "2" || $request->lhs_and_rhs == "3") {
                insertAggregatedItems($request, $site_plan_machine, $component_id_data, $request->material_name3, $request->material_quantity3, 'material', ['lhs_or_rhs_material' => 2]);
                insertAggregatedItems($request, $site_plan_machine, $component_id_data, $request->machine_name3, $request->machine_quantity3, 'machine', ['lhs_or_rhs_machine' => 2]);
                insertAggregatedItems($request, $site_plan_machine, $component_id_data, $request->labours_name3, $request->labours_quantity3, 'labour', ['lhs_or_rhs_labour' => 2]);
            }
            $data = 1;
        }

        $result = ($data == 1)
            ? ['status' => true, 'msg' => 'Weekly plan added successfully']
            : ['status' => false, 'msg' => 'Something went wrong'];

        echo json_encode($result);
    }
}
