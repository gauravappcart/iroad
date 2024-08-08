<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at


    protected $table = 'material_requests';

    protected $primaryKey = 'material_request_id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table



    public function material()
    {
        return $this->belongsTo(Material_model::class, 'material_id', 'material_id');
    }

    // Define the relationship with the MaterialType model
    public function material_type()
    {
        return $this->belongsTo(Material_types_model::class,'material_type_id','mtype_id');
    }


    public function site_plan_material()
    {
        return $this->belongsTo(SitePlanMaterial::class,'material_id','material_id');
    }

    // Define the relationship with the Site model
    public function site()
    {
        return $this->belongsTo(Sites_model::class, 'site_id', 'site_id');
    }
}
