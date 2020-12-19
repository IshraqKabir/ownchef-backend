<?php

namespace App\Http\Controllers\API;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function store()
    {
        $data = request()->validate([
            'image' => 'required|image|max:10000',
            // 'model' => 'required|string|in:quiz,question,option',
            'prev_image_id' => 'integer',
        ]);

        if (isset($data['prev_image_id'])) {
            $prev_image = Image::find($data['prev_image_id']);
            $prev_image->delete_image();
        }

        $image_link = $data['image']->store('', 'public');

        $image = Image::create(['image_link' => $image_link]);

        return $image;
    }
    
    public function delete (Image $image) {
        $image->delete_image();

        return 'deleted';
    }
}
