<?php


namespace App\Traits;


use Illuminate\Support\Facades\Auth;

trait AdminLoggableTrait
{
    public function setAuthIdCreating()
    {
        $this->created_by = Auth::id();
        $this->updated_by = Auth::id();
    }

    public function setAuthIdUpdating()
    {
        $this->updated_by = Auth::id();
    }
}
