<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component_monitering_activity_mapping_model extends Model
{
    use HasFactory;
    protected $table='component_monitering_activity_mapping';
    protected $fillable=['component_id', 'monitoring_activity_id'];
}
