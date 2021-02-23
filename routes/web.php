<?php

    Auth::routes();

    Route::group( ['namespace' => 'Frontend'], function () {
        
        Route::get('/', 'HomeController@index');
        Route::get('/contact', 'ContactController@index');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    /** profile route start **/
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@photo')->name('profile');
    Route::post('/password', 'ProfileController@password')->name('password.change');
    Route::post('/profile-update', 'ProfileController@update')->name('profile.update');
    /** profile route end **/
