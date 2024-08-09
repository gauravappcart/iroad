<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetSubGroup extends Model
{
    use HasFactory ,SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'assign_request_materials';

    protected $primaryKey = 'assign_request_material_id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table
}
