<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\GlobeScope;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenderItems extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at
    protected $guarded = []; //allow  fill all data in table
    protected $table = 'tender_items';
    protected $primaryKey = 'tender_item_id';



public function associated_unit_type()
{
    return $this->hasMany(Units::class, 'unit_id','tender_item_unit')->select('units.*');

}
}
