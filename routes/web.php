<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoChatController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',function(){
    return view('welcome');
});
Route::redirect('/home','/video-chat');
Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    Route::get('/video-chat', function () {
        // fetch all users apart from the authenticated user
        $users = User::where('id', '<>', Auth::id())->get();
        return view('video-chat', ['users' => $users]);
    });

    // Endpoints to alert call or receive call.
    Route::post('/video/call-user', [VideoChatController::class, 'callOnlineUser']);
    Route::post('/video/accept-call', [VideoChatController::class, 'acceptIncomingCall']);
    
    // Check Pusher Settings
    Route::get('/counter', function () {
        return view('counter');
    });

   
});



