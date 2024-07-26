<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\GlobeScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\CommonTrait;

class Sites_model extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'sites';

    protected $primaryKey = 'site_id';   //make default primary key

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

    public function associated_project_components()
    {
        // return $this->hasMany(ComponentChainageModel::class, 'site_id')->leftJoin('road_components','road_components.component_id','road_components_chainage.component_id')->select('road_components_chainage.*','road_components.component_name','road_components.component_icon_file','road_components.dimentionstype')->orderBy('road_components.component_name');
        return $this->hasMany(ComponentChainageModel::class, 'site_id')->leftJoin('road_components','road_components.component_id','road_components_chainage.component_id')->select('road_components_chainage.*','road_components.component_name','road_components.component_icon_file','road_components.dimentionstype')->orderBy('road_components_chainage.created_at');

    }
}
