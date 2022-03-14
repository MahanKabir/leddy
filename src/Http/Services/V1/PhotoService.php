<?php


namespace Mahan\Leddy\Http\Services\V1;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Mahan\Leddy\Http\Repositories\PhotoRepository;

class PhotoService
{

    protected $repository;
    public function __construct(PhotoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($file){

        $data = [
            'name' => json_encode($file['name']),
            'path' => $file['directory'],
        ];
        $this->repository->create($data);

        $photos = $this->repository->all();

        return $photos;
    }

    public function upload($data, $sizes=[]){

        $image = base64_decode($this->base64trimmer($data['image']));
        $image_parts = explode(";base64,", $data['image']);
        $image_type = explode("image/", $image_parts[0]);

        $image_data = array();
        foreach ($sizes as $key=>$size){

            $image = $this->framePhoto($image, $size, $data['frame']);
            $name = $size['w'] . '-' . $size['h'] . '-' . time() . '.' . $image_type[1];
            Storage::disk('local')->put($data['path'] . "/{$name}", $image);
            $image_data[$key] = $name;
        }

        return ['name'=>$image_data, 'directory'=>$data['path']];
    }

    private function framePhoto($image, $size, $frame){
        switch ($frame){
            case 'resize':
                $image = base64_decode($this->base64trimmer(Image::make($image)->resize($size['w'], $size['h'])->encode('data-url')));
                break;
            case 'crop':
                $image = base64_decode($this->base64trimmer(Image::make($image)->crop($size['w'], $size['h'])->encode('data-url')));
                break;
        }

        return $image;
    }

    private function base64trimmer($data)
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {

            $data = substr($data, strpos($data, ',') + 1);
            $type = strtolower($type[1]);

            if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                throw new \Exception('Image Type is Not valid');
            }

            if ($data === false) {
                throw new \Exception('Failed to Decode BASE64');
            }

        } else {
            throw new \Exception('Data Not Matched With Image Data');
        }

        return $data;
    }
}
