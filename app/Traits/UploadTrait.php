<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait UploadTrait
{
    /**
     * It takes an uploaded file, a folder, a disk, a filename, and an extension, and then stores the file in the specified
     * folder on the specified disk with the specified filename and extension
     *
     * @param UploadedFile uploadedFile The file that was uploaded.
     * @param folder The folder where the file will be stored.
     * @param disk The disk you want to store the file on.
     * @param filename The name of the file. If not provided, a random name will be generated.
     * @param extension The extension of the file. If you don't pass it, it will be automatically retrieved from the
     * uploaded file.
     *
     * @return The file name and path.
     */
    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null,  $extension = null)
    {
        $extension = !is_null($extension) ? $extension : $uploadedFile->getClientOriginalExtension();
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$extension, $disk);

        return $file;
    }
}
