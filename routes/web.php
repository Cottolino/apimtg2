<?php

use App\Http\Controllers\MtgController;
use App\Models\CardGot;
use App\Models\Session;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/cardsgot', function(){
    return CardGot::get();
});





// Route::get('/session', function(){
//     return Session::with('CardGot')->get();
// });