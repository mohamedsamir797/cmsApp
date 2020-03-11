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

Route::get('/','welcomeController@index');

Route::get('articals','articalController@index')->name('articals.index');
Route::get('about','AboutController@index')->name('about.index');
Route::get('contacts','ContactController@index')->name('contacts.index');

Route::post('contacts','ContactController@store')->name('contacts.store');


Auth::routes();

Route::group(['middleware'=>'auth'],function (){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories','CategoriesController');
    Route::resource('posts','PostsController');
    Route::get('trashed','PostsController@trashed')->name('trashed.index');
    Route::get('trashed/{id}','PostsController@restore')->name('trashed.restore');
    Route::resource('tags','TagsController');

    Route::get('profile/{id}/edit','usersController@profileEdit')->name('profile.index');
    Route::put('profileUpdate/{id}','usersController@profileUpdate')->name('profile.update');

    Route::get('allcontacts','ContactController@all')->name('contacts.all');



});

Route::middleware('admin')->group(function (){
    Route::resource('users','usersController');
    Route::post('makeAdmin/{id}','usersController@makeAdmin');
    Route::post('makeUser/{id}','usersController@makeUser');
    Route::get('/dashboard', 'dashboardController@index')->name('dashboard');
    Route::resource('comments','commentsController');

});





