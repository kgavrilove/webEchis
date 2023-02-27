<?php

namespace App\Jobs;

use App\Models\Image;
use App\Traits\UploadOneTrait;
use App\Util\AssetDisk;
use App\Util\ImageWorkService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;


class UploadImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected  string $src;
    protected  string $name;
    protected  string $originalName;
    protected  string $imageExtension;
    protected Image $image;
    protected AssetDisk $disk;


    public function __construct( string $path , string $originalName,$imageExtension,string $name, Image $image)
    {
        $this->src=$path;
        $this->name=$name;
        $this->imageExtension=$imageExtension;
        $this->originalName=$originalName;
        $this->image=$image;
        $this->disk=new AssetDisk();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {

        $file= new UploadedFile($this->src,$this->originalName);
        $filePath = $this->disk->upload($file,$this->name, $this->imageExtension);
        $this->image->path=$filePath;
        $this->image->save();
    }


}
