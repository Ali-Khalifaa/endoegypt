<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\ShirtTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\OutfitColorRequest;
use App\Http\Resources\Dashboard\OutfitColorResource;
use App\Models\OutfitColor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class OutfitColorController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:outfit color read', only: ['index']),
            new Middleware('can:outfit color create', only: ['store']),
            new Middleware('can:outfit color edit', only: ['update', 'show']),
            new Middleware('can:outfit color delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $outfitColors = OutfitColor::searchAndFilter()->latest()->paginate(10);

        return responseJson(OutfitColorResource::collection($outfitColors->items()),'',200,getPaginates($outfitColors));
    }


    public function store(OutfitColorRequest $request)
    {
       $check = OutfitColor::where([
            ['shirt_type',$request->shirt_type],
            ['shirt_color_id',$request->shirt_color_id],
            ['secondary_color_id',$request->secondary_color_id],
            ['trousers_color_id',$request->trousers_color_id],
            ])->first();
        if($check){
            return response()->json([
                'errors' => [
                    'shirt_type' => [__('messages.This outfit color is already existed')],
                    'shirt_color_id' => [__('messages.This outfit color is already existed')],
                    'secondary_color_id' => [__('messages.This outfit color is already existed')],
                    'trousers_color_id' => [__('messages.This outfit color is already existed')],
                ]
            ], 422);
        }
        $data = $request->validated();
        $data['image'] = store_single_image($request->image);
        OutfitColor::create($data);
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $category = OutfitColor::find($id);
        return responseJson($category,'Data exited successfully',200);
    }

    public function update(OutfitColorRequest $request, OutfitColor $outfitColor)
    {
        $check = OutfitColor::where([
            ['id','!=',$outfitColor->id],
            ['shirt_type',$request->shirt_type],
            ['shirt_color_id',$request->shirt_color_id],
            ['secondary_color_id',$request->secondary_color_id],
            ['trousers_color_id',$request->trousers_color_id],
            ])->first();
        if($check){
            return response()->json([
                'errors' => [
                    'shirt_type' => [__('messages.This outfit color is already existed')],
                    'shirt_color_id' => [__('messages.This outfit color is already existed')],
                    'secondary_color_id' => [__('messages.This outfit color is already existed')],
                    'trousers_color_id' => [__('messages.This outfit color is already existed')],
                ]
            ], 422);
        }
        $data = $request->validated();
        if($request->hasFile('image')){
            unlink_image_by_path($outfitColor->getAttributes()['image']);
            $data['image'] = store_single_image($request->image);
        }
        $outfitColor->update($data);
        return responseJson($outfitColor,'Updated Successfully',200);
    }

    public function destroy(OutfitColor $outfitColor)
    {
        unlink_image_by_path($outfitColor->getAttributes()['image']);
        $outfitColor->delete();
        return responseJson([],'Deleted Successfully',200);
    }

    public function enums ()
    {
        $types = ShirtTypeEnum::toDictionary();
        return responseJson(['types'=>$types],'Deleted Successfully',200);
    }

}
