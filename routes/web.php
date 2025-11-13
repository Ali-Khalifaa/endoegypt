

<?php

use App\Http\Controllers\Web\HomePageController;
use App\Http\Controllers\Web\RegisterController;
use App\Http\Middleware\ChangeLangForWeb;

use Illuminate\Support\Facades\Route;


// Dashboard admin
Route::group(['middleware' => [ChangeLangForWeb::class]], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('{any}', function ($any) {
            return view('welcome');
        })->where('any', '^(?!api\/).*$');

    });
    Route::get('/change-language/{lang}', [HomePageController::class, 'changeLanguage']);
    Route::get('/login', [RegisterController::class, 'login'])->middleware('guest:user');
    Route::get('/register', [RegisterController::class, 'index'])->middleware('guest:user');
    Route::get('/complete-register', [RegisterController::class, 'completeRegisterIndex'])->middleware('auth:user');
    Route::post('/logout', [RegisterController::class, 'logout'])->middleware('auth:user')->name('web.logout');

    Route::get('/', [HomePageController::class, 'index'])->name('web.home');
    Route::post('/newsletter', [HomePageController::class, 'newsletter'])->name('web.newsletter');
    Route::get('/events', [HomePageController::class, 'events']);
    Route::get('/event-details/{event}-{slug?}', [HomePageController::class, 'eventDetails']);
    Route::get('/news', [HomePageController::class, 'news']);
    Route::get('/news-details/{news}-{slug?}', [HomePageController::class, 'newsDetails']);
    Route::get('/contact', [HomePageController::class, 'contact']);
    Route::get('/about-the-club', [HomePageController::class, 'aboutUs']);
    Route::get('/about-the-championship', [HomePageController::class, 'aboutChampionship']);

    Route::get('{any}', [HomePageController::class, 'index'])->where('any', '^(?!api\/).*$');

});



// <?php

// use Illuminate\Support\Facades\Route;

// // Dashboard admin

// Route::domain(env('DOMAIN'))->group(function () {

//     Route::get('/', function () {
//         return view('welcome');
//     });

//     Route::get('{any}', function ($any) {
//         return view('welcome');
//     })->where('any', '^(?!api\/).*$');

// });


