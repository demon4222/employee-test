<?php

namespace App\Providers;

use App\Models\Employee\Employee;
use App\Models\Position\Position;
use App\Observers\EmployeeObserver;
use App\Observers\PositionObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
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
        Position::observe(PositionObserver::class);
        Employee::observe(EmployeeObserver::class);
    }
}
