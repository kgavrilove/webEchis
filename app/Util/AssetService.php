<?php

namespace App\Util;

use App\Jobs\UploadImageJob;
use App\Models\AiData;
use App\Models\Asset;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssetService
{
    private AssetDisk $assetDisk;

    public function __construct() {
        $this->assetDisk=new AssetDisk();
    }

    public function getAllAssets(): array {
        $data=[];
        foreach (Asset::all() as $asset) {
            $id=$asset->getAttribute('id');
            $data[$id]['asset']=$asset->toArray();
            $data[$id]['image']=$asset->image()->get()->toArray();
            $data[$id]['aidata']=$asset->aiData()->get()->toArray();
        }

        return $data;
    }

    public function getAssetData(Asset $asset):array {

        try {
            $data['asset']=$asset->toArray();
            $data['image']=$asset->image()->get()->toArray();
            $data['aidata']=$asset->aiData()->get()->toArray();
        }
        catch (\Throwable $e) {
            return [];
        }
        return $data;

    }

    public function deleteAsset(Asset $asset ): bool {

        try {
            $image=$asset->image();
            $aidata=$asset->aidata();
            $asset->image()->detach();
            $asset->aidata()->detach();
            $asset->delete();
            $image->delete();
            $aidata->delete();
        } catch (\Throwable $e) {

        }
        return true;
    }

    public function editAsset(Asset $asset, array $data): bool {
        try {
            $asset->name=$data['name'];
            $asset->author=$data['author'];
            $pivot=$asset->aidata()->get();
            $aidata=AiData::findOrFail($pivot[0]['id']);
            $aidata->scheme=$data['scheme'];
            $aidata->a_color=$data['a_color'];
            $aidata->b_color=$data['b_color'];
            $aidata->c_color=$data['c_color'];
            $aidata->d_color=$data['d_color'];
            $aidata->e_color=$data['e_color'];
            $aidata->save();
            $asset->save();
        } catch (\Throwable $e) {
            return false;
        }
        return true;
    }

    public function addAsset( array $data, string $path, string $originalName, string $imageExtension): bool {

        $name = Str::slug($data['name']) . '-' .Str::slug($data['author']) ;


        try {
            $asset=Asset::create([
                'name' => $data['name'],
                'author' => $data['author'],
            ]);
            $image=Image::create([
                'path' => 'Nullable Path',
            ]);

            $aidata=AiData::create([
                'scheme' => 'Not_Processed',
                'a_color' => 'Not_Processed',
                'b_color' => 'Not_Processed',
                'c_color' => 'Not_Processed',
                'd_color' => 'Not_Processed',
                'e_color' => 'Not_Processed',
            ]);
            $asset->image()->attach([$image->id]);
            $asset->aidata()->attach([$aidata->id]);

        } catch (\Throwable $e) {
            return false;

        }
        UploadImageJob::dispatch($path, $originalName,$imageExtension, $name, $image);

        return true;
    }
}
