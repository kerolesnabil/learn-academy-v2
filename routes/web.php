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

Route::namespace('Front')->group(function (){

    Route::get('/','HomepageController@index')->name('front.homepage');

    Route::get('/cat/{id}','CourseController@cat')->name('front.cat');
    Route::get('/cat/{id}/course/{c_id}','CourseController@show')->name('front.show');
    Route::get('/contact','ContactController@index')->name('front.contact');

    Route::post('/message/newsletter','MessageController@newsletter')->name('front.message.newsletter');
    Route::post('/message/contact','MessageController@contact')->name('front.message.contact');
    Route::post('/message/enroll','MessageController@enroll')->name('front.message.enroll');
});

Route::namespace('Admin')->prefix('dashboard')->group(function (){

    Route::get('/login','AuthController@login')->name('admin.login');
    Route::post('/do-login','AuthController@doLogin')->name('admin.doLogin');

    Route::middleware('AdminAuth:admin')->group(function (){

        Route::get('/logout','AuthController@logout')->name('admin.logout');
        Route::get('/','HomeController@index')->name('admin.home');

        Route::prefix('/cats')->group(function (){
            Route::get('','CatController@index')->name('admin.cats.index');
            Route::get('/create/{id?}','CatController@create')->name('admin.cats.create');
            Route::post('/store','CatController@store')->name('admin.cats.store');
            Route::get('/delete/{id}','CatController@delete')->name('admin.cats.delete');
        });

        Route::prefix('/trainers')->group(function (){
            Route::get('','TrainerController@index')->name('admin.trainers.index');
            Route::get('/create/{id?}','TrainerController@create')->name('admin.trainers.create');
            Route::post('/store','TrainerController@store')->name('admin.trainers.store');
            Route::get('/delete/{id}','TrainerController@delete')->name('admin.trainers.delete');
        });
        Route::prefix('/courses')->group(function (){
            Route::get('','CourseController@index')->name('admin.courses.index');
            Route::get('/create/{id?}','CourseController@create')->name('admin.courses.create');
            Route::post('/store','CourseController@store')->name('admin.courses.store');
            Route::get('/delete/{id}','CourseController@delete')->name('admin.courses.delete');
        });








    });



});

