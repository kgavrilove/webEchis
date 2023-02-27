<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Image;
use App\Util\AiDataService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected AiDataService $aiDataService;

    public function __construct() {
        $this->aiDataService = new AiDataService();
    }

    public function index()
    {
        return view('dashboard.index');
    }


    public function dominantColors(Request $request)
    {
        $data=$this->validate(request(), [
            'id' => 'required',
            'kClusters' => 'required',
        ]);

            //try catch
            $asset = Asset::findOrFail($data['id']);
            $pivot = $asset->image()->get();
            $assetImage = Image::findOrFail($pivot[0]['id']);
            //refactor
            $imgPath = $assetImage->path;
            $kClusters = $data['kClusters'];

            //try catch
            $result=[
                'dominant'=>$this->aiDataService->getDominantColorInfo($imgPath,$kClusters),
                'iten'=>$this->aiDataService->getItenColors($imgPath),
            ];

            return response()->json($result);
    }
}
