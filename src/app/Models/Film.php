<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'year', 'film_path', 'img_path', 'standart_id'];

    public function standart()
    {
        return $this->belongsTo(Standart::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->using(FilmUser::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genre');
    }

    public function rate()
    {
        return $this->belongsToMany(Rate::class, 'rate');
    }
}
