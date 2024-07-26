<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteWeeklyPlan extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'site_weekly_plans';

    protected $primaryKey = 'site_weekly_plan_id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table


    public function activities()
    {
        return $this->hasMany(Activity_model::class,'activity_id','monitor_activity_id'); //machine_type is foreign key in Machines_model (child model)
    }

    public function materials()
    {
        return $this->hasMany(SiteWeeklyPlanMaterial::class,'site_weekly_plan_id')
        ->leftJoin('materials','materials.material_id','site_weekly_plan_materials.material_id')
        ->leftjoin('units','units.unit_id','materials.material_unit')
        ->select('site_weekly_plan_materials.*','materials.material_name','units.unit_name');
    }
    public function machines()
    {
        return $this->hasMany(SiteWeeklyPlanMachine::class,'site_weekly_plan_id')
        ->leftJoin('assets','assets.id','site_weekly_plan_machines.machine_id')
        // ->leftjoin('units','units.unit_id','component_extra_fields.unit')
        ->select('site_weekly_plan_machines.*','assets.asset_name');
    }

    public function labours()
    {
        return $this->hasMany(SiteWeeklyPlanLabour::class,'site_weekly_plan_id')
        ->leftJoin('labours','labours.labour_id','site_weekly_plan_labours.labour_id')
        // ->leftjoin('units','units.unit_id','component_extra_fields.unit')
        ->select('site_weekly_plan_labours.*','labours.labour_type');
    }

    public function extrafields()
    {
        return $this->hasMany(SiteWeeklyPlanExtraFields::class,'site_weekly_plan_id')
        ->leftjoin('component_chainage_extra_fields','component_chainage_extra_fields.component_chainage_extra_field_id','site_weekly_plan_extra_fields.component_extra_field_id')
        ->leftJoin('component_extra_fields','component_extra_fields.component_extra_field_id','component_chainage_extra_fields.component_extra_field_id')
        ->leftjoin('units','units.unit_id','component_extra_fields.unit')
        ->select('site_weekly_plan_extra_fields.*','component_extra_fields.field_name','component_chainage_extra_fields.quantity as chainage_extra_field_quanity','units.unit_name');
    }

}
