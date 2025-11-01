<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\EventRegistrationResource;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EventRegistrationController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        // return [];
        return [
            new Middleware('can:event registration read', only: ['index']),
        ];
    }

    public function index(Request $request)
    {
        $ContactMessage = EventRegistration::searchAndFilter()->latest()->paginate(10);

        return responseJson(EventRegistrationResource::collection($ContactMessage->items()), 'ContactMessage', 200, getPaginates($ContactMessage));
    }

}
