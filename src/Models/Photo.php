<?php


namespace Mahan\Leddy\Models;


use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $fillable = ['name', 'path'];

    //relations

    //getters
    public function getName(){
        return $this->name;
    }

    public function getPath(){
        return $this->path;
    }

    //scope
    public function scopeFilter(){

    }
}
