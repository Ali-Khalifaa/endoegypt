<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\HistoryMissionVisionRequest;
use App\Models\History;
use App\Models\TournamentRegulation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class HistoryController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        // return [];
        return [
            new Middleware('can:history read', only: ['show']),
            new Middleware('can:history edit',only:['update']),
        ];
    }

    public function show($id)
    {
        $history = History::with('translations')->findOrFail($id);
        return responseJson($history, 'Updated Successfully', 200);
    }

    public function update(HistoryMissionVisionRequest $request,$id){
        $history = History::find($id);
        $history->setTranslations($request->translations);
        return responseJson($history,'Updated Successfully', 200);
    }

}
