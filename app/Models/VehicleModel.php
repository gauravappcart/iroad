<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\ActiveScope;

class VehicleModel extends Model
{
    use HasFactory ,SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'vehicles';

    protected $primaryKey = 'id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table

    protected static function boot()
    {
        parent::boot();

        // static::addGlobalScope(new ActiveScope);
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class,'asset_id','id');
    }

    public function vehicle_types()
    {
        return $this->belongsTo(VehicleTypesModel::class,'vehicle_type','id');
    }

    // public function loan_details()
    // {
    //     return $this->belongsTo(LoanModel::class,'id','vehicle_id');
    // }

    // public function job_details()
    // {
    //     return $this->belongsTo(JobsAssignModel::class,'id','vehicle_id');
    // }

    // public function crew_vehicle_allocation()
    // {
    //     return $this->hasMany(CrewAllocationModel::class,'vehicle_id');
    // }

    // public function crews_by_type()
    // {
    //     return $this->hasMany(CrewOperateModel::class,'vehicle_type','vehicle_type'); //first key is foreign key with relational model and second key is primary key for current model
    // }

    // public function types_crew_assign()
    // {
    //     return $this->hasMany(CrewOperateModel::class,'vehicle_type','vehicle_type'); //first key is foreign key with relational model and second key is primary key for current model
    // }
}
