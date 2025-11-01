<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TeamGalleryRequest;
use App\Http\Resources\Dashboard\TeamGalleryResource;
use App\Models\TeamGallery;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class TeamGalleryController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:team gallery read', only: ['index']),
            new Middleware('can:team gallery create', only: ['store']),
            new Middleware('can:team gallery edit', only: ['update', 'show']),
            new Middleware('can:team gallery delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $TeamGallerys = TeamGallery::searchAndFilter()->latest()->paginate(10);

        return responseJson(TeamGalleryResource::collection($TeamGallerys->items()),'',200,getPaginates($TeamGallerys));
    }



    public function store(TeamGalleryRequest $request)
    {
        $data = $request->validated();
        $data['image'] = store_single_image($request->image);
        TeamGallery::create($data);
        return responseJson([],'Created Successfully',200);
    }


    public function show($id)
    {
        $TeamGallery = TeamGallery::with('translations')->find($id);
        return responseJson($TeamGallery,'Data exited successfully',200);
    }

    public function update(TeamGalleryRequest $request, TeamGallery $TeamGallery)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            unlink_image_by_path($TeamGallery->getAttributes()['image']);
            $data['image'] = store_single_image($request->image);
        }
        $TeamGallery->update($data);
        return responseJson($TeamGallery,'Updated Successfully',200);
    }

    public function destroy(TeamGallery $TeamGallery)
    {
        unlink_image_by_path($TeamGallery->getAttributes()['image']);
        $TeamGallery->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
