<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Member\Members\MembersController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/register', 'App\Http\Controllers\Member\Auth\RegisterController@index')->name('register');
Route::get('/login', 'App\Http\Controllers\Member\Auth\LoginController@showLoginForm')->name('login');



Route::group(['prefix' => 'member', 'namespace' => 'App\Http\Controllers\Member\Auth', 'as' => 'member.'], function (){
    Route::post('/member-register', 'RegisterController@create')->name('register.update');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');

});

Route::group(['middleware' => 'auth:members' , 'as' => 'member.'], function () {
    Route::get('/add-member', [MembersController::class, 'index'])->name('addMember');
    Route::post('/add-member', [MembersController::class, 'store'])->name('addMember.store');
});

Route::get('/view-member', [MembersController::class, 'viewMember'])->name('view.member');
Route::get('/direct-member', [MembersController::class, 'directMember'])->name('direct.member');
