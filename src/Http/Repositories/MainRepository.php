<?php


namespace Mahan\Leddy\Http\Repositories;


abstract class MainRepository
{
    abstract public function model();

    public function __construct()
    {
        $this->model = app($this->model());
    }

    public function all(){
        return $this->model->orderBy('update_at', 'desc')->filter()->get();
    }

    public function paginate($paginate=15){
        return $this->model->orderBy('update_at', 'desc')->filter()->paginate($paginate);
    }

    public function getBy($col, $value, $limit=15){
        return $this->model->where($col, $value)->limit($limit)->filter()->get();
    }

    public function create(array $data){
        return $this->model->create($data);
    }

    public function find($id){
        return $this->model->find($id);
    }

    public function update($id, array $data){

        return $this->model->whereId($id)->update($data);
    }

    public function exists($id){
        return $this->model->where('id', $id)->exists();
    }
}
