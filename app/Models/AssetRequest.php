<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at


    protected $table = 'asset_requests';

    protected $primaryKey = 'vehicle_types_request_id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table



    // Define the relationship with the MaterialType model
    public function vehical_type()
    {
        return $this->belongsTo(VehicleTypesModel::class,'vehicle_types_id','id');
    }


    public function site_plan_asset()
    {
        return $this->belongsTo(SitePlanAsset::class,'vehicle_types_id','vehicle_type_id');
    }

    // Define the relationship with the Site model
    public function site()
    {
        return $this->belongsTo(Sites_model::class, 'site_id', 'site_id');
    }
}
