<?php


namespace Mahan\Leddy\Http\Controllers\V1;

use Illuminate\Http\Request;
use Mahan\Leddy\Http\Controllers\BaseController;
use Mahan\Leddy\Http\Services\V1\PostService;
use Mahan\Leddy\Models\Post;


class PostController extends BaseController
{

    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(){

        $posts = Post::all();
        return response()->json(['data' => $posts], 200);
    }

    public function store(Request $request){

        $post = $this->postService->create($request);
        return response()->json(['data' => $post], 201);
    }

    public function update(Request $request){

        $post = $this->postService->edit($request);
        return response()->json(['data' => $post], 201);
    }

    public function delete(){

    }
}
