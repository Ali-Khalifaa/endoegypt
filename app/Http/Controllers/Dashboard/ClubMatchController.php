<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ClubMatchRequest;
use App\Http\Resources\Dashboard\ClubMatchResource;
use App\Models\ClubMatch;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ClubMatchController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:club match read', only: ['index']),
            new Middleware('can:club match create', only: ['store']),
            new Middleware('can:club match edit', only: ['update', 'show']),
            new Middleware('can:club match delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $clubMatches = ClubMatch::searchAndFilter()->latest()->paginate(10);

        return responseJson(ClubMatchResource::collection($clubMatches->items()),'',200,getPaginates($clubMatches));
    }


    public function store(ClubMatchRequest $request)
    {
        $data = $request->validated();
        $clubMatch = ClubMatch::create($data);
        $clubMatch->setTranslations($request->translations);
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $clubMatch = ClubMatch::with('translations')->find($id);
        return responseJson($clubMatch,'Data exited successfully',200);
    }

    public function update(ClubMatchRequest $request, ClubMatch $clubMatch)
    {
        $data = $request->validated();
        $clubMatch->update($data);
        $clubMatch->setTranslations($request->translations);
        return responseJson($clubMatch,'Updated Successfully',200);
    }

    public function destroy(ClubMatch $clubMatch)
    {
        $clubMatch->delete();
        return responseJson([],'Deleted Successfully',200);
    }

    public function dropdown(Request $request)
    {
        $clubMatches = ClubMatch::where('match_date','<=',now()->subHours(2))->where('champion_award_id',$request->champion_award_id)->whereDoesntHave('result')->get();
        if (isset($request->club_match_id) && $request->club_match_id != null && $request->club_match_id != '') {
            $clubMatch = ClubMatch::where('champion_award_id',$request->champion_award_id)->where('id',$request->club_match_id)->first();
            $clubMatches->push($clubMatch);
        }
        return responseJson(ClubMatchResource::collection($clubMatches),'',200);
    }

}
