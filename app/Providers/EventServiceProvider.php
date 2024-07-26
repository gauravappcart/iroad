<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Observers\MaterialObserver;
use App\Observers\MachinesObserver;
use App\Observers\VendorObserver;
use App\Observers\UsersObserver;

use App\Models\Material_model;
use App\Models\Machines_model;
use App\Models\Vendors_model;
use App\Models\Users_model;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Material_model::observe(MaterialObserver::class);
        Machines_model::observe(MachinesObserver::class);
        Vendors_model::observe(VendorObserver::class);
        Users_model::observe(UsersObserver::class);
    }
}
