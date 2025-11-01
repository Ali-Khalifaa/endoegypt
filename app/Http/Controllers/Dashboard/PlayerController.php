<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ChampionshipGalleryRequest;
use App\Http\Resources\Dashboard\ChampionshipGalleryResource;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class PlayerController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:player read', only: ['index']),
            new Middleware('can:player create', only: ['store']),
            new Middleware('can:player edit', only: ['update', 'show']),
            new Middleware('can:player delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $players = Player::searchAndFilter()->latest()->paginate(10);

        return responseJson(ChampionshipGalleryResource::collection($players->items()),'',200,getPaginates($players));
    }



    public function store(ChampionshipGalleryRequest $request)
    {
        $data = $request->validated();
        $data['image'] = store_single_image($request->image);
        Player::create($data);
        return responseJson([],'Created Successfully',200);
    }


    public function show($id)
    {
        $player = Player::with('translations')->find($id);
        return responseJson($player,'Data exited successfully',200);
    }

    public function update(ChampionshipGalleryRequest $request, Player $player)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            unlink_image_by_path($player->getAttributes()['image']);
            $data['image'] = store_single_image($request->image);
        }
        $player->update($data);
        return responseJson($player,'Updated Successfully',200);
    }

    public function destroy($id)
    {
        $player = Player::find($id);
        unlink_image_by_path($player->getAttributes()['image']);
        $player->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
