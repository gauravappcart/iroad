<?php

namespace App\Observers;

use App\Models\Material_model;

class MaterialObserver
{
    /**
     * Handle the Material_model "created" event.
     *
     * @param  \App\Models\Material_model  $material_model
     * @return void
     */
    public function created(Material_model $material_model)
    {       
        $result = app('App\Http\Controllers\admin\Dashboard_controller')->logged_user();

        $material_model->company_id = $result['user']->company_id;
        $material_model->save();
    }

    /**
     * Handle the Material_model "updated" event.
     *
     * @param  \App\Models\Material_model  $material_model
     * @return void
     */
    public function updated(Material_model $material_model)
    {
        //
    }

    /**
     * Handle the Material_model "deleted" event.
     *
     * @param  \App\Models\Material_model  $material_model
     * @return void
     */
    public function deleted(Material_model $material_model)
    {
        //
    }

    /**
     * Handle the Material_model "restored" event.
     *
     * @param  \App\Models\Material_model  $material_model
     * @return void
     */
    public function restored(Material_model $material_model)
    {
        //
    }

    /**
     * Handle the Material_model "force deleted" event.
     *
     * @param  \App\Models\Material_model  $material_model
     * @return void
     */
    public function forceDeleted(Material_model $material_model)
    {
        //
    }
}
