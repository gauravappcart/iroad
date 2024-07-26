<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MonitorTender extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'monitor_tenders';

    protected $primaryKey = 'monitor_tender_id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table

    // public function associated_monitering_tenders()
    // {
    //     return $this->hasMany(Component_monitering_activity_mapping_model::class, 'monitor_tender_id');

    // }
    public function associated_monitering_tenders()
    {
        return $this->hasMany(ActivityTenderItemComponentMapping::class, 'monitor_tender_id');

    }
}
