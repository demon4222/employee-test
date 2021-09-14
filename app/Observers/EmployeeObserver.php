<?php

namespace App\Observers;

use App\Models\Employee\Employee;

class EmployeeObserver
{
    public function creating(Employee $employee)
    {
        $employee->setAuthIdCreating();
    }

    public function updating(Employee $employee)
    {
        $employee->setAuthIdUpdating();
    }
}
