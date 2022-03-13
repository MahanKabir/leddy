<?php


namespace Mahan\Leddy\Http\Controllers;

use Illuminate\Http\Request;
use Mahan\Leddy\Models\Post;


class PostController extends BaseController
{

    public function index(){

        $posts = Post::all();
        return response()->json(['data' => $posts], 200);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|unique:posts',
            'slug' => 'required|unique:posts',
        ]);

        $post = Post::create([
            'title' => $request->title,
//            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'parameters' => json_encode($request->parameters),
            'status' => $request->status,
        ]);

        return response()->json(['data' => $post], 201);
    }

    public function update(){

    }

    public function delete(){

    }
}
