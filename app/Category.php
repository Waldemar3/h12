<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function post(){
        return $this->hasOne(Post::class);
    }
}
