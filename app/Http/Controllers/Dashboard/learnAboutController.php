<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\learnAboutRequest;
use App\Http\Resources\Dashboard\learnAboutResource;
use App\Models\learnAbout;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class learnAboutController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:learn about read', only: ['index']),
            new Middleware('can:learn about create', only: ['store']),
            new Middleware('can:learn about edit', only: ['update', 'show']),
            new Middleware('can:learn about delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $learnAbout = learnAbout::searchAndFilter()->latest()->paginate(10);

        return responseJson(learnAboutResource::collection($learnAbout->items()),'',200,getPaginates($learnAbout));
    }

    public function store(learnAboutRequest $request)
    {
        $data = $request->validated();
        $learnAbout = learnAbout::create($data);
        $learnAbout->setTranslations($request->translations);
        return responseJson([],'Created Successfully',200);
    }


    public function show($id)
    {
        $learnAbout = learnAbout::with('translations')->find($id);
        return responseJson($learnAbout,'Data exited successfully',200);
    }

    public function update(learnAboutRequest $request,$id)
    {
        $data = $request->validated();
        $learnAbout = learnAbout::find($id);
        $learnAbout->update($data);
        $learnAbout->setTranslations($request->translations);
        return responseJson($learnAbout,'Updated Successfully',200);
    }

    public function destroy($id)
    {
        $learnAbout = learnAbout::find($id);
        $learnAbout->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
