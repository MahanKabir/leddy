<?php


namespace Mahan\Leddy\Models;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['parameters'];

    //getters
    public function getParameters(){
        return $this->parameters;
    }

}
