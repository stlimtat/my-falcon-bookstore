<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'description', 'release_date', 'created_by', 'updated_by'];

    public function authors()
    {
        return $this->belongsToMany('App\Author', 'author_book');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'genre_book');
    }
}
