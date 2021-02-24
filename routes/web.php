<?php

    Auth::routes();

    Route::group( ['namespace' => 'Frontend'], function () {
        
        Route::get('/', 'HomeController@index');
        Route::get('/administrator', 'HomeController@administrator')->name('administrator');
        Route::get('/author', 'HomeController@author')->name('author');
        Route::get('/video-gallery', 'HomeController@video')->name('video');
        Route::get('/photo-gallery', 'HomeController@photo')->name('photo');
        Route::get('/contact', 'ContactController@index')->name('front.contact');
        Route::post('/query', 'ContactController@query')->name('send.query');
        Route::get('/book', 'BookController@index')->name('book');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    /** profile route start **/
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@photo')->name('profile');
    Route::post('/password', 'ProfileController@password')->name('password.change');
    Route::post('/profile-update', 'ProfileController@update')->name('profile.update');
    /** profile route end **/
