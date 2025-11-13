<?php

use App\Http\Controllers\Dashboard\AboutUsController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthDashboardController;
use App\Http\Controllers\Dashboard\BackupController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\ContactMessageController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\DashboardStatisticsController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\EventRegistrationController;
use App\Http\Controllers\Dashboard\FrequentlyAskedQuestionController;
use App\Http\Controllers\Dashboard\HistoryController;
use App\Http\Controllers\Dashboard\JoinUsController;
use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\learnAboutController;
use App\Http\Controllers\Dashboard\MissionController;
use App\Http\Controllers\Dashboard\NewsController;
use App\Http\Controllers\Dashboard\NewsletterController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SendNotificationController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\OrganizingCommitteeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\VisionController;
use App\Http\Controllers\Web\HomePageController;
use App\Http\Controllers\Web\RegisterController;
use App\Http\Middleware\ChangeLang;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:admin_api');


Route::group(['prefix' => 'web', 'middleware' => [ChangeLang::class]], function () {

    Route::get('categories-of-participation',[RegisterController::class,'getCategoriesOfParticipation']);
    Route::get('areas',[RegisterController::class,'getAreas']);
    Route::get('age-categories',[RegisterController::class,'getAgeCategories']);
    Route::get('countries',[RegisterController::class,'getCountries']);
    Route::get('how-you-know-about-us',[RegisterController::class,'howDidYouKnowAboutUs']);
    Route::post('register',[RegisterController::class,'register'])->middleware([StartSession::class,EncryptCookies::class,'guest:user']);
    Route::post('complete-register',[RegisterController::class,'completeRegister'])->middleware([StartSession::class,EncryptCookies::class,'auth:user']);
    Route::post('contact-us',[HomePageController::class,'contactUsForm']);
    Route::post('event-register',[HomePageController::class,'eventRegister']);
    Route::post('login',[RegisterController::class,'loginForm'])->middleware([StartSession::class,EncryptCookies::class,'guest:user','throttle:login']);
    // Route::get('terms',[WebPagesController::class,'terms']);
    // Route::get('privacy',[WebPagesController::class,'privacy']);
});

Route::group(['prefix' => 'dashboard', 'middleware' => [ChangeLang::class]], function () {

    // start Dashboard auth
    Route::group(['prefix' => 'auth'], function () {

        Route::post('login',[AuthDashboardController::class, 'login']);

        Route::post('checkToken', [AuthDashboardController::class,'authorizeUser']);

    });

    Route::get('get-language', [SettingController::class,'getLanguage']);

    Route::group(['middleware' => 'auth:admin_api'], function () {

        Route::apiResource('banners', BannerController::class);

        Route::post('logout', [AuthDashboardController::class,'logout']);

        Route::resource('roles', RoleController::class);

        Route::resource('admins', AdminController::class);
        Route::get('all_roles', [AdminController::class,'all_roles']);

        // backup
        Route::apiResource('backup', BackupController::class);

        // learn-about
        Route::apiResource('learn-about', learnAboutController::class);

        //statistics
        Route::get('statistics',[DashboardStatisticsController::class,'index']);
        Route::get('get-total-revenue-per-months',[DashboardStatisticsController::class,'getTotalRevenuePerMonths']);
        Route::get('get-total-revenue-for-each-year-per-months',[DashboardStatisticsController::class,'getTotalRevenueForEachYearPerMonths']);

        Route::apiResource('frequently-asked-questions', FrequentlyAskedQuestionController::class);

        // JoinUs
        Route::apiResource('join-us', JoinUsController::class);

        // OrganizingCommittee
        Route::apiResource('organizing-committee', OrganizingCommitteeController::class);

        // news
        Route::apiResource('news', NewsController::class);

        // events
        Route::apiResource('events', EventController::class);

        // event registration
        Route::apiResource('event-registration', EventRegistrationController::class);

        // contact-us
        Route::apiResource('contact-us', ContactUsController::class);

        // setting
        Route::apiResource('setting', SettingController::class);

        // contact-message
        Route::apiResource('contact-message', ContactMessageController::class);

        // newsletter
        Route::apiResource('newsletter', NewsletterController::class);

        // about-us
        Route::apiResource('about-us', AboutUsController::class);

        // history
        Route::apiResource('history', HistoryController::class);

        // vision
        Route::apiResource('vision', VisionController::class);

        // mission
        Route::apiResource('mission', MissionController::class);

        // Language resource
        Route::resource('language', LanguageController::class);

        // user
        Route::resource('user', UserController::class);

        Route::controller(NotificationController::class)->group(function () {
            Route::get('getAllNot', 'getAllNot');
            Route::get('getNotNotRead', 'getNotNotRead');
            Route::post('clearItem/{id}', 'clearItem');
            Route::post('getNotNotRead', 'clearAll');
        });

        Route::put('update-admin-profile', [ProfileController::class,'updateAdminProfile']);

        Route::post('send-notification', [SendNotificationController::class, 'sendNotification']);

    });

});

