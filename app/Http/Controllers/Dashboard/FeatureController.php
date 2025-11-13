<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\FeatureRequest;
use App\Http\Resources\Dashboard\FeatureResource;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class FeatureController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:feature read', only: ['index']),
            new Middleware('can:feature create', only: ['store']),
            new Middleware('can:feature edit', only: ['update', 'show']),
            new Middleware('can:feature delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $feature = Feature::searchAndFilter()->latest()->paginate(10);

        return responseJson(FeatureResource::collection($feature->items()),'',200,getPaginates($feature));
    }



    public function store(FeatureRequest $request)
    {

        $data = $request->validated();
        $data['image'] = store_single_image($request->image);
        $testimonial = Feature::create($data);
        $testimonial->setTranslations($request->translations);
        return responseJson([],'Created Successfully',200);
    }


    public function show($id)
    {
        $testimonial = Feature::with('translations')->find($id);
        return responseJson($testimonial,'Data exited successfully',200);
    }

    public function update(FeatureRequest $request, Feature $feature)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            unlink_image_by_path($feature->getAttributes()['image']);
            $data['image'] = store_single_image($request->image);
        }
        $feature->update($data);
        $feature->setTranslations($request->translations);
        return responseJson($feature,'Updated Successfully',200);
    }

    public function destroy(Feature $feature)
    {
        unlink_image_by_path($feature->getAttributes()['image']);
        $feature->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
