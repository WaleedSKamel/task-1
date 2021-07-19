<?php


namespace App\Helpers;


use App\Models\File;

class UploadFile
{


    public function upload($data = []){

        if (\request()->hasFile($data['file']) && $data['upload_type'] == 'single'){
            \Storage::has($data['delete_file']) ? \Storage::delete($data['delete_file']) : '' ;
            return  \request()->file($data['file'])->store($data['path']);
        }
    }
}
