<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\RegisterRequest;
use App\Http\Requests\Website\CompleteRegisterRequest;
use App\Http\Resources\Website\CategoryResource;
use App\Http\Resources\Website\AgeCategoryResource;
use App\Http\Resources\Website\AreaResource;
use App\Http\Resources\Website\CountryResource;
use App\Mail\NewRegisterMail;
use App\Models\AgeCategory;
use App\Models\Area;
use App\Models\Category;
use App\Models\Club;
use App\Models\Country;
use App\Models\learnAbout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{

    public function index()
    {
        return view('website.register');
    }

    public function completeRegisterIndex()
    {
        return view('website.complete-register');
    }

    public function login()
    {
        return view('website.login');
    }


    public function getCategoriesOfParticipation()
    {
        $categories = Category::whereStatus(1)->latest()->get();
        return responseJson(CategoryResource::collection($categories),'',200);
    }

    public function getAreas()
    {
        $areas = Area::whereStatus(1)->latest()->get();
        return responseJson(AreaResource::collection($areas),'',200);
    }

    public function getAgeCategories()
    {
        $ageCategories = AgeCategory::whereStatus(1)->latest()->get();
        return responseJson(AgeCategoryResource::collection($ageCategories),'',200);
    }

    public function getCountries()
    {
        $countries = Country::whereStatus(1)->latest()->get();
        return responseJson(CountryResource::collection($countries),'',200);
    }

    public function howDidYouKnowAboutUs()
    {
        $learnAboutUs = learnAbout::whereStatus(1)->latest()->get();
        return responseJson(CountryResource::collection($learnAboutUs),'',200);
    }

    public function register(RegisterRequest $request){
        $user = User::create([
            'name' => $request->name,
            'manager_name' => $request->manager_name,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'country_id' => $request->country_id,
            'learn_about_id' => $request->learn_about_id,
        ]);
        auth('user')->login($user);
        Mail::to($user->email)->send(new NewRegisterMail($user->name));
        return responseJson($user,__('messages.Created Successfully'),200);
    }

    public function completeRegister(CompleteRegisterRequest $request){
        $user = auth('user')->user();
        if(!$user || $user->is_approved !== 1 || $user->club_id){
            return responseJson(null,__('messages.Unauthorized'),422);
        }
        $club = Club::create([
            'name' => $request->club_name,
            'city' => $request->club_city,
            'postal_code' => $request->club_postal_code,
            'country_id' => $request->club_country_id,
        ]);

        $user = $user->update([
            'street_and_number' => $request->street_and_number,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'shirt_type' => $request->shirt_type,
            'shirt_color' => $request->shirt_color,
            'secondary_color' => $request->secondary_color,
            'trousers_color' => $request->trousers_color,
            'preferred_room_type' => $request->preferred_room_type,
            'preferred_hotel' => $request->preferred_hotel,
            'number_of_persons' => $request->number_of_persons,
            'club_id' => $club->id,
            'age_category_id' => $request->age_category_id,
            'area_id' => $request->area_id,
            'category_id' => $request->category_id,
        ]);

        return responseJson($user,__('messages.Created Successfully'),200);
    }

    public function logout(){
        auth('user')->logout();
        return redirect()->route('web.home');
    }

    public function loginForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (auth('user')->attempt($credentials)) {
            return responseJson(auth('user')->user(),__('messages.Logged in Successfully'),200);
        }
        return responseJson(null,__('messages.Invalid Credentials'),400);
    }

}

