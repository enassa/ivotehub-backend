<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContestantsController;
use App\Http\Controllers\VotersController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('voters', 'VotersController@getAllVoters');
Route::get('voters/{id}', 'VotersController@getVoters');
Route::post('voters-v/{id}', 'VotersController@Voted');
Route::put('voters/{id}', 'VotersController@updateVoter');
Route::post('voters', 'VotersController@createVoter');
Route::delete('voters/{id}','VotersControllerr@deleteVoter');
Route::get('contestants', 'ContestantsController@getAllContestants');
Route::get('contestants/{id}', 'ContestantsController@getContestant');
Route::put('contestants/{id}', 'ContestantsController@updateContestant');
Route::post('contestants', 'ContestantsController@createContestant');
Route::delete('contestant/{id}','ContestantsController@deleteContestant');
