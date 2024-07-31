<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectComponent;
use App\Models\Component_monitering_activity_mapping_model;
use App\Models\Road_components_model;
use App\Models\ComponentExtraField;
use App\Models\Units;
use App\Models\ComponentChainageModel;
use Illuminate\Http\Request;
use App\Services\SiteService;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;

class ProjectComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    protected $components;
    public function __construct(SiteService $components)
    {
        $this->components = $components;
    }
    public function index(Request $request)
    {
        $result['projectComponents'] = $this->components->get_road_components($request);

        $result['projectTypes'] = DB::table('project_types')->get()->toArray();
        $result['monitoringActivities'] = DB::table('monitoring_activities')->get()->toArray();
        // dd($result['monitoringActivities']);
        $result['selectedProjectTypes'] = '';
        $result['selectedMonitoringActivities'] = '';
        $result['selectedActivityId'] = [];
        $result['units'] = Units::where('unit_for',1)->get()->toArray();

        return view('admin/component_list', $result);
    }
    public function add_component(Request $request)
    {
        // dd(session()->all());
        // dd($request->all());
        // dd($request['dynamicInput']);

        // foreach ($request['dynamicInput'] as $key=>$row) {
        //     $request['dynamicInputUnit'][$key];
        // }
        // dd();
        if (!empty($request['component_icon_file'])) {
            $fileName = date('d-m-Y') . '_' . str_replace(' ', '', $request->component_icon_file->getClientOriginalName());
            $path = 'assets/images/';
            $request->component_icon_file->move(public_path($path), $fileName);
            $filePath = $path . '' . $fileName;
        }
        // $dimentionstype = '';
        // foreach ($request['dimentionstype'] as $row) {
        //     $dimentionstype .= $row . ",";
        // }

        $componentData = array();
        $componentData['component_name'] = !empty($request['component_name']) ? $request['component_name'] : "";
        // $componentData['material_type']= !empty($material_type) ? ($material_type->vd_id ? $material_type->vd_id : $material_type->mtype_id) : 0 ;  //first time return vd_id then mtype_id
        $componentData['component_icon_file'] = !empty($request['component_icon_file']) ? $filePath : "";
        $componentData['project_type_id'] = !empty($request['project_type']) ? $request['project_type'] : "";
        $componentData['dimentionstype'] = NULL;
        // $componentData['dimentionstype'] = !empty($request['dimentionstype']) ? $dimentionstype : NULL;
        // dd($componentData);
        // $componentData['is_active']=!empty($request['is_active']) ? ($request['is_active']=="Yes" ? 1 : 0) : 1;
        $componentData = array_filter($componentData, function ($a) {
            return $a != '';
        });
        if (empty($request['component_id'])) {
            $componentAdded = Road_components_model::firstOrCreate(
                [
                    'component_name' => $componentData['component_name'],
                    'project_type_id' => $request['project_type_id']
                ],
                $componentData
            );
            if (!empty($request['monitering_activity']) &&  $componentAdded->component_id) {

                foreach ($request['monitering_activity'] as $row) {
                    Component_monitering_activity_mapping_model::create(
                        [
                            'component_id' => $componentAdded->component_id,
                            'monitoring_activity_id' => $row,
                        ]
                    );
                }
            }
        // dd($request['dynamicInputUnit']);
            if ($componentAdded->component_id) {
        if($request['dynamicInput']){
                foreach ($request['dynamicInput'] as $key => $row) {
                    $extraFieldSave = ComponentExtraField::firstOrCreate(
                        [
                           'component_id' => $componentAdded->component_id,
                            'added_by' => $request['role'],
                            'field_name' => $row,
                            'unit' => $request['dynamicInputUnit'][$key] ? $request['dynamicInputUnit'][$key] : null,
                            'is_active' => 1
                        ],
                        [
                            'component_id' => $componentAdded->component_id,
                            'added_by' => $request['role'],
                            'field_name' => $row,
                            'unit' => $request['dynamicInputUnit'][$key] ? $request['dynamicInputUnit'][$key] : null,
                            'created_by' => $request['role'],
                            'updated_by' => $request['role'],
                            'is_active' => 1
                        ]
                    );
                    // print_r($request['dynamicInputUnit'][$key]);
                    // print_r("\n");
                }
                // dd();
            }
            }
            if ($componentAdded->wasRecentlyCreated) {
                $result = array('status' => true, 'msg' => 'Component added successfully');
            } else {
                $result = array('status' => false, 'msg' => 'Component name already exists');
            }
        } else {

            if (!empty($request['delete'])) {

                $Check_component_used=ComponentChainageModel::where('component_id',$request['component_id'])->Where('deleted_at',Null)->get();
                if(count($Check_component_used)>=1){
                    $result = array('status' => true, 'msg' => 'Component can not deleted as its already used.');
                }else{
                    $deleted_data = Road_components_model::find($request['component_id'])->delete();
                    $deleted_data = Component_monitering_activity_mapping_model::where('component_id', $request['component_id'])->update(['deleted_at' => Carbon::now()->format('Y-m-d H:i:s')]);
                    $result = array('status' => true, 'msg' => 'Component deleted successfully');
                }

            } else {

                $material_update = Road_components_model::where('component_id', $request['component_id'])->update($componentData);
                $data = Component_monitering_activity_mapping_model::where('component_id', $request['component_id']);
                $data->delete();
                foreach ($request['monitering_activity'] as $row) {
                    Component_monitering_activity_mapping_model::create(
                        [
                            'component_id' => $request['component_id'],
                            'monitoring_activity_id' => $row,
                        ]
                    );
                }


                // dd($request->all());
                if($request['dynamicInput']){
                foreach ($request['dynamicInput'] as $key => $row) {
                    // $extraFieldSave = ComponentExtraField::where('component_id', $request['component_id'])->where('added_by', $request['role'])->where(  [
                    //     'component_id' => $request['component_id'],
                    //     'added_by' => $request['role'],
                    //     'field_name'=>$row,
                    //     'unit'=>$request['dynamicInputUnit'][$key]?$request['dynamicInputUnit'][$key]:null,
                    //     'created_by'=>$request['role'],
                    //     'updated_by'=>$request['role'],
                    //     'is_active'=>1
                    // ]);
// dd($key);
if( $request['component_extra_field_id']){
                    if (array_key_exists($key, $request['component_extra_field_id'])) {

                        $extraFieldSave = ComponentExtraField::updateOrCreate(
                            ['component_id' => $request['component_id'], 'added_by' => $request['role'], 'component_extra_field_id' => $request['component_extra_field_id'][$key]],
                            [
                                'component_id' => $request['component_id'],
                                'added_by' => $request['role'],
                                'field_name' => $row,
                                'unit' => $request['dynamicInputUnit'][$key] ? $request['dynamicInputUnit'][$key] : null,
                                'created_by' => $request['role'],
                                'updated_by' => $request['role'],
                                'is_active' => 1
                            ]
                        );
                    }  }else {

                        $extraFieldSave = ComponentExtraField::Create(
                            [
                                'component_id' => $request['component_id'],
                                'added_by' => $request['role'],
                                'field_name' => $row,
                                'unit' => $request['dynamicInputUnit'][$key] ? $request['dynamicInputUnit'][$key] : null,
                                'created_by' => $request['role'],
                                'updated_by' => $request['role'],
                                'is_active' => 1
                            ]
                        );
                    }

                }
            }
                // $data=Component_monitering_activity_mapping_model::where('component_id',$request['component_id'])->get()->toArray();
                // print_r(array_column($data,'monitoring_activity_id'));
                // echo "<br>";
                // print_r($request['monitering_activity']);
                // echo "<br>";
                // print_r(array_diff($request['monitering_activity'],array_column($data,'monitoring_activity_id')));
                // echo "<br>";
                // exit();

                //     if(sizeof(array_column($data,'monitoring_activity_id'))>sizeof($request['monitering_activity'])){
                //         // print_r(array_diff(array_column($data,'monitoring_activity_id'),$request['monitering_activity'])); // remove difference
                //         $removeActivity=(array_diff(array_column($data,'monitoring_activity_id'),$request['monitering_activity'])); // remove difference

                //         foreach($removeActivity as $row){
                //             $author = Component_monitering_activity_mapping_model::where('component_id',$request['component_id'])->where('monitoring_activity_id',$row);

                //             $author->delete();
                //        }
                //     }else{
                //         // print_r(array_diff($request['monitering_activity'],array_column($data,'monitoring_activity_id'))); // add difference
                //         $addActivity=(array_diff($request['monitering_activity'],array_column($data,'monitoring_activity_id'))); // add difference

                //         foreach($addActivity as $row){
                //             Component_monitering_activity_mapping_model::create(
                //              [
                //                  'component_id'=>$request['component_id'],
                //                  'monitoring_activity_id'=>$row,
                //              ]
                //              );
                //  }
                //     }

                if ($material_update) {
                    $result = array('status' => true, 'msg' => 'Component updated successfully');
                } else {
                    $result = array('status' => false, 'msg' => 'Something went wrong');
                }
            }
        }

        echo json_encode($result);
    }


    public function remove_component_extra_field(Request $request){
        // dd($request['component_extra_field_id']);
        $delete_record =ComponentExtraField::find($request['component_extra_field_id'])->delete();
		if($delete_record){
			return ["status"=>1,"msg"=>"Component extra field removed successfully"];
		} else {
			return ["status"=>0,"msg"=>"Component extra field failed to remove."];
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectComponent  $projectComponent
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectComponent $projectComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectComponent  $projectComponent
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectComponent $projectComponent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectComponent  $projectComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectComponent $projectComponent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectComponent  $projectComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectComponent $projectComponent)
    {
        //
    }
}
