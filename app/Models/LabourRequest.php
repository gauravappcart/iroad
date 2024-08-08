<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabourRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at


    protected $table = 'labour_requests';

    protected $primaryKey = 'labour_request_id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table

    public function labour_type()
    {
        return $this->belongsTo(Labour::class, 'labour_id', 'labour_id');
    }


    public function site_plan_labour()
    {
        return $this->belongsTo(SitePlanLabour::class,'labour_id','labour_id');
    }

    // Define the relationship with the Site model
    public function site()
    {
        return $this->belongsTo(Sites_model::class, 'site_id', 'site_id');
    }
}
