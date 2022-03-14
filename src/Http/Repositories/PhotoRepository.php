<?php


namespace Mahan\Leddy\Http\Repositories;


use Mahan\Leddy\Models\Photo;

class PhotoRepository extends MainRepository
{
    public function model(){
        return Photo::class;
    }
}
