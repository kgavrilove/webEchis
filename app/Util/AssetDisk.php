<?php

namespace App\Util;

use App\Traits\UploadTrait;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class AssetDisk
{
    use UploadTrait;

    protected string $originalFolder='/uploads/assets';

    public function __construct()
    {

    }

    public function upload( UploadedFile $image, string $name , string $extension)  {

        $filePath = $this->originalFolder . $name . '.' . $image->getClientOriginalExtension();


        $newFile=$this->uploadOne($image, $this->originalFolder, 'public', $name,$extension);


        return $newFile;
    }

}
