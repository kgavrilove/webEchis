<?php

namespace App\Util;

use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;


class EchisApiService
{
    protected string $host;

    public function __construct() {
        $this->host= env('ECHIS_API_URL',null);

    }
        //refactor
    public function sendRequestDominant(array $arg) {

        if (empty($arg)){
            throw new Exception('Args is empty');
        }

        if (!isset($arg['img_url']) && !isset($arg['kClusters'])) {
            throw new Exception('Unprocessable keys');
        }
        $body=[];
        try {
            //maybe guzzle
            $response = Http::post($this->host.'/color/dominant'.
                '?img='.$arg['img_url'].'&kClusters='.$arg['kClusters']
                , [
                'img' => $arg['img_url'],
                'kClusters' => $arg['kClusters'],
            ]);
            $body= json_decode($response->body());
        } catch (\Throwable $e) {
            $body=[
                'status'=>'400', //refactor
                'error'=>$e->getMessage(),

            ];
        }
        return $body;
    }

    public function sendRequestIten(array $arg) {

        if (empty($arg)){
            throw new Exception('Args is empty');
        }

        if (!isset($arg['img']) && !isset($arg['mode'])) {
            throw new Exception('Unprocessable keys');
        }
        $body=[];
        try {
            //maybe guzzle
            $response = Http::post($this->host.'/color/itenAnalisys'.
                '?img='.$arg['img'].'&mode='.$arg['mode']
                , [
                    'img' => $arg['img'],
                    'mode' => $arg['mode'],
                ]);
            $body= json_decode($response->body());
        } catch (\Throwable $e) {
            $body=[
                'status'=>'400', //refactor
                'error'=>$e->getMessage(),

            ];
        }
        return $body;
    }
}
