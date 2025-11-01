<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LatestVideoRequest;
use App\Http\Resources\Dashboard\LatestVideoResource;
use App\Models\LatestVideo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LatestVideoController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:latest video read', only: ['index']),
            new Middleware('can:latest video create', only: ['store']),
            new Middleware('can:latest video edit',only:['update']),
            new Middleware('can:latest video delete',only:['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $LatestVideo = LatestVideo::searchAndFilter()->latest()->paginate(10);

        return responseJson(LatestVideoResource::collection($LatestVideo->items()),'',200,getPaginates($LatestVideo));
    }



    public function store(LatestVideoRequest $request)
    {
        $data = $request->validated();
        $data['image'] = store_single_image($request->image);
        LatestVideo::create($data);
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $LatestVideo = LatestVideo::findOrFail($id);
        return responseJson($LatestVideo, 'Updated Successfully', 200);
    }

    public function update(LatestVideoRequest $request,$id){
        $data =$request->validated();
        $LatestVideo = LatestVideo::find($id);
        if($request->hasFile('image')){
            unlink_image_by_path($LatestVideo->getAttributes()['image']);
            $data['image'] = store_single_image($request->image);
        }
        $LatestVideo->update($data);
        return responseJson($LatestVideo, 'Updated Successfully', 200);
    }

}
