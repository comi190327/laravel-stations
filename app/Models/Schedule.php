<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $dates = [
        'start_time',
        'end_time',
        'start_time_date',
        'start_time_time',
        'end_time_date',
        'end_time_time',
    ];
    use HasFactory;
    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
