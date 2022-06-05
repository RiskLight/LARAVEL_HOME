<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FilmUser extends Pivot
{
    use HasFactory;

    protected $table = 'film_user';
    protected $fillable = ['user_id', 'film_id'];

}
