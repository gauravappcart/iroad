<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Conflicts extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $timestamps = true;  // will not take default column created_at and updated_at

    protected $table = 'conflicts';

    protected $primaryKey = 'conflict_id';   //make default primary key

    protected $guarded = []; //allow  fill all data in table

    public function companies()
    {
        return $this->belongsTo(Companies_model::class,'company_id');
    }
    public function sites()
    {
        return $this->belongsTo(Sites_model::class,'site_id');
    }
    public function conflicts_media()
    {
        return $this->belongsTo(ConflictsMedia::class,'conflict_id','conflict_id');
    }
    public function conflicts_resolved_information()
    {
        return $this->belongsTo(ConflictsResolvedInformation::class,'conflict_id','conflict_id');
    }
}
