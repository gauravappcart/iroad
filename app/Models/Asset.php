<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\ActiveScope;

class Asset extends Model
{
    use HasFactory ,SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'assets';

    protected $primaryKey = 'id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope(new ActiveScope);
    // }


    public function vehicle_details()
    {
        return $this->belongsTo(VehicleModel::class,'id','asset_id');
    }

    public function sub_group()
    {
        return $this->belongsTo(AssetSubGroup::class,'asset_sub_group','id');
    }

    // public function supplier()
    // {
    //     return $this->belongsTo(Supplier::class,'supplier','id');
    // }

    // public function asset_transactions()
    // {
    //     return $this->hasMany(AssetTransaction::class,'asset_id','id');
    // }


}
