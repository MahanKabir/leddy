<?php


namespace Mahan\Leddy\Http\Services\V1;


use Illuminate\Http\Request;
use Mahan\Leddy\Http\Repositories\PostRepository;
use Mahan\Leddy\Models\Post;

class PostService
{

    protected $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request){

        $this->validation($request);

        $data = [
            'title' => $request->title,
            'parameters' => json_encode($request->parameters),
            'status' => $request->status,
        ];

        $post = $this->repository->create($data);

        return $post;
    }

    public function edit(Request $request){

        $this->validation($request);

        $data = [
            'title' => $request->title,
            'parameters' => $request->parameters,
            'status' => $request->status,
        ];

        $this->repository->update($request->id, $data);
        $post = $this->repository->find($request->id);

        return $post;
    }

    private function validation(Request $request){
        $request->validate([
            'title' => 'required',
        ]);
    }
}
