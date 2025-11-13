<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CounterRequest;
use App\Http\Resources\Dashboard\CounterResource;
use App\Models\Counter;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CounterController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:counter read', only: ['index']),
            new Middleware('can:counter create', only: ['store']),
            new Middleware('can:counter edit', only: ['update', 'show']),
            new Middleware('can:counter delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $counter = Counter::searchAndFilter()->latest()->paginate(10);

        return responseJson(CounterResource::collection($counter->items()),'',200,getPaginates($counter));
    }



    public function store(CounterRequest $request)
    {

        $data = $request->validated();
        $counter = Counter::create($data);
        $counter->setTranslations($request->translations);
        return responseJson([],'Created Successfully',200);
    }


    public function show($id)
    {
        $counter = Counter::with('translations')->find($id);
        return responseJson($counter,'Data exited successfully',200);
    }

    public function update(CounterRequest $request, Counter $counter)
    {
        $data = $request->validated();
        $counter->update($data);
        $counter->setTranslations($request->translations);
        return responseJson($counter,'Updated Successfully',200);
    }

    public function destroy(Counter $counter)
    {
        $counter->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
