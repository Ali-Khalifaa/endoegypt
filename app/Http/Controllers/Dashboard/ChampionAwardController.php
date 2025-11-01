<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ChampionAwardRequest;
use App\Http\Resources\Dashboard\ChampionAwardResource;
use App\Models\ChampionAward;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class ChampionAwardController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:champion award read', only: ['index']),
            new Middleware('can:champion award create', only: ['store']),
            new Middleware('can:champion award edit', only: ['update', 'show']),
            new Middleware('can:champion award delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $ChampionAwards = ChampionAward::searchAndFilter()->latest()->paginate(10);

        return responseJson(ChampionAwardResource::collection($ChampionAwards->items()),'',200,getPaginates($ChampionAwards));
    }



    public function store(ChampionAwardRequest $request)
    {
        $data = $request->validated();
        $data['image'] = store_single_image($request->image);
        $ChampionAward=ChampionAward::create($data);
        $ChampionAward->setTranslations($request->translations);
        return responseJson([],'Created Successfully',200);
    }


    public function show($id)
    {
        $ChampionAward = ChampionAward::with('translations')->find($id);
        return responseJson($ChampionAward,'Data exited successfully',200);
    }

    public function update(ChampionAwardRequest $request, ChampionAward $ChampionAward)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            unlink_image_by_path($ChampionAward->getAttributes()['image']);
            $data['image'] = store_single_image($request->image);
        }
        $ChampionAward->update($data);
        $ChampionAward->setTranslations($request->translations);
        return responseJson($ChampionAward,'Updated Successfully',200);
    }

    public function destroy(ChampionAward $ChampionAward)
    {
        unlink_image_by_path($ChampionAward->getAttributes()['image']);
        $ChampionAward->delete();
        return responseJson([],'Deleted Successfully',200);
    }

    public function dropdown()
    {
        $champion = ChampionAward::all();

        return responseJson(ChampionAwardResource::collection($champion),'',200);
    }
}
