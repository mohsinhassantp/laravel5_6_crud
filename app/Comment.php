<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['description','author'];
    

    public function user()
    {
        return $this->belongsTo('App\User', 'author');
    }
}
