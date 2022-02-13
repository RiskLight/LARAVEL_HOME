<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public function format ()
    {
        return $this->hasOne(Format::class);
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
