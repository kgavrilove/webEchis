<?php

namespace App\Util;

class AiDataService
{

    protected EchisApiService $echisApiService;
    protected string $domain;
    protected string $path;

    public function __construct(){
        $this->echisApiService=new EchisApiService();
        $this->domain='http://webechis.loc';
        $this->path='/storage/';
    }

    public function getDominantColorInfo(string $imgPath, int $kClusters) {
        $arg=[
            'img_url'=> $this->domain.$this->path.$imgPath,
            'kClusters'=> $kClusters
        ];

        return $this->echisApiService->sendRequestDominant($arg);
    }

    public function getItenColors(string $imgPath, string $mode = 'rgb') {
        $arg=[
            'img'=> $this->domain.$this->path.$imgPath,
            'mode'=> $mode
        ];

        return $this->echisApiService->sendRequestIten($arg);
    }
}
