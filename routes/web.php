<?php

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

Route::get('/', function () {return view('registration');});
Route::get('index', function () {return view('registration');});
Route::get('job-apply', function () {return view('job-apply');});
Route::post('apply','JobApplyController@apply');
//Registration and login 		
Route::post('signup','UserController@registration');
Route::get('confirmation/{token}','UserController@confirmation');
Route::post('login','UserController@Authuanticate');

// Authuanticated Routes
Route::group(array('middleware' => 'auth.authByrole'), function()
{
Route::get('dashboard', function () {return view('blank');});
Route::get('applied-candidates','JobApplyController@getAppliedCandidates');
Route::get('view-applied-candidate/{id}','JobApplyController@viewAppliedCandidate');
Route::post('comment','CommentsController@addComments');

Route::get('remove_comment/{id}','CommentsController@deleteComments');
Route::post('update-ratings','RatingController@updateRatings');
Route::get('/logout/',function () {
	Auth::logout();
	return Redirect::to('index');} );
});
	