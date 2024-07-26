<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Units extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'units';

    protected $primaryKey = 'unit_id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table
}
