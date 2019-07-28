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

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index');
    Route::get('/type','AdminController@types')->name('admin.type');
    Route::get('/admin_blog','AdminController@admin_blogs')->name('admin.blog');
    Route::get('/admin_magazine','AdminController@admin_magazines')->name('admin.magazine');
    Route::get('/admin_logo_website','AdminController@admin_logo_websites')->name('admin.logo.web');
    Route::get('/admin_form_contact','AdminController@admin_form_contacts')->name('admin.form.contact');
    Route::get('/admin_contact','AdminController@admin_contacts')->name('admin.contact');
    Route::get('/contactdetail/{id}', 'AdminController@contactDetail')->name('contactDetail');

    Route::post('/insert_type','AdminController@insert_types')->name('admin.insert.type');
    Route::post('/edit_type/{id}','AdminController@edit_typess')->name('admin.edits.type');
    Route::post('/delete_type/{id}','AdminController@delete_types')->name('admin.delete.type');

    Route::post('/insert_blog','AdminController@insert_blogs')->name('admin.insert.blog');
    Route::get('/news-add', 'AdminController@getAddNews')->name('admin.getAddNews');
    Route::get('/news-update/{id}', 'AdminController@getUpdateNews')->name('admin.getUpdateNews');
    Route::post('/edit_blog/{id}','AdminController@edit_blogs')->name('admin.edit.blog');
    Route::post('/delete_blog/{id}','AdminController@delete_blogs')->name('admin.delete.blog');

    Route::post('/insert_magazine','AdminController@insert_magazines')->name('admin.insert.magazine');
    Route::get('/add-magazine', 'AdminController@getAddMagazine')->name('admin.getAddMagazine');
    Route::get('/update-magazine/{id}', 'AdminController@getUpdateMagazine')->name('admin.getUpdateMagazine');
    Route::post('/edit_magazine/{id}','AdminController@edit_magazines')->name('admin.edit.magazine');
    Route::get('/delete_magazine/{id}','AdminController@delete_magazines')->name('admin.delete.magazine');

    Route::post('/insert_web_logo','AdminController@insert_web_logos')->name('admin.insert.web.logo');
    Route::post('/edit_web_logo/{id}','AdminController@edit_web_logos')->name('admin.edit.web.logo');

    Route::post('/insert_formcontact','AdminController@insert_formcontacts')->name('admin.insert.formcontact');
    Route::post('/edit_formcontact/{id}','AdminController@edit_formcontacts')->name('admin.edit.formcontact');
    Route::post('/delete_formcontact/{id}','AdminController@delete_formcontacts')->name('admin.delete.formcontact');    

    Route::post('/insert_contact','AdminController@insert_contacts')->name('admin.insert.contact');
    Route::post('/edit_contact/{id}','AdminController@edit_contacts')->name('admin.edit.contact');

    Route::get('/show_tag','AdminController@show_tags')->name('admin.show.tag');
    Route::post('/insert_tag','AdminController@insert_tags')->name('admin.insert.tag');
    Route::post('/edit_tag/{id}','AdminController@edit_tags')->name('admin.edit.tag');
    Route::post('/delete_tag/{id}','AdminController@delete_tags')->name('admin.delete.tag');  

    Route::get('/video','AdminController@admin_videos')->name('admin.videos');
    Route::get('/add-video','AdminController@getAddVideo')->name('admin.getAddVideo');
    Route::post('/admin_insert_video','AdminController@admin_insert_videos')->name('admin.insert.videos');
    Route::get('/update-video/{id}','AdminController@getUpdateVideo')->name('admin.getUpdateVideo');
    Route::post('/update-video/{id}','AdminController@updateVideo')->name('admin.updateVideo');
    Route::post('/admin_delete_video/{id}','AdminController@admin_delete_videos')->name('admin.delete.videos');

    Route::get('/admin_podcast','AdminController@admin_podcasts')->name('admin.podcast');
    Route::get('/admin_show_add_podcast','AdminController@admin_show_add_podcasts')->name('admin.show.add_podcast');
    Route::post('/admin_insert_podcast','AdminController@admin_insert_podcasts')->name('admin.insert.podcast');
    Route::get('/podcast-update/{id}','AdminController@getUpdatePodcast')->name('admin.getUpdatePodcast');
    Route::post('/podcast-update/{id}','AdminController@updatePodcast')->name('admin.updatePodcast');
    Route::get('/admin_delete_podcast/{id}','AdminController@admin_delete_podcasts')->name('admin.delete.podcast');
    // User
    Route::get('/users', 'AdminController@getUsers')->name('getUsers');
    Route::get('/add-uers', 'AdminController@addUsers')->name('addUsers');
    Route::post('/add-users', 'AdminController@userSignup')->name('userSignup');
    Route::get('/update-user/{id}', 'AdminController@getUpdateUser')->name('getUpdateUser');
    Route::post('/update-user/{id}', 'AdminController@userUpdate')->name('userUpdate');
    Route::get('delete-user/{id}', 'AdminController@userDelete')->name('userDelete');
    // Guest

    Route::get('/guest', 'AdminController@getGuest')->name('admin.getGuest');
    Route::get('/add-guest', 'AdminController@getAddGuest')->name('admin.getAddGuest');
    Route::post('/add-guest', 'AdminController@insertGuest')->name('admin.insertGuest');
    Route::post('/delete-guest/{id}', 'AdminController@deleteGuest')->name('admin.deleteGuest');
    Route::get('/update-guest/{id}', 'AdminController@getUpdateGuest')->name('admin.getUpdateGuest');
    Route::post('update-guest/{id}', 'AdminController@updateGuest')->name('admin.updateGuest');

    //Reports

    Route::get('/user-report', 'ReportController@userReport')->name('userReport');
    Route::get('/user-report-generate', 'ReportController@userReportGenerate')->name('userReportGenerate');
    Route::get('/podcast-report-generate', 'ReportController@podcastReportGenerate')->name('podcastReportGenerate');
    Route::get('/video-report-generate', 'ReportController@videoReportGenerate')->name('videoReportGenerate');
    Route::get('/magazine-report-generate', 'ReportController@magazineReportGenerate')->name('magazineReportGenerate');
    Route::get('/topdownload-report-generate', 'ReportController@topdownloadReportGenerate')->name('topdownloadReportGenerate');
    Route::get('/toplike-report-generate', 'ReportController@toplikeReportGenerate')->name('toplikeReportGenerate');

    Route::get('/podcast-report', 'ReportController@podcastReport')->name('podcastReport');
    Route::get('/video-report', 'ReportController@videoReport')->name('videoReport');
    Route::get('/magazine-report', 'ReportController@magazineReport')->name('magazineReport');
    Route::get('/top-download', 'ReportController@topDownload')->name('topDownload');
    Route::get('/top-like', 'ReportController@likeReport')->name('likeReport');
});

