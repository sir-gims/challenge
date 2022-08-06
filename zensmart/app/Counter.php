<?php

namespace App;

use Carbon\Carbon;
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

    public static function formatUpdatedAt($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
