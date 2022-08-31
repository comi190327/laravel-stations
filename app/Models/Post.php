<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'movies';
    protected $fillable = ['title', 'image_url', 'published_year', 'is_showing', 'description'];
}
