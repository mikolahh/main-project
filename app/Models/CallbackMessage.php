<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallbackMessage extends Model
{
    protected $fillable = ['name', 'phone', 'text'];
}
