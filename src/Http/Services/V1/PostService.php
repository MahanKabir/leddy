<?php


namespace Mahan\Leddy\Http\Services\V1;


use Illuminate\Http\Request;
use Mahan\Leddy\Http\Repositories\PostRepository;

class PostService
{

    protected $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request){

        $data = [
            'parameters' => json_encode($request->parameters),
        ];

        $post = $this->repository->create($data);

        return $post;
    }

    public function edit(Request $request){

        $data = [
            'parameters' => $request->parameters,
        ];

        $this->repository->update($request->id, $data);
        $post = $this->repository->find($request->id);

        return $post;
    }
}
