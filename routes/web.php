<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CustomersController;

use App\Trip;

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

// Route::get('/', function () {
//     return view('pages.welcome');
// });


Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'PagesController@getWelcome');
    Route::get('about', 'PagesController@getAbout');
    Route::get('contact', 'PagesController@getContact');
    Route::get('home', 'PagesController@getHome');
    Route::get('book', 'PagesController@getBook');
    Route::resource('customers', CustomerController::class);
});

// Route::group(['middleware' => ['admin']], function () { 
    // Route::get('/dashboard', function() {
    //     return view('admin.dashboard');
    // });
//  });

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('home', 'PagesController@getHome');

//train's route
Route::resource('trains', 'TrainController');

//Location's route
Route::resource('locations', 'LocationController');

//trip's route
Route::resource('trips', 'TripController');

//auth's route
Auth::routes();

//search
Route::get('/search', 'PagesController@search');

