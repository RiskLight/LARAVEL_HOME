<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'year', 'custom_id', 'img_path', 'standart_id'];

    public function standarts ()
    {
        return $this->belongsTo(Standart::class);
    }

    public function comments ()
    {
        return $this->belongsToMany(Comment::class);
    }

    public function favorites ()
    {
        return $this->belongsTo(Favorite::class);
    }
}
