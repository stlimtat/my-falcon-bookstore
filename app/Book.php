<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function authors()
    {
        return $this->belongsToMany('App\Author', 'author_book');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'genre_book');
    }
}
