<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\GlobeScope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComponentChainageModel extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'road_components_chainage';

    protected $primaryKey = 'chainage_id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table


    public function extra_fields()
    {
        return $this->hasMany(ComponentChainageExtraField::class,'chainage_id')
        ->leftJoin('component_extra_fields','component_chainage_extra_fields.component_extra_field_id','component_extra_fields.component_extra_field_id')
        ->leftjoin('units','units.unit_id','component_extra_fields.unit')
        ->select('component_chainage_extra_fields.*','component_extra_fields.field_name as extra_fname','units.unit_name as extra_unit');
    }
}
