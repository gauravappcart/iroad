<?php

namespace App\Observers;

use App\Models\Vendors_model;

class VendorObserver
{
    /**
     * Handle the Vendors_model "created" event.
     *
     * @param  \App\Models\Vendors_model  $vendors_model
     * @return void
     */
    public function created(Vendors_model $vendors_model)
    {
        $result = app('App\Http\Controllers\admin\Dashboard_controller')->logged_user();

        $vendors_model->company_id = $result['user']->company_id;
        $vendors_model->save();
    }

    /**
     * Handle the Vendors_model "updated" event.
     *
     * @param  \App\Models\Vendors_model  $vendors_model
     * @return void
     */
    public function updated(Vendors_model $vendors_model)
    {
        //
    }

    /**
     * Handle the Vendors_model "deleted" event.
     *
     * @param  \App\Models\Vendors_model  $vendors_model
     * @return void
     */
    public function deleted(Vendors_model $vendors_model)
    {
        //
    }

    /**
     * Handle the Vendors_model "restored" event.
     *
     * @param  \App\Models\Vendors_model  $vendors_model
     * @return void
     */
    public function restored(Vendors_model $vendors_model)
    {
        //
    }

    /**
     * Handle the Vendors_model "force deleted" event.
     *
     * @param  \App\Models\Vendors_model  $vendors_model
     * @return void
     */
    public function forceDeleted(Vendors_model $vendors_model)
    {
        //
    }
}
