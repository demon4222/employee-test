<?php

namespace App\Observers;

use App\Models\Position\Position;
use Illuminate\Support\Facades\Auth;

class PositionObserver
{
    public function creating(Position $position)
    {
        $position->created_by = Auth::id();
        $position->updated_by = Auth::id();
    }

    public function updating(Position $position)
    {
        $position->updated_by = Auth::id();
    }
}
