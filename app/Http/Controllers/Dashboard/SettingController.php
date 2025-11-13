<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\LanguageResource;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\Dashboard\SettingRequest;

class SettingController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:setting read', only: ['index']),
            new Middleware('can:setting edit', only: ['update', 'show']),
        ];
    }

     public function show($id)
    {
        $Setting = Setting::with('translations')->findOrFail($id);
        return responseJson($Setting, 'Updated Successfully', 200);
    }

    public function update(SettingRequest $request,$id){
        $data =$request->validated();
        $Setting = Setting::find($id);
        if($request->hasFile('breadcrumb_image')){
            unlink_image_by_path($Setting->getAttributes()['breadcrumb_image']);
            $data['breadcrumb_image'] = store_single_image($request->breadcrumb_image);
        }
        if($request->hasFile('header_image')){
            unlink_image_by_path($Setting->getAttributes()['header_image']);
            $data['header_image'] = store_single_image($request->header_image);
        }
        if($request->hasFile('footer_image')){
            unlink_image_by_path($Setting->getAttributes()['footer_image']);
            $data['footer_image'] = store_single_image($request->footer_image);
        }
        $Setting->update($data);
        $Setting->setTranslations($request->translations);
        return responseJson($Setting,'Updated Successfully', 200);
    }

    public function getLanguage()
    {
        $languages = Language::where('status',1)->with('translations')->get();
        return responseJson(LanguageResource::collection($languages),__('messages.application_languages'),200);
    }
}
