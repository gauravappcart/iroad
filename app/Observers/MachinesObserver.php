<?php

namespace App\Observers;

use App\Models\Machines_model;

class MachinesObserver
{
    /**
     * Handle the Machines_model "created" event.
     *
     * @param  \App\Models\Machines_model  $machines_model
     * @return void
     */
    public function created(Machines_model $machines_model)
    {
        $result = app('App\Http\Controllers\admin\Dashboard_controller')->logged_user();
        $machines_model->company_id = $result['user']->company_id;
        $machines_model->save();
    }

    /**
     * Handle the Machines_model "updated" event.
     *
     * @param  \App\Models\Machines_model  $machines_model
     * @return void
     */
    public function updated(Machines_model $machines_model)
    {
        //
    }

    /**
     * Handle the Machines_model "deleted" event.
     *
     * @param  \App\Models\Machines_model  $machines_model
     * @return void
     */
    public function deleted(Machines_model $machines_model)
    {
        //
    }

    /**
     * Handle the Machines_model "restored" event.
     *
     * @param  \App\Models\Machines_model  $machines_model
     * @return void
     */
    public function restored(Machines_model $machines_model)
    {
        //
    }

    /**
     * Handle the Machines_model "force deleted" event.
     *
     * @param  \App\Models\Machines_model  $machines_model
     * @return void
     */
    public function forceDeleted(Machines_model $machines_model)
    {
        //
    }
}
