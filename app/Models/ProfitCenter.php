<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\ActiveScope;

class ProfitCenter extends Model
{
    use HasFactory ,SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'profit_center';

    protected $primaryKey = 'id';   //make default primary key

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope(new ActiveScope);
    // }
    protected $guarded = []; //allow  fill all data in table

    public function vehicles()
    {
        return $this->hasMany(VehicleModel::class,'profit_center','id');
    }
    // public function site_address()
    // {
    //     return $this->hasMany(SiteAddress::class,'profit_center','id');
    // }
    // public function petroleum()
    // {
    //     return $this->hasMany(Petroleum::class,'profit_center','id');
    // }

}
