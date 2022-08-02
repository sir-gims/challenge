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

    public function setClicksTallyAttribute($value)
    {
        $this->attributes['clicksTally'] = $value;
    }

    public function setCompletedAttribute($value)
    {
        $this->attributes['completed'] = $value;
    }
}
