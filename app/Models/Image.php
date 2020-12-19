<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function delete_image() {
        if (file_exists(storage_path('app/public/') . $this->image_link)) {
            unlink(storage_path('app/public/') . $this->image_link);
        }

        $this->delete();
    }

}
