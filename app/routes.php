<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Home
Route::get('/', 'HomeController@getIndex');

//Conference detail
//Route::get('2015/ICMSR', 'ConferenceController@getIndex');

//Invitee confirm register
Route::get('confirm_register/success', 'ConfirmRegisterController@getSuccess');
Route::post('confirm_register', 'ConfirmRegisterController@postIndex');
Route::get('confirm_register/{token}', 'ConfirmRegisterController@getIndex')->where('token', '.+');


//Login
Route::controller('login/ajax', 'Controllers\Ajaxs\LoginController');
Route::controller('login', 'LoginController');


Route::group(array('before' => 'auth'), function(){
    //User profile
    Route::controller('profile/ajax', 'Controllers\Ajaxs\UserController');
    Route::controller('profile', 'UserController');

    //Logout
    Route::controller('logout', 'LogoutController');

    Route::get('register/success', 'RegisterController@getSuccess');
});

//Register
Route::group(array('before' => 'noauth'), function(){
    Route::controller('register/ajax', 'Controllers\Ajaxs\RegisterController');
    Route::controller('register', 'RegisterController');
});


//Contact
Route::get('contact', 'ContentController@getContent');


//Admin
Route::controller('admin/login', 'Controllers\Admin\LoginController');
Route::group(array('before' => 'auth.admin'), function(){
    Route::get('admin/conferences/{conference_ids}/slide/delete/{id}', 'Controllers\Admin\ConferenceController@getDeleteSlide');
    Route::post('admin/conferences/manage/{id}/content/{type}/save-venue', 'Controllers\Admin\ConferenceController@postSaveVenue');
    Route::post('admin/conferences/manage/{id}/content/{type}/save', 'Controllers\Admin\ConferenceController@postSaveContent');
    Route::get('admin/conferences/manage/{id}/content/{type}/add', 'Controllers\Admin\ConferenceController@getContentAdd');
    Route::get('admin/conferences/manage/{id}/content/{type}/edit/{content_id}', 'Controllers\Admin\ConferenceController@getContentEdit');
    Route::get('admin/conferences/manage/{id}/content/{type}', 'Controllers\Admin\ConferenceController@getEditContent');
    Route::get('admin/conferences/manage/{id}/content/{type}', 'Controllers\Admin\ConferenceController@getEditContent');
    Route::get('admin/conferences/manage/{id}', 'Controllers\Admin\ConferenceController@getManage');
    Route::post('admin/conferences/manage/save-slide', 'Controllers\Admin\ConferenceController@postSaveSlide');
    Route::controller('admin/conference_register', 'Controllers\Admin\ConferenceRegisterController');
    Route::controller('admin/contents', 'Controllers\Admin\ContentController');
    Route::controller('admin/user', 'Controllers\Admin\UserController');
    Route::controller('admin/conferences', 'Controllers\Admin\ConferenceController');
    Route::controller('admin/logout', 'Controllers\Admin\LogoutController');
    Route::get('admin/notifications', 'Controllers\Admin\NotificationController@getNotifications');
    Route::controller('admin', 'Controllers\Admin\DashboardController');
});


//Conference
Route::group(array('before' => 'auth'), function(){
    Route::get('{conference_slug}/success-submit-paper', 'ConferenceController@getSuccessSubmitPaper')->where('conference_slug', '(.+)|(.+\/)?');
    Route::post('{conference_slug}/submit-paper', 'ConferenceController@postSubmitPaper')->where('conference_slug', '(.+)|(.+\/)?');
    Route::get('{conference_slug}/submit_paper', 'ConferenceController@getAuthorRegister')->where('conference_slug', '(.+)|(.+\/)?');
    Route::get('{conference_slug}/listener_register', 'ConferenceController@getListenerRegister')->where('conference_slug', '(.+)|(.+\/)?');
    Route::post('conference/confirm-listener-register', 'ConferenceController@postConfirmListenerRegister');
});



Route::get('{conference_slug}/{field_name}', 'ConferenceController@getContent')->where('conference_slug', '(.+)|(.+\/)?')->where('field_name', 'objectives|important_dates|call_for_papers|key_notes|committees|organization|conference_program|conference_proceedings|fees|venue');
Route::get('{conference_slug}', 'ConferenceController@getIndex')->where('conference_slug', '(.+)|(.+\/)?');




