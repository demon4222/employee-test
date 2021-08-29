<?php

namespace App\Models\Position;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'created_by', 'updated_by'];

    protected static function boot()
    {
        parent::boot();

        self::creating(function (Position $position) {
            $position->fill([
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]);
        });

        self::updating(function (Position $position) {
            $position->fill(['updated_by' => Auth::id()]);
        });
    }
}
