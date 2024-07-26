<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ComponentChainageExtraField extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'component_chainage_extra_fields';

    protected $primaryKey = 'component_chainage_extra_field_id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table



    public function extra_fields2()
    {
        return $this->belongsTo(ComponentChainageModel::class,'chainage_id');
    }

}
