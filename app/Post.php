<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //eager loading ~ associate user with the post
    public $with = ['user', 'likes'];

    protected $fillable = ['content', 'user_id'];

    //If we do not pass user_id as a fillable
    //Auth::user()->post()->create(['content']);

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function likes() {
        return $this->hasMany('App\Likes');
    }
}
