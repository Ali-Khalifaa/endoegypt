<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ClubTeamRequest;
use App\Http\Resources\Dashboard\ClubTeamResource;
use App\Models\ClubTeam;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class ClubTeamController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:club team read', only: ['index']),
            new Middleware('can:club team create', only: ['store']),
            new Middleware('can:club team edit', only: ['update', 'show']),
            new Middleware('can:club team delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $clubTeams = ClubTeam::searchAndFilter()->latest()->paginate(10);

        return responseJson(ClubTeamResource::collection($clubTeams->items()),'',200,getPaginates($clubTeams));
    }



    public function store(ClubTeamRequest $request)
    {
        $data = $request->validated();
        $data['image'] = store_single_image($request->image);
        $clubTeam=ClubTeam::create($data);
        $clubTeam->setTranslations($request->translations);
        return responseJson([],'Created Successfully',200);
    }


    public function show($id)
    {
        $clubTeam = ClubTeam::with('translations')->find($id);
        return responseJson($clubTeam,'Data exited successfully',200);
    }

    public function update(ClubTeamRequest $request, ClubTeam $clubTeam)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            unlink_image_by_path($clubTeam->getAttributes()['image']);
            $data['image'] = store_single_image($request->image);
        }
        $clubTeam->update($data);
        $clubTeam->setTranslations($request->translations);
        return responseJson($clubTeam,'Updated Successfully',200);
    }

    public function destroy(ClubTeam $clubTeam)
    {
        unlink_image_by_path($clubTeam->getAttributes()['image']);
        $clubTeam->delete();
        return responseJson([],'Deleted Successfully',200);
    }

    public function dropdown()
    {
        $clubTeam = ClubTeam::all();

        return responseJson(ClubTeamResource::collection($clubTeam),'',200);
    }
}
