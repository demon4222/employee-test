<?php

namespace App\Models\Position;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'created_by', 'updated_by'];
}
