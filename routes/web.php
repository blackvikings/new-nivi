<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth:members' , 'namespace' => 'App\http\Controllers\Member\Members', 'as' => 'member.'], function () {
    Route::get('/add-member', 'MembersController@index')->name('addMember');
    Route::post('/add-member', 'MembersController@store')->name('addMember.store');
});

Route::get('/view-member', 'App\Http\Controllers\Member\Members\MembersController@viewMember')->name('view.member');
Route::get('/direct-member', 'App\Http\Controllers\Member\Members\MembersController@directMember')->name('direct.member');
