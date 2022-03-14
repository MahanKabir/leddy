<?php


namespace Mahan\Leddy\Http\Controllers\V1;


use Illuminate\Http\Request;
use Mahan\Leddy\Http\Services\V1\PhotoService;
use Mahan\Leddy\Models\Photo;

class PhotoController
{
    protected $photoService;

    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;
    }

    public function image(){

        $photos = Photo::all();

        return response()->json(['data' => $photos], 200);
    }

    public function upload(Request $request){

        $updated_image = $request->image;

        $data = [
            'image' => $updated_image,
            'frame' => 'crop',
            'path' => 'images/leddy',
        ];

        $file = $this->photoService->upload($data, [
            'large' => [
                'w'=>512,
                'h'=>512,
            ],
        ]);

        $photos = $this->photoService->create($file);


        return response()->json(['data', $photos], 200);
    }
}
