<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TournamentInformationRequest;
use App\Http\Resources\Dashboard\TournamentInformationResource;
use App\Models\GeneralCondition;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class GeneralConditionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        // return [];
        return [
            new Middleware('can:general condition read', only: ['index']),
            new Middleware('can:general condition edit',only:['update']),
        ];
    }
    public function index(Request $request)
    {
        $TournamentInformation = GeneralCondition::searchAndFilter()->latest()->paginate(10);

        return responseJson(TournamentInformationResource::collection($TournamentInformation->items()), 'TournamentInformation', 200, getPaginates($TournamentInformation));
    }

    public function show($id)
    {
        $TournamentInformation = GeneralCondition::with('translations')->findOrFail($id);
        return responseJson($TournamentInformation, 'Updated Successfully', 200);
    }

    public function update(TournamentInformationRequest $request,$id){
        $TournamentInformation = GeneralCondition::find($id);
        $TournamentInformation->setTranslations($request->translations);
        return responseJson(new TournamentInformationResource($TournamentInformation),'Updated Successfully', 200);
    }

}
