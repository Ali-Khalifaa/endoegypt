<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ContactUsRequest;
use App\Http\Requests\Website\EventRegisterRequest;
use App\Mail\Registration;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\ContactMessage;
use App\Models\ContactUs;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\History;
use App\Models\JoinUs;
use App\Models\Mission;
use App\Models\News;
use App\Models\Newsletter;
use App\Models\OrganizingCommittee;

use App\Models\Vision;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomePageController extends Controller
{

    public function index(Request $request)
    {
        $banners  =  Banner::whereIsImage(1)->whereStatus(1)->latest()->get();
        $bannerVideo  =  Banner::whereIsImage(0)->whereStatus(1)->latest()->first();
        $latestNews = News::latest()->take(3)->get();
        $latestEvents = Event::latest()->take(3)->get();
        $organizingCommittees = OrganizingCommittee::latest()->get();
        $aboutUs = AboutUs::first();

        // $testmonials = Testimonial::latest()->take(9)->get();

    //     loop variable => $latestEvents
    //   "title"       => $latestEvents->current_translation?->title,
    //         "description" => $latestEvents->current_translation?->description,
    //         "details" => $latestEvents->details?->current_translation?->description,
    //         "image" => $latestEvents->image.'',
    //         "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $latestEvents->created_at)->format('Y-m-d  (H:i)'),

        // $brands = Brand::latest()->get();
        return view('website.home', compact('banners', 'latestNews','latestEvents', 'organizingCommittees','aboutUs','bannerVideo'));
    }
    public function aboutUs(Request $request)
    {
        $aboutTheClub = AboutUs::first();
        $mission = Mission::first();
        $vision = Vision::first();
        $history = History::first();

        return view('website.about-the-club', compact('aboutTheClub', 'mission', 'vision', 'history', 'championAwards', 'testmonials', 'brands'));
    }



    public function events()
    {
        $events = Event::latest()->paginate(20);
        $latestNews = News::latest()->take(3)->get();
        $upcomingEvents = Event::where('event_date','>',now())->latest()->get();
        return view('website.events', compact('events', 'latestNews', 'upcomingEvents'));
    }

    public function eventDetails(Event $event, $slug)
    {
        $latestNews = News::latest()->take(3)->get();
        $upcomingEvents = Event::where('event_date','>',now())->latest()->get();

        return view('website.event-details', compact('event', 'upcomingEvents', 'latestNews'));
    }

    public function news()
    {
        $news = News::latest()->paginate(20);
        $latestNews = News::latest()->take(3)->get();
        $upcomingEvents = Event::where('event_date','>',now())->latest()->get();
        return view('website.news', compact('news', 'latestNews', 'upcomingEvents'));
    }

    public function newsDetails(News $news, $slug)
    {
        $latestNews = News::latest()->take(3)->get();
        $upcomingEvents = Event::where('event_date','>',now())->latest()->get();

        return view('website.news-details', compact('news', 'upcomingEvents', 'latestNews'));
    }

    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
            'name' => 'required|string|max:255',
        ]);
        if (Newsletter::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', __('messages.Email already subscribed'));
        }
        Newsletter::create([
            'email' => $request->email,
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success', __('messages.Thanks for subscribing to our newsletter'));
    }


    public function contact()
    {
        $contactUs = ContactUs::first();
        $joinUs = JoinUs::first();
        return view('website.contact', compact('contactUs','joinUs'));
    }

    public function contactUsForm(ContactUsRequest $request)
    {
        ContactMessage::create($request->validated());
        return responseJson('', __('messages.Thanks for contacting us, we will get back to you soon'), 200);
    }
    public function eventRegister(EventRegisterRequest $request)
    {
        $event = Event::find($request->event_id);
        EventRegistration::create($request->validated());
        Mail::to($request->email)->send(new Registration($request->name, $event->brochure, $event->email_content));
        return responseJson('', __('messages.Thanks for contacting us, we will get back to you soon'), 200);
    }

    public function changeLanguage($lang)
    {
        if (in_array($lang, ['ar', 'en'])) {
            app()->setLocale($lang);
            Carbon::setLocale($lang);
            session()->put('lang', $lang);
        }
        return redirect()->back();
    }
}
