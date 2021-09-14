<?php

namespace App\Observers;

use App\Models\Position\Position;

class PositionObserver
{
    public function creating(Position $position)
    {
        $position->setAuthIdCreating();
    }

    public function updating(Position $position)
    {
        $position->setAuthIdUpdating();
    }
}
