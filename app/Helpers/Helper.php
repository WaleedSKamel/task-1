<?php

# uploadFiles
if (!function_exists('UploadFiles')) {
    function UploadFiles()
    {
        return new \App\Helpers\UploadFile();
    }

}

# save data upload files
if (!function_exists('storeUpload')) {
    function storeUpload($file, $path, $upload_type, $delete_file = null, $file_type = null)
    {
        return UploadFiles()->upload([
            'file' => $file,
            'path' => $path,
            'upload_type' => $upload_type,
            'file_type' => $file_type, // ex : product ,new ,whatever
            'delete_file' => $delete_file,
        ]);
    }

}
# delete image
if (!function_exists('deleteFile')) {
    function deleteFile($file)
    {
        \Storage::delete($file->full_file);
    }
}


