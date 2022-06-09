<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table = 'rates';
    protected $fillable = ['points', 'film_id', 'user_id'];

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
