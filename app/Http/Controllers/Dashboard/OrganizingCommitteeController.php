<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\OrganizingCommitteeRequest;
use App\Http\Resources\Dashboard\OrganizingCommitteeResource;
use App\Models\OrganizingCommittee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class OrganizingCommitteeController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:organizing committee read', only: ['index']),
            new Middleware('can:organizing committee create', only: ['store']),
            new Middleware('can:organizing committee edit', only: ['update', 'show']),
            new Middleware('can:organizing committee delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $OrganizingCommittee = OrganizingCommittee::searchAndFilter()->latest()->paginate(10);

        return responseJson(OrganizingCommitteeResource::collection($OrganizingCommittee->items()),'',200,getPaginates($OrganizingCommittee));
    }



    public function store(OrganizingCommitteeRequest $request)
    {

        $data = $request->validated();
        $data['image'] = store_single_image($request->image);
        $OrganizingCommittee = OrganizingCommittee::create($data);
        $OrganizingCommittee->setTranslations($request->translations);
        return responseJson([],'Created Successfully',200);
    }


    public function show($id)
    {
        $OrganizingCommittee = OrganizingCommittee::with('translations')->find($id);
        return responseJson($OrganizingCommittee,'Data exited successfully',200);
    }

    public function update(OrganizingCommitteeRequest $request, OrganizingCommittee $OrganizingCommittee)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            unlink_image_by_path($OrganizingCommittee->getAttributes()['image']);
            $data['image'] = store_single_image($request->image);
        }
        $OrganizingCommittee->update($data);
        $OrganizingCommittee->setTranslations($request->translations);
        return responseJson($OrganizingCommittee,'Updated Successfully',200);
    }

    public function destroy(OrganizingCommittee $OrganizingCommittee)
    {
        unlink_image_by_path($OrganizingCommittee->getAttributes()['image']);
        $OrganizingCommittee->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
