<?php

namespace App\Services;

use App\Models\Sites_model;
use App\Models\Road_components_model;
use App\Models\ComponentChainageModel;
use App\Models\TenderItems;
use App\Models\Units;
use App\Models\Activity_model;
use App\Models\ComponentChainageExtraField;

class SiteService
{
    public function getall_sites($request)
    {
        $resposne = [];

        $query = Sites_model::select('sites.*');
        !empty($request['site_id']) ? $query->where('site_id', base64_decode($request['site_id'])) : '' ;

        $sites = $query->get();
        if(!empty($sites))
        {
            $resposne = $sites->toArray();
        }

        return $resposne;
    }

    public function get_site($request)
    {
        $resposne = [];
        $added_by=$request['role'];
        $query = Sites_model::select('sites.*')

        ->with('associated_project_components',function($query1) use($added_by){
            $query1->with('extra_fields',function($query2) use($added_by){
            $query2->where('component_extra_fields.added_by', 'admin') ;
        $query2->where('component_extra_fields.added_by', $added_by) ;
        });
        })
        ;
        !empty($request['site_id']) ? $query->where('site_id', base64_decode($request['site_id'])) : '' ;
        $site = $query->first();

        if(!empty($site))
        {
            $resposne = $site->toArray();
        }

        return $resposne;
    }
    public function get_site_tender_item($request){
        $result['component_id']='';
        $result['chainage_id']=$request['chainage_id'];
        $result['site_id']=$request['site_id'];
        $result['component_info']=ComponentChainageModel::where('chainage_id',base64_decode($request['chainage_id']))->first();
        $result['tender_items_info']=TenderItems::where('chainage_id',base64_decode($request['chainage_id']))->get();
        if($result['tender_items_info']){
            $result['component_id']=$result['component_info']['component_id'];
        }

        $result['tender_items']=TenderItems::with('associated_unit_type')->where('site_id',base64_decode($request['site_id']))
        // ->where('chainage_id',base64_decode($request->chainage_id))->get();
        ->where('component_id', $result['component_id'])->get();
        // dd($request->tender_items);
        $result['units']=Units::all();
        $result['selectedUnitId']='';
        return $result;

    }
    public function get_site_components_old_working($request){

        $resposne = [];

        $query = ComponentChainageModel::select('road_components_chainage.*','road_components.component_name')->leftJoin('road_components','road_components.component_id','road_components_chainage.component_id');
        !empty($request['site_id']) ? $query->where('site_id', base64_decode($request['site_id'])) : '' ;
        $siteComponents = $query->get();
        // dd($siteComponents);
        if(!empty($siteComponents))
        {
            $resposne = $siteComponents->toArray();
        }
        return $resposne;

    }
     public function get_site_components($request){

        $resposne = [];
        $added_by=$request['role'];
        $query = ComponentChainageModel::select('road_components_chainage.*','road_components.component_name',)
        ->with('extra_fields',function($query2) use($added_by){
            $query2->where('component_extra_fields.added_by', 'admin') ;
        $query2->where('component_extra_fields.added_by', $added_by) ;
        })
        ->leftJoin('road_components','road_components.component_id','road_components_chainage.component_id');
        !empty($request['site_id']) ? $query->where('road_components_chainage.site_id', base64_decode($request['site_id'])) : '' ;

        $siteComponents = $query->get();
        // dd($siteComponents);
        if(!empty($siteComponents))
        {
            $resposne = $siteComponents->toArray();
        }
        // dd($resposne);
        return $resposne;

    }


    public function get_road_components($request)
    {
        $resposne = [];
        $role=$request['role'];
        // dd($request->all());
        $query = Road_components_model::select('road_components.*','project_types.project_type_name')->leftJoin('project_types','project_types.project_type_id','road_components.project_type_id')
        // ->leftJoin('component_monitering_activity_mapping','component_monitering_activity_mapping.component_id','road_components.component_id')
       ->with('associated_monitering_activity')
       ->with('associated_extra_fields',function($dd) use ($role) {
        $dd->where('component_extra_fields.added_by',$role);
        $dd->where('component_extra_fields.added_by','admin');
       })
       ;

       $road_components = $query->orderBy('road_components.component_name', 'ASC')->get();

        // dd($road_components);

        if(!empty($road_components))
        {
            $resposne = $road_components->toArray();
        }

        return $resposne;
    }

    public function add_component_chainage_old_working($request)
    {
        // return false;
        $componentsChainage=json_decode($request['chainage_data']);
        if(empty($componentsChainage)){

            $resposne = ['status'=>false,'message'=>'Data not found'];
            return $resposne;
        }
        // dd($componentsChainage);
        if(!empty($componentsChainage))
        {

            foreach($componentsChainage as $key=>$component_data)
            {
                if(!empty($component_data))
                {
                    foreach($component_data as $key1=>$chainage_data)
                    {
                        $componentChainage = ComponentChainageModel::firstOrCreate(
                            [
                                'site_id'=>$request['site_id'],
                                'component_id'=>$chainage_data->component,
                                'from_length'=>$chainage_data->chainage_from,
                                'to_length'=>$chainage_data->chainage_to
                            ],
                            [
                                'site_id'=>$request['site_id'],
                                'component_id'=>$chainage_data->component,
                                'from_length'=>$chainage_data->chainage_from,
                                'to_length'=>$chainage_data->chainage_to,
                            ]
                        );
                    }
                }

            }

            $resposne = ['status'=>true,'message'=>'Chainage data added successfully'];

        }

        // exit;
        // $query = Road_components_model::select('road_components.*');
        // $road_components = $query->orderBy('road_components.component_name', 'ASC')->get();
        // if(!empty($road_components))
        // {
        //     $resposne = $road_components->toArray();
        // }

        return $resposne;
    }
    public function add_component_chainage($request)
    {
        // dd($request);
        // return false;
        $componentsChainage=json_decode($request['chainage_data']);
        if(empty($componentsChainage)){

            $resposne = ['status'=>false,'message'=>'Data not found'];
            return $resposne;
        }
        // dd($componentsChainage);
        if(!empty($componentsChainage))
        {

            foreach($componentsChainage as $key=>$component_data)
            {
                if(!empty($component_data))
                {
                    foreach($component_data as $key1=>$chainage_data)
                    {

                        $componentChainage = ComponentChainageModel::firstOrCreate(
                            [
                                'site_id'=>$request['site_id'],
                                'component_id'=>$chainage_data->component,
                                'from_length'=>$chainage_data->chainage_from,
                                'to_length'=>$chainage_data->chainage_to,
                                'chainage_height'=>$chainage_data->chainage_height,
                                'chainage_foundation_height'=>$chainage_data->chainage_foundation_height,
                                'chainage_pier_height'=>$chainage_data->chainage_pier_height,
                                'chainage_pier_cap_height'=>$chainage_data->chainage_pier_cap_height,
                                'chainage_max_elevation_height'=>$chainage_data->chainage_max_elevation_height,
                                'chainage_max_depth_at_center'=>$chainage_data->chainage_max_depth_at_center,
                                'chainage_width'=>$chainage_data->chainage_width,
                                'chainage_thickness'=>$chainage_data->chainage_thickness,
                            ],
                            [
                                'site_id'=>$request['site_id'],
                                'component_id'=>$chainage_data->component,
                                'from_length'=>$chainage_data->chainage_from,
                                'to_length'=>$chainage_data->chainage_to,
                                'chainage_height'=>$chainage_data->chainage_height,
                                'chainage_foundation_height'=>$chainage_data->chainage_foundation_height,
                                'chainage_pier_height'=>$chainage_data->chainage_pier_height,
                                'chainage_pier_cap_height'=>$chainage_data->chainage_pier_cap_height,
                                'chainage_max_elevation_height'=>$chainage_data->chainage_max_elevation_height,
                                'chainage_max_depth_at_center'=>$chainage_data->chainage_max_depth_at_center,
                                'chainage_width'=>$chainage_data->chainage_width,
                                'chainage_thickness'=>$chainage_data->chainage_thickness,
                            ]
                        );


                        if($chainage_data->extras){
                            foreach($chainage_data->extras as $extraKey){
                                // print_r($extraKey->key.' ='.$extraKey->field_name);


                                $componentChainage = ComponentChainageExtraField::firstOrCreate(
                                    [
                                        'site_id'=>$request['site_id'],
                                        'component_id'=>$chainage_data->component,
                                        'chainage_id'=>$componentChainage->chainage_id,
                                        'component_extra_field_id'=>$extraKey->key,
                                        'field_name'=>$extraKey->field_name,
                                        'unit'=>$extraKey->unit,
                                        'quantity'=>$extraKey->value,
                                        'created_by'=>$request['role'],
                                        'updated_by'=>$request['role'],
                                        'is_active'=>1,
                                    ],
                                    [
                                        'site_id'=>$request['site_id'],
                                        'component_id'=>$chainage_data->component,
                                        'chainage_id'=>$componentChainage->chainage_id,
                                        'component_extra_field_id'=>$extraKey->key,
                                        'field_name'=>$extraKey->field_name,
                                        'unit'=>$extraKey->unit,
                                        'quantity'=>$extraKey->value,
                                        'created_by'=>$request['role'],
                                        'updated_by'=>$request['role'],
                                        'is_active'=>1,
                                    ]
                                );
                            }
                    }
                    // dd();
                    }

                }

            }

            $resposne = ['status'=>true,'message'=>'Chainage data added successfully'];

        }

        // exit;
        // $query = Road_components_model::select('road_components.*');
        // $road_components = $query->orderBy('road_components.component_name', 'ASC')->get();
        // if(!empty($road_components))
        // {
        //     $resposne = $road_components->toArray();
        // }

        return $resposne;
    }




    public function update_road_compenet($request){
        // dd($request);
		$fromlength=$request['fromlength'];
        $tolength=$request['tolength'];
        $chainage_height=$request['chainage_height'];
        $chainage_foundation_height=$request['chainage_foundation_height'];
        $chainage_pier_height=$request['chainage_pier_height'];
        $chainage_pier_cap_height=$request['chainage_pier_cap_height'];
        $chainage_max_elevation_height=$request['chainage_max_elevation_height'];
        $chainage_max_depth_at_center=$request['chainage_max_depth_at_center'];
        $chainage_width=$request['chainage_width'];
        $chainage_thickness=$request['chainage_thickness'];

        $chainage_id=$request['edit_chainage_id'];

		$site_id=base64_decode($request['site_id']);

            $road_component_arr = array(
                'from_length' => $fromlength,
                'to_length' => $tolength,
                'is_active' => 1,
                // 'created_by' => $this->session->userdata('login_id'),
                // 'created_date' => date("Y-m-d"),
			);
			// $this->db->where(['project_id' => $site_id,'id' => $component_id]);
			// $update_record=$this->db->update(TBL_ROAD_COMP_PLAN_PROJECT,$road_component_arr);


            $update_record = ComponentChainageModel::where([
                'site_id'=>$site_id,
                'chainage_id'=>$chainage_id
            ],)->update(
                [
                    'site_id'=>$site_id,
                    'chainage_id'=>$chainage_id,
                    'from_length'=>$fromlength,
                    'to_length'=>$tolength,
                   'chainage_height'=> $chainage_height,
                   'chainage_foundation_height'=> $chainage_foundation_height,
                    'chainage_pier_height'=>$chainage_pier_height,
                    'chainage_pier_cap_height'=>$chainage_pier_cap_height,
                    'chainage_max_elevation_height'=>$chainage_max_elevation_height,
                    'chainage_max_depth_at_center'=>$chainage_max_depth_at_center,
                    'chainage_width'=>$chainage_width,
                    'chainage_thickness'=>$chainage_thickness,
                ]
            );
            // if ($request->has('edit_extra_field_name') && is_array($request->input('edit_extra_field_name'))) {
            if(!empty($request['edit_extra_field_name'])){

                foreach($request['edit_extra_field_name'] as $key=>$value){
                    $update_record = ComponentChainageExtraField::where([
                        'site_id'=>$site_id,
                        'component_chainage_extra_field_id'=>$request['component_chainage_extra_field_id'][$key]
                    ],)->update(
                        [
                            'quantity'=>$value
                        ]
                    );
                }
            }
            // }
// dd($update_record);
		if ($update_record) {
                return ["status"=>1,"msg"=>"Road component update successfully."];
            } else {
				return ["status"=>0,"msg"=>"Road component failed to update."];
            }
	}


    public function remove_road_compenet($request){
		$chainage_id=$request['chainage_id'];
		$site_id=$request['site_id'];

		$delete_record =ComponentChainageModel::find($chainage_id)->delete();
		if($delete_record){
			return ["status"=>1,"msg"=>"Road component removed successfully"];
		} else {
			return ["status"=>0,"msg"=>"Road component failed to remove."];
		}

	}


    public function site_activities($request){

        $resposne = [];

        $query = Activity_model::select('monitoring_activities.*')->with('associated_project_components');
        !empty($request['site_id']) ? $query->where('site_id', base64_decode($request['site_id'])) : '' ;
        $site = $query->first();

        if(!empty($site))
        {
            $resposne = $site->toArray();
        }

        return $resposne;

    }

}
