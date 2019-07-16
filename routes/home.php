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

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/episodes', 'HomeController@episodes')->name('episodes');
Route::get('/episode/{id}', 'HomeController@episode')->name('episode');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contactform', 'HomeController@contactForm')->name('contactForm');
Route::get('/videos', 'HomeController@videos')->name('videos');
Route::get('/video/{id}', 'HomeController@video')->name('video');
Route::get('/read/{id}', 'HomeController@read')->name('read');
Route::get('/signup', 'HomeController@getSignup')->name('getSignup')->middleware('guest');
Route::post('/signup', 'HomeController@memberSignup')->name('memberSignup');
Route::post('/comment', 'HomeController@postComment')->name('postComment');
Route::get('/download/{id}', 'HomeController@getDonwload')->name('getDonwload');
Route::get('/profile', 'HomeController@getProfile')->name('getProfile');
Route::get('/profile/{id}', 'HomeController@getProfileUpdate')->name('getProfileUpdate');
Route::post('/update-profile/{id}', 'HomeController@profileUpdate')->name('profileUpdate');
Route::get('/magazines', 'HomeController@getMagazine')->name('getMagazine');
Route::get('/magazine/{id}', 'HomeController@viewMagazine')->name('viewMagazine');
Route::get('/search', 'HomeController@searchMedia')->name('searchMedia');
// Login
Route::get('/admin/login', 'Auth\LoginController@getLogin')->name('getLogin');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
// End Login

// Stream MP3

Route::get('/stream/{filename}', 'ServeFileController@streamSong')->name('streamSong');

// Like

Route::get('post/{id}/islikedbyme', 'HomeController@isLikedByMe');
Route::post('post/like', 'HomeController@like');

