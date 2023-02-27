<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Util\AssetService;
use Illuminate\Http\Request;

class TableController extends Controller
{
    private AssetService $assetService;

    public function __construct()
    {
        $this->assetService = new AssetService();
    }

    /**
     * The function index() is a public function that returns a view of the dashboard.table page with the data from the
     * getAllAssets() function
     *
     * @return The view is being returned.
     */
    public function index()
    {
        $data=$this->assetService->getAllAssets();
       //dd($data);
        return view('dashboard.table',['data'=>$data]);
    }

    /**
     * The function edit() is used to edit the asset details
     *
     * @param assetId The id of the asset to be edited.
     *
     * @return The view is being returned.
     */
    public function edit( $assetId)
    {
        $asset=Asset::findOrFail($assetId);
        try{
            $data=$this->assetService->getAssetData($asset);

        }catch (\Throwable $e) {
            throw new \RuntimeException('Failed Delete');
        }
        return view('dashboard.edit',['data'=>$data]);
    }
    /**
     * It edits an asset.
     *
     * @param Request request The request object.
     */
    public function editAsset(Request $request)
    {
        $assetData=$this->validate(request(), [
            'id' => 'required',
            'name' => 'required|max:32',
            'author' => 'required|max:32',
            'scheme' => 'required|max:16',
            'a_color' => 'required|max:3',
            'b_color' => 'required|max:3',
            'c_color' => 'required|max:3',
            'd_color' => 'required|max:3',
            'e_color' => 'required|max:3',
        ]);

        $asset=Asset::findOrFail($assetData['id']);
        try {
           $isWasEdit= $this->assetService->editAsset($asset,$assetData);
        } catch (\Throwable $e) {
            throw new \RuntimeException('Failed Delete');
        }
        $data = [
            'success' => $isWasEdit,
            'message'=> $isWasEdit ? 'success' : 'failed',
        ] ;
        return response()->json($data);
    }


    public function add()
    {
        return view('dashboard.upload');
    }

    /**
     * It takes a request, validates it, and then passes it to the service layer
     *
     * @param Request request The request object.
     *
     * @return The response is a json object with the following properties:
     * - success: boolean
     * - message: string
     * - img: string
     * - name: string
     * - extension: string
     */
    public function upload(Request $request)
    {

        $assetData=$this->validate(request(), [
            'name' => 'required|max:32',
            'author' => 'required|max:32',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif',

        ]);


            $imagePath=$request->file('img')->path();
            $imageName=$request->file('img')->getFilename();
            $imageExtension=$request->file('img')->getClientOriginalExtension();
        try {
            $isAdded= $this->assetService->addAsset($assetData, $imagePath, $imageName,$imageExtension);
        } catch (\Throwable $e) {
            $data = [
                'fail' => $e->getMessage(),
                'message'=> 'failed',
                'img'=>$imagePath,
                'name' => $imageName,
                'extension' => $imageExtension,
            ] ;
            return response()->json($data);
        }
        $data = [
            'success' => $isAdded,
            'message'=> $isAdded ? 'success' : 'failed',
            'img'=>$imagePath,
            'name' => $imageName,
            'extension' => $imageExtension,
        ] ;
        return response()->json($data);

    }

    /**
     * The function takes an assetId as a parameter, finds the asset in the database, and then calls the deleteAsset
     * function in the assetService
     *
     * @param assetId The id of the asset to be deleted.
     *
     * @return The asset is being deleted from the database.
     */
    public function delete( $assetId)
    {
        $asset=Asset::findOrFail($assetId);
        try{
            $this->assetService->deleteAsset($asset);
        } catch (\Throwable $e) {
            throw new \RuntimeException('Failed Delete');
        }
        return redirect()->route('table');
    }
    /**
     * It gets the asset by id and returns the view.
     *
     * @param assetId The id of the asset you want to view.
     *
     * @return The asset view is being returned.
     */
    public function asset( $assetId)
    {
        $asset=Asset::findOrFail($assetId);
        try{
            $data=$this->assetService->getAssetData($asset);
        } catch (\Throwable $e) {
            throw new \RuntimeException('Failed find by id');
        }
        return view('dashboard.asset',['data'=>$data]);
    }
    /**
     * It returns the view of the table.
     *
     * @return A view called table.
     */
    public function update()
    {
        return view('dashboard.table');
    }

    public function colors( $assetId)
    {
        $asset=Asset::findOrFail($assetId);
        try{
            $data=$this->assetService->getAssetData($asset);
        } catch (\Throwable $e) {
            throw new \RuntimeException('Failed find by id');
        }
        return view('dashboard.colors',['data'=>$data]);
    }
}
