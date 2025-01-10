<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MtgController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// http://apimtg.test/api/sessions
// Route::get('sessions', [MtgController::class, 'sessions']);
// ->middleware('auth:api');

// Route::post('savesession', [MtgController::class, 'saveSession']);


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

// Route::resource('users', UsersController::class)->middleware('auth:api');

Route::get('/cardssession',[MtgController::class,'cardsSession'])->middleware('auth:api');
Route::get('/deletesession',[MtgController::class,'deleteSession'])->middleware('auth:api');
Route::get('/sessions',[MtgController::class,'sessions'])->middleware('auth:api');
Route::post('/savesession',[MtgController::class,'saveSession'])->middleware('auth:api');
Route::post('/savedeck',[MtgController::class,'saveDeck'])->middleware('auth:api');
Route::get('/decks',[MtgController::class,'decks'])->middleware('auth:api');

Route::get('/deck/{id}',[MtgController::class,'deck'])->middleware('auth:api');

//BelongsTo
Route::get('/cardgotsession/{id}',[MtgController::class,'cardGotSession']);
Route::get('/cardsearchsession/{id}',[MtgController::class,'cardSearchSession']);
Route::get('/carddeck/{id}',[MtgController::class,'cardDeck']);


//Test
Route::get('/file/{filename}',[FilesController::class,'show']);
