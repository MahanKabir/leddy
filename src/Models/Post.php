<?php


namespace Mahan\Leddy\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;

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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }
}
