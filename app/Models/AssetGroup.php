<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetGroup extends Model
{
    use HasFactory ,SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'assets_group';

    protected $primaryKey = 'id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table  

    public function assets_sub_group()
    {
        return $this->hasMany(AssetSubGroup::class,'group_id','id');
    }

    public function assets()
    {
        return $this->hasMany(Asset::class,'asset_group','id');
    }
}
