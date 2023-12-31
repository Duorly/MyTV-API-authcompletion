<?php

use App\Http\Controllers\API\ActordirsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EpisodesController;
use App\Http\Controllers\API\GenresController;
use App\Http\Controllers\API\LanguagesController;
use App\Http\Controllers\API\LiveTvController;
use App\Http\Controllers\API\MoviesController;
use App\Http\Controllers\API\PodcastsCotroller;
use App\Http\Controllers\API\RadiosCotroller;
use App\Http\Controllers\API\SaisonController;
use App\Http\Controllers\API\SeriesController;
use App\Http\Controllers\API\SettingsController;
use App\Http\Controllers\API\SportsController;
use App\Http\Controllers\API\SubsPlanController;
use App\Http\Controllers\API\WatchListController;
use App\Models\SportsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get("/test", function (){
    dd("test");
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

//API routes a cons...

Route::apiResources([

    'movies'     =>   MoviesController::class,
    'radios'     =>   RadiosCotroller::class,
    'podcast'    =>   PodcastsCotroller::class,
    'catPodcats' =>   PodcastController::class,
    'catRadios'  =>   RadiosCotroller::class,
    'genres'     =>   GenresController::class,
    'sliders'    =>   SliderCotroller::class,
    'series'     =>   SeriesController::class,
    'seasons'    =>   SaisonController::class,
    'episodes'   =>   EpisodesController::class,
    'livestv'    =>   LiveTvController::class,
    'sports'     =>   SportsController::class,
    'sportcats'  =>   SportsCategory::class,
    'views'      =>   WatchListController::class,
    'subsplan'   =>   SubsPlanController::class,
    'languages'  =>   LanguagesController::class,
    'actors'     =>   ActordirsController::class,
    'directors'  =>   ActordirsController::class,
    'settings'   =>   SettingsController::class,

]);

Route::fallback(function(){

    return response()->json([
        'message' => 'ressource non trouvé '], 404);

});

//FIN

//Route old
Route::group(['prefix' => 'v1','namespace' => 'API'], function(){

    Route::get('/', 'AndroidApiController@index');
    Route::post('app_details', 'AndroidApiController@app_details');
    Route::post('player_settings', 'AndroidApiController@player_settings');
    Route::post('payment_settings', 'AndroidApiController@payment_settings');

    Route::post('login', 'AndroidApiController@postLogin');
    Route::post('signup', 'AndroidApiController@postSignup');

    Route::post('login_social', 'AndroidApiController@postSocialLogin');

    Route::post('forgot_password', 'AndroidApiController@forgot_password');

    Route::post('dashboard', 'AndroidApiController@dashboard');
    Route::post('profile', 'AndroidApiController@profile');
    Route::post('profile_update', 'AndroidApiController@profile_update');

    Route::post('check_user_plan', 'AndroidApiController@check_user_plan');
    Route::post('subscription_plan', 'AndroidApiController@subscription_plan');
    Route::post('transaction_add', 'AndroidApiController@transaction_add');


    Route::post('home', 'AndroidApiController@home');
    Route::post('home_collections', 'AndroidApiController@home_collections');
    Route::post('languages', 'AndroidApiController@languages');
    Route::post('genres', 'AndroidApiController@genres');

    Route::post('shows', 'AndroidApiController@shows');
    Route::post('shows_by_language', 'AndroidApiController@shows_by_language');
    Route::post('shows_by_genre', 'AndroidApiController@shows_by_genre');

    Route::post('show_details', 'AndroidApiController@show_details');
    Route::post('seasons', 'AndroidApiController@seasons');
    Route::post('episodes', 'AndroidApiController@episodes');
    Route::post('episodes_recently_watched', 'AndroidApiController@episodes_recently_watched');
    //Route::post('episodes_details', 'AndroidApiController@episodes_details');

    Route::post('movies', 'AndroidApiController@movies');
    Route::post('movies_by_language', 'AndroidApiController@movies_by_language');
    Route::post('movies_by_genre', 'AndroidApiController@movies_by_genre');
    Route::post('movies_details', 'AndroidApiController@movies_details');

    Route::post('sports_category', 'AndroidApiController@sports_category');
    Route::post('sports', 'AndroidApiController@sports');
    Route::post('sports_by_category', 'AndroidApiController@sports_by_category');
    Route::post('sports_details', 'AndroidApiController@sports_details');


    Route::post('livetv_category', 'AndroidApiController@livetv_category');
    Route::post('livetv', 'AndroidApiController@livetv');
    Route::post('livetv_by_category', 'AndroidApiController@livetv_by_category');
    Route::post('livetv_details', 'AndroidApiController@livetv_details');

    Route::post('search', 'AndroidApiController@search');

    Route::post('my_watchlist', 'AndroidApiController@my_watchlist');
    Route::post('watchlist_add', 'AndroidApiController@watchlist_add');
    Route::post('watchlist_remove', 'AndroidApiController@watchlist_remove');

    Route::post('apply_coupon_code', 'AndroidApiController@apply_coupon_code');

    Route::post('actor_details', 'AndroidApiController@actor_details');
    Route::post('director_details', 'AndroidApiController@director_details');

    Route::post('stripe_token_get', 'AndroidApiController@stripe_token_get');

    Route::post('get_braintree_token', 'AndroidApiController@get_braintree_token');
    Route::post('braintree_checkout', 'AndroidApiController@braintree_checkout');

    Route::post('get_paytm_token_id', 'AndroidApiController@create_paytm_token');

    Route::post('get_cashfree_token', 'AndroidApiController@get_cashfree_token');
});

