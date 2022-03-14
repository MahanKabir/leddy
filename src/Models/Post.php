<?php


namespace Mahan\Leddy\Models;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'slug', 'parameters', 'status'];

    //relations

    //getters
    public function getTitle(){
        return $this->title;
    }

    public function getSlug(){
        return $this->slug;
    }

    public function getParameters(){
        return $this->parameters;
    }

    public function getStatus(){
        return $this->getStatus;
    }

    //scope
    public function scopeFilter(){

    }
}
