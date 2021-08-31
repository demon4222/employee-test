<?php

namespace App\Observers;

use App\Contracts\AdminLoggable;

class EmployeeObserver
{
    public function creating(AdminLoggable $model)
    {
        $model->setAuthIdCreating();
    }

    public function updating(AdminLoggable $model)
    {
        $model->setAuthIdUpdating();
    }
}
