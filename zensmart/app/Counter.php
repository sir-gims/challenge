<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    // fillables
    protected $fillable = [
        'clicksTally',
        'completed',
    ];

}
