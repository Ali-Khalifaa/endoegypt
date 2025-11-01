<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ChampionshipGalleryRequest;
use App\Http\Resources\Dashboard\ChampionshipGalleryResource;
use App\Models\ChampionshipGallery;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class ChampionshipGalleryController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:championship gallery read', only: ['index']),
            new Middleware('can:championship gallery create', only: ['store']),
            new Middleware('can:championship gallery edit', only: ['update', 'show']),
            new Middleware('can:championship gallery delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $ChampionshipGallerys = ChampionshipGallery::searchAndFilter()->latest()->paginate(10);

        return responseJson(ChampionshipGalleryResource::collection($ChampionshipGallerys->items()),'',200,getPaginates($ChampionshipGallerys));
    }



    public function store(ChampionshipGalleryRequest $request)
    {
        $data = $request->validated();
        $data['image'] = store_single_image($request->image);
        ChampionshipGallery::create($data);
        return responseJson([],'Created Successfully',200);
    }


    public function show($id)
    {
        $ChampionshipGallery = ChampionshipGallery::with('translations')->find($id);
        return responseJson($ChampionshipGallery,'Data exited successfully',200);
    }

    public function update(ChampionshipGalleryRequest $request, ChampionshipGallery $ChampionshipGallery)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            unlink_image_by_path($ChampionshipGallery->getAttributes()['image']);
            $data['image'] = store_single_image($request->image);
        }
        $ChampionshipGallery->update($data);
        return responseJson($ChampionshipGallery,'Updated Successfully',200);
    }

    public function destroy(ChampionshipGallery $ChampionshipGallery)
    {
        unlink_image_by_path($ChampionshipGallery->getAttributes()['image']);
        $ChampionshipGallery->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
