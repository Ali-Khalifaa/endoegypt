<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PopupAdRequest;
use App\Http\Resources\Dashboard\AboutUsResource;
use App\Models\PopupAd;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PopupAdController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        // return [];
        return [
            new Middleware('can:popup ad read', only: ['index']),
            // new Middleware('can:popup ad edit',only:['update']),
        ];
    }
    public function index(Request $request)
    {
        $adds = PopupAd::searchAndFilter()->latest()->paginate(10);

        return responseJson(AboutUsResource::collection($adds->items()), 'AboutChampion', 200, getPaginates($adds));
    }

    public function show($id)
    {
        $add = PopupAd::with('translations')->findOrFail($id);
        return responseJson($add, 'Updated Successfully', 200);
    }

    public function update(PopupAdRequest $request,$id){
        $add = PopupAd::find($id);
        if($request->hasFile('image')){
            unlink_image_by_path($add->getAttributes()['image']);
            $data['image'] = store_single_image($request->image);
        }
        $add->update($data);
        $add->setTranslations($request->translations);
        return responseJson($add,'Updated Successfully', 200);
    }

}
