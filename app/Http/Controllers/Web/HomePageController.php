<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ContactUsRequest;
use App\Http\Resources\Website\BannerResource;
use App\Models\AboutChampion;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\ChampionAward;
use App\Models\ClubMatch;
use App\Models\ClubTeam;
use App\Models\ContactMessage;
use App\Models\ContactUs;
use App\Models\History;
use App\Models\LatestVideo;
use App\Models\Mission;
use App\Models\News;
use App\Models\Newsletter;
use App\Models\PopupAd;
use App\Models\Result;
use App\Models\TeamGallery;
use App\Models\Testimonial;
use App\Models\Vision;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index(Request $request)
    {
        $banners  =  Banner::whereStatus(1)->latest()->get();
        $latestNews = News::latest()->take(3)->get();
        $latestVideos = LatestVideo::latest()->take(9)->get();
        $teamGallery = TeamGallery::latest()->take(6)->get();
        $championAwards = ChampionAward::latest()->take(9)->get();
        $testmonials = Testimonial::latest()->take(9)->get();
        $upcomingMatches = ClubMatch::where('match_date','>',now())->latest()->take(9)->get();
        $lastResult = Result::latest()->first();
        $recentResults = Result::where('id','!=',$lastResult->id)->latest()->take(6)->get();
        $clubs = ClubTeam::latest()->take(9)->get();
        $champion = ChampionAward::latest()->first();
        $popUp = PopupAd::first();
        $clubsPoints = ClubTeam::join('club_matches as cm1', 'club_teams.id', '=', 'cm1.club1_id')
        ->join('club_matches as cm2', 'club_teams.id', '=', 'cm2.club2_id')
        ->where('cm1.champion_award_id', $champion->id)
        ->orWhere('cm2.champion_award_id', $champion->id)
        ->select('club_teams.*')
        ->distinct()
        ->get()
        ->sortByDesc(function ($club) use($champion) {
            return $club->getPoints($champion->id);
        })->values();
        $brands = Brand::latest()->get();
        return view('website.home',compact('banners','latestNews','popUp','latestVideos','teamGallery','championAwards','testmonials','brands','upcomingMatches','recentResults','lastResult','clubs','clubsPoints','champion'));
    }
    public function aboutUs(Request $request)
    {
        $aboutTheClub = AboutUs::first();
        $mission = Mission::first();
        $vision = Vision::first();
        $history = History::first();
        $championAwards = ChampionAward::latest()->take(9)->get();
        $testmonials = Testimonial::latest()->take(9)->get();
        $brands = Brand::latest()->get();

        return view('website.about-the-club',compact('aboutTheClub','mission','vision','history','championAwards','testmonials','brands'));
    }
    public function aboutChampionship(Request $request)
    {
        $aboutChampion = AboutChampion::first();
        $championAwards = ChampionAward::latest()->take(9)->get();
        $brands = Brand::latest()->get();
        return view('website.about-the-championship',compact('aboutChampion','championAwards','brands'));
    }

    public function viewTeamGallery(){
        $teamGallery = TeamGallery::latest()->paginate(20);
        return view('website.team-gallery',compact('teamGallery'));
    }

    public function pointsTable(){
        $championShips = ChampionAward::whereHas('matches',function($q){
            $q->whereHas('result');
        })->latest()->get();
        $brands = Brand::latest()->get();
        return view('website.point-table',compact('championShips','brands'));
    }

    public function upcomingMatches(){
        $championShips = ChampionAward::whereHas('matches',function($q){
            $q->where('match_date','>',now());
        })->latest()->get();
        $brands = Brand::latest()->get();
        $latestNews = News::latest()->take(3)->get();
        return view('website.upcoming-matches',compact('championShips','brands','latestNews'));
    }
    public function results(){
        $championShips = ChampionAward::whereHas('matches',function($q){
            $q->whereHas('result');
        })->latest()->get();
        $brands = Brand::latest()->get();
        return view('website.results',compact('championShips','brands'));
    }

    public function viewChampionGallery(){
        $championAwards = ChampionAward::latest()->paginate(20);
        return view('website.champion-gallery',compact('championAwards'));
    }

    public function news(){
        $news = News::latest()->paginate(20);
        return view('website.news',compact('news'));
    }

    public function newsDetails(News $news,$slug){
        $brands = Brand::latest()->get();
        $latestNews = News::latest()->take(3)->get();
        $mightLikeThis = News::inRandomOrder()->take(3)->get();

        return view('website.news-details',compact('news','brands','mightLikeThis','latestNews'));
    }

    public function newsletter(Request $request){
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
            'name' => 'required|string|max:255',
        ]);
        if(Newsletter::where('email',$request->email)->exists()){
            return redirect()->back()->with('error',__('messages.Email already subscribed'));
        }
        Newsletter::create([
            'email' => $request->email,
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success',__('messages.Thanks for subscribing to our newsletter'));
    }


    public function contact(){
        $contactUs = ContactUs::first();
        return view('website.contact',compact('contactUs'));
    }

    public function contactUsForm(ContactUsRequest $request){
        ContactMessage::create($request->validated());
        return responseJson('',__('messages.Thanks for contacting us, we will get back to you soon'),200);
    }

    public function changeLanguage($lang){
        if(in_array($lang,['ar','en'])){
            app()->setLocale($lang);
            Carbon::setLocale($lang);
            session()->put('lang',$lang);
        }
        return redirect()->back();
    }



}
