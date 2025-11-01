<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\AgeCategoryEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AgeCategoryRequest;
use App\Http\Resources\Dashboard\AgeCategoryResource;
use App\Models\AgeCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AgeCategoryController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:age category read', only: ['index']),
            new Middleware('can:age category create', only: ['store']),
            new Middleware('can:age category edit', only: ['update', 'show']),
            new Middleware('can:age category delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $banners = AgeCategory::searchAndFilter()->latest()->paginate(10);

        return responseJson(AgeCategoryResource::collection($banners->items()),'',200,getPaginates($banners));
    }



    public function store(AgeCategoryRequest $request)
    {

        $data = $request->validated();
        $category = AgeCategory::create($data);
        $category->setTranslations($request->translations);
        return responseJson([],'Created Successfully',200);
    }


    public function show($id)
    {
        $category = AgeCategory::with('translations')->find($id);
        return responseJson($category,'Data exited successfully',200);
    }

    public function update(AgeCategoryRequest $request, AgeCategory $ageCategory)
    {
        $data = $request->validated();
        $ageCategory->update($data);
        $ageCategory->setTranslations($request->translations);
        return responseJson($ageCategory,'Updated Successfully',200);
    }

    public function destroy(AgeCategory $ageCategory)
    {
        $ageCategory->delete();
        return responseJson([],'Deleted Successfully',200);
    }

    public function dropdown()
    {
        $categories = AgeCategory::all();

        return responseJson(AgeCategoryResource::collection($categories),'',200);
    }

    public function enums ()
    {
        $types = AgeCategoryEnum::toDictionary();
        return responseJson(['types'=>$types],'Deleted Successfully',200);
    }
}
