<?php

namespace App\Observers;

use App\Models\Users_model;

class UsersObserver
{
    /**
     * Handle the Users_model "created" event.
     *
     * @param  \App\Models\Users_model  $users_model
     * @return void
     */
    public function created(Users_model $users_model)
    {
        $result = app('App\Http\Controllers\admin\Dashboard_controller')->logged_user();
// dd($result);
        $users_model->company_id = $result['user']->company_id;
        $users_model->save();
    }

    /**
     * Handle the Users_model "updated" event.
     *
     * @param  \App\Models\Users_model  $users_model
     * @return void
     */
    public function updated(Users_model $users_model)
    {
        //
    }

    /**
     * Handle the Users_model "deleted" event.
     *
     * @param  \App\Models\Users_model  $users_model
     * @return void
     */
    public function deleted(Users_model $users_model)
    {
        //
    }

    /**
     * Handle the Users_model "restored" event.
     *
     * @param  \App\Models\Users_model  $users_model
     * @return void
     */
    public function restored(Users_model $users_model)
    {
        //
    }

    /**
     * Handle the Users_model "force deleted" event.
     *
     * @param  \App\Models\Users_model  $users_model
     * @return void
     */
    public function forceDeleted(Users_model $users_model)
    {
        //
    }
}
