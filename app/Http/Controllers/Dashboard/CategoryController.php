<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Http\Resources\Dashboard\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CategoryController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:category read', only: ['index']),
            new Middleware('can:category create', only: ['store']),
            new Middleware('can:category edit', only: ['update', 'show']),
            new Middleware('can:category delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $categories = Category::searchAndFilter()->latest()->paginate(10);

        return responseJson(CategoryResource::collection($categories->items()),'',200,getPaginates($categories));
    }



    public function store(CategoryRequest $request)
    {

        $data = $request->validated();
        $category = Category::create($data);
        $category->setTranslations($request->translations);
        return responseJson([],'Created Successfully',200);
    }


    public function show($id)
    {
        $category = Category::with('translations')->find($id);
        return responseJson($category,'Data exited successfully',200);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        $category->setTranslations($request->translations);
        return responseJson($category,'Updated Successfully',200);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return responseJson([],'Deleted Successfully',200);
    }

    public function dropdown()
    {
        $categories = Category::all();

        return responseJson(CategoryResource::collection($categories),'',200);
    }
}
