<?php

namespace App\Models;
use Illuminate\Http\Request;
use App\Scopes\GlobeScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class Material_model extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at


    protected $table = 'materials';

    protected $primaryKey = 'material_id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new GlobeScope);
    }

    public function material_type()
    {
        return $this->belongsTo(Material_types_model::class,'material_type');
    }

    public function companies()
    {
        return $this->belongsTo(Companies_model::class,'company_id');
    }

    public function materialRequests()
    {
        return $this->hasMany(MaterialRequest::class, 'material_id', 'material_id');
    }

    public function unit()
    {
        return $this->belongsTo(Units::class,'material_unit','unit_id');
    }
}
