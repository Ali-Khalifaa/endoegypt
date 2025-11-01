<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\HistoryMissionVisionRequest;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MissionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        // return [];
        return [
            new Middleware('can:mission read', only: ['show']),
            new Middleware('can:mission edit',only:['update']),
        ];
    }

    public function show($id)
    {
        $mission = Mission::with('translations')->findOrFail($id);
        return responseJson($mission, 'Updated Successfully', 200);
    }

    public function update(HistoryMissionVisionRequest $request,$id){
        $mission = Mission::find($id);
        $mission->setTranslations($request->translations);
        return responseJson($mission,'Updated Successfully', 200);
    }

}
