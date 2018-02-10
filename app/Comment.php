<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment','userid'];
    

    public function user()
    {
        return $this->belongsTo('App\User', 'userid');
    }
}
