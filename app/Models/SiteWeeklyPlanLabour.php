<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteWeeklyPlanLabour extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps= true;
    protected $table="site_weekly_plan_labours";
    protected $primaryKey="site_weekly_plan_labour_id";
    protected $guarded = []; //allow  fill all data in table
}
