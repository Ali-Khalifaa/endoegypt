<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EventRequest;
use App\Http\Resources\Dashboard\EventResource;
use App\Models\Event;
use App\Models\EventDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class EventController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('can:events read', only: ['index']),
            new Middleware('can:events create', only: ['store']),
            new Middleware('can:events edit', only: ['update', 'show']),
            new Middleware('can:events delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $event = Event::searchAndFilter()->latest()->paginate(10);

        return responseJson(EventResource::collection($event->items()),'',200,getPaginates($event));
    }

    public function store(EventRequest $request)
    {
        $data = $request->validated();
        $data['image'] = store_single_image($request->image);
        $data['brochure'] = store_single_image($request->brochure);
        $event=Event::create($data);
        $event->setTranslations($request->translations);
        $details= EventDetail::create([
            'event_id' => $event->id
        ]);
        $details->setTranslations($request->details);
        return responseJson([],'Created Successfully',200);
    }

    public function show($id)
    {
        $event = Event::with(['translations','details','details.translations'])->find($id);
        return responseJson($event,'Data exited successfully',200);
    }

    public function update(EventRequest $request, Event $event)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            unlink_image_by_path($event->getAttributes()['image']);
            $data['image'] = store_single_image($request->image);
        }
        if($request->hasFile('brochure')){
            unlink_image_by_path($event->getAttributes()['brochure']);
            $data['brochure'] = store_single_image($request->image);
        }
        $event->update($data);
        $event->setTranslations($request->translations);
        $event->details->setTranslations($request->details);
        return responseJson($event,'Updated Successfully',200);
    }

    public function destroy(Event $event)
    {
        unlink_image_by_path($event->getAttributes()['image']);
        unlink_image_by_path($event->getAttributes()['brochure']);
        $event->delete();
        return responseJson([],'Deleted Successfully',200);
    }
}
