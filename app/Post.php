<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content', 'user_id'];

    //If we do not pass user_id as a fillable
    //Auth::user()->post()->create(['content']);

    public function user() {
        return $this->belongsTo('App\User');
    }
}
