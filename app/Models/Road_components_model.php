<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\GlobeScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;

class Road_components_model extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'road_components';

    protected $primaryKey = 'component_id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table

    use CommonTrait; // Attach the Sluggable trait to the model

    protected static function booted()
    {
        static::addGlobalScope(new GlobeScope);
		static::saving(function ($model) {
	            // Remember that $model here is an instance of Article
	            $model->company_id = $model->company_detail("");
        });
	}

    public function associated_monitering_activity()
    {
        return $this->hasMany(Component_monitering_activity_mapping_model::class, 'component_id');

    }

    public function associated_extra_fields()
    {
        return $this->hasMany(ComponentExtraField::class, 'component_id')
        ->leftjoin('units','units.unit_id','component_extra_fields.unit')
        ->select('component_extra_fields.*','component_extra_fields.field_name as extra_fname','units.unit_name as extra_unit');

    }
}
