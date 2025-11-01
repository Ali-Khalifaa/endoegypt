<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TournamentInformationRequest;
use App\Http\Resources\Dashboard\TournamentInformationResource;
use App\Models\TournamentRegulation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TournamentRegulationController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        // return [];
        return [
            new Middleware('can:tournament information read', only: ['index']),
            new Middleware('can:tournament information edit',only:['update']),
        ];
    }
    public function index(Request $request)
    {
        $TournamentInformation = TournamentRegulation::searchAndFilter()->latest()->paginate(10);

        return responseJson(TournamentInformationResource::collection($TournamentInformation->items()), 'TournamentInformation', 200, getPaginates($TournamentInformation));
    }

    public function show($id)
    {
        $TournamentInformation = TournamentRegulation::with('translations')->findOrFail($id);
        return responseJson($TournamentInformation, 'Updated Successfully', 200);
    }

    public function update(TournamentInformationRequest $request,$id){
        $TournamentInformation = TournamentRegulation::find($id);
        $TournamentInformation->setTranslations($request->translations);
        return responseJson(new TournamentInformationResource($TournamentInformation),'Updated Successfully', 200);
    }

}
