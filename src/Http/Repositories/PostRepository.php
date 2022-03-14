<?php


namespace Mahan\Leddy\Http\Repositories;


use Mahan\Leddy\Models\Post;

class PostRepository extends MainRepository
{
    public function model()
    {
        return Post::class;
    }
}
