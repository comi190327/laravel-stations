<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
   use HasFactory;
   public function scopeTitleEqual($query, $str)
   {
      return $query->where('title', $str);

   }
   public function schedules()
   {
    return $this->hasMany(Schedule::class);
   }
}
