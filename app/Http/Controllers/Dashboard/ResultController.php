<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ResultRequest;
use App\Http\Resources\Dashboard\ResultResource;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ResultController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:result read', only: ['index']),
            new Middleware('can:result create', only: ['store']),
            new Middleware('can:result edit', only: ['update', 'show']),
            new Middleware('can:result delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $result = Result::searchAndFilter()->latest()->paginate(10);

        return responseJson(ResultResource::collection($result->items()),'',200,getPaginates($result));
    }


    public function store(ResultRequest $request)
    {
        $data = $request->validated();
        if(Result::where('club_match_id',$data['club_match_id'])->exists()){
            return responseJson([],'Result for this match is already existed',422);
        }
        Result::create($data);
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $result = Result::find($id);
        return responseJson($result,'Data exited successfully',200);
    }

    public function update(ResultRequest $request, Result $result)
    {
        $data = $request->validated();
        $result->update($data);
        return responseJson($result,'Updated Successfully',200);
    }

    public function destroy(Result $result)
    {
        $result->delete();
        return responseJson([],'Deleted Successfully',200);
    }

}
