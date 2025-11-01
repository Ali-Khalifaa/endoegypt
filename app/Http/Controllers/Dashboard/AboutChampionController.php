<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AboutUsRequest;
use App\Http\Resources\Dashboard\AboutUsResource;
use App\Models\AboutChampion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AboutChampionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        // return [];
        return [
            new Middleware('can:about champion read', only: ['index']),
            new Middleware('can:about champion edit',only:['update']),
        ];
    }
    public function index(Request $request)
    {
        $AboutChampion = AboutChampion::searchAndFilter()->latest()->paginate(10);

        return responseJson(AboutUsResource::collection($AboutChampion->items()), 'AboutChampion', 200, getPaginates($AboutChampion));
    }

    public function show($id)
    {
        $AboutChampion = AboutChampion::with('translations')->findOrFail($id);
        return responseJson($AboutChampion, 'Updated Successfully', 200);
    }

    public function update(AboutUsRequest $request,$id){
        $AboutChampion = AboutChampion::find($id);
        if($request->hasFile('image')){
            unlink_image_by_path($AboutChampion->getAttributes()['image']);
            $data['image'] = store_single_image($request->image);
        }
        $AboutChampion->update($data);
        $AboutChampion->setTranslations($request->translations);
        return responseJson(new AboutUsResource($AboutChampion),'Updated Successfully', 200);
    }

}
